<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Libraries\Curd;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
class Users extends BaseController
{
				private $model;
				private $mail;
				private $curd;


				public function __construct()
									{
										helper('form');
										$this->model = new UserModel();
										$this->mail = new Send_Mail();
										$this->curd = new Curd();
										helper('date');
									}

				//  load all users in the admin Dasbhboard
				public function index()
						{
							//>orderBy('created', 'desc') ->findAll(
							$data=[
										'users' => $this->model->orderBy('created','DESC')->paginate(5),
										'pager' => $this->model->pager,
										];

							//	echo var_dump($data);
							
							echo view("users/users_view",$data);
						}

				public function view_profile($slug=null)
						{
										$data['user'] = $this->model->getusers($slug);
													if (empty($data['user']))
														 		{
																 		throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
														 		}
											 		$this->setUserSession($data['user']);
													$data['title'] = $data['user']['firstname'];
													return  view("users/user_profile_view",$data);
						}

						public function user_profile()
								{
									$data['user']=$this->model->where('id',session()->get('id'))->first();
									return view("users/user_profile",$data);

								}

				public function create_user()
					{

										$data=[];
										if ($this->request->getMethod()=='post')
										{
														$rules=
																		[
																					'firstname'=> 'required|min_length[3]|max_length[20]',
																					'lastname'=> 'required|min_length[3]|max_length[100]',
																					'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
																					'password'=> 'required|min_length[8]|max_length[255]',
																					'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]|is_unique[users.mobile]',
																					'cpassword'=>
																						[
																							'label' => "Confirm Password",
																							'rules'=> 'matches[password]',
																							'errors'=> [
																															'matches'=>" Confirm password should be match with password"
																												 ]
																						]

																		 ];
									 					if (! $this->validate($rules))
														{
																					$data['validation']= $this->validator;
														}
															else
														{
															$newdata =
																			[
																				'email' => $this->request->getVar('email'),
																				'password' => $this->request->getVar('password'),
																				'role' => "Guest",
																				'firstname' => $this->request->getVar('firstname'),
																				'lastname' => $this->request->getVar('lastname'),
																				'mobile' => $this->request->getVar('mobile'),
																				'slug' => url_title($this->request->getVar('email')),
																			];

															$this->model->save($newdata);
															$user_id = $this->model->getInsertID();
															$myTime = new Time('now');
															$time = Time::parse($myTime);
															$number = sprintf('%04d',$user_id);
															$preregid = $time->getYear().$number;
															$gmail =$newdata['email'];
															$subject = "Application has submited successfully with pre-registraion id"."  ".$preregid." "."to your"." ".$gmail." "."emaill address";
															$body= "Your Application successfully submited and your Pre Registred id  is"." ".$preregid." ". "Plase keep this with you for futrue refrence and first log to your account to active. after using this code then your account will be activated.  Your Application Staus is Inactive <a href='http://localhost:8080/activate_user_account/'>click here to activate<a>,";
															$email_message=	$this->mail->user_reg_sendmail($gmail,$subject,$body);
															$message =$subject;
															$session= session();
															$session->setFlashdata('sucess', $message);
															return redirect()->to('/');
													 }
								}

								return  view("users/create_user",$data);
				}

						// Assingn session to Users
				private function setUserSession($user)
						{

										$data=
													[
															'id'=>$user['id'],
															'firstname'=>$user['firstname'],
															'lastname'=>$user['lastname'],
															'email'=>$user['email'],
															'isLogedIn' => true,
															'loginUser'=>$user['role'],
												];

										session()->set($data);
										return true;
						}

				// Edit users
				public function edit_user()
						{
										$data=[];
										if ($this->request->getMethod()=='post')
										{
											$rules=[
												'firstname'=> 'required|min_length[3]|max_length[20]',
												'lastname'=> 'required|min_length[3]|max_length[20]',
											];
											if ($this->request->getPost('password')!=''){
												$rules['password']= 'required|min_length[3]|max_length[20]';
												$rules['cpassword']= 'matches[password]';
											}
										 if (! $this->validate($rules)){
										 	$data['validation']= $this->validator;
										}
										 else
										  {
											$newdata =
											[
														'id' => session()->get('id'),
													  'firstname' => $this->request->getPost('firstname'),
													  'lastname' => $this->request->getPost('lastname'),
														'email' => $this->request->getVar('email'),
														'mobile'=> $this->request->getVar('mobile'),
														'slug' => url_title($this->request->getVar('email')),
													  'update' => date('Y-m-d H:i:s',now()),
											];

								if ($this->request->getPost('password')!=''){
									$newdata['password']= $this->request->getPost('password');
								}
											$this->model->save($newdata);
											$user= 	$this->model->where('email',$this->request->getVar('email'))
																		->first();
												$this->setUserSession($user);
											session()->setFlashdata('sucess', 'Sucessfully Updated');
											return redirect()->to('/dashboard');
										 }
										}
										$data['user']=$this->model->where('id',session()->get('id'))->first();
										return view("users/user_profile_view",$data);
					}

				public function activate_user($id)
						{
								$message = "The user sucessfully activated";
								//$data=$this->model->getUserStatusById($id);
								$this->curd->change_status($id,$status=0,$message,$this->model);
								return redirect()->to('/view_users');

							}

				public function deactivate_user($id)
						{
							$message = "The user sucessfully deactivated";
							//$data=$this->model->getUserStatusById($id);
							$this->curd->change_status($id,$status=1,$message,$this->model);
							return redirect()->to('/view_users');
						}

				 public function  system_created_users()
						{
								$data=[];
								if ($this->request->getMethod()=='post')
									{
											$rules=[
																'firstname'=> 'required|min_length[3]|max_length[20]',
																'lastname'=> 'required|min_length[3]|max_length[20]',
																'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
																'password'=> 'required|min_length[8]|max_length[255]',
																'mobile'=> 'required|valid_phone_number[mobile]',
																'cpassword'=> 'matches[password]',
														 ];
								if (! $this->validate($rules))
										{
												$data['validation']= $this->validator;
										}
								else
										{
											$newdata =
															[
																'email' => $this->request->getVar('email'),
																'password' => $this->request->getVar('password'),
																'role' => $this->request->getVar('role'),
																'firstname' => $this->request->getVar('firstname'),
																'lastname' => $this->request->getVar('lastname'),
																'mobile' => $this->request->getVar('mobile'),
																'slug' => url_title($this->request->getVar('email')),
															];
											$this->model->save($newdata);
											$user_id = $this->model->getInsertID();


											$myTime = new Time('now');
											$time = Time::parse($myTime);
											$number = sprintf('%04d',$user_id);
											$preregid = $time->getYear().$number;
											$gmail =$newdata['email'];
											$subject = "Application has submited successfully with pre-registraion id"."  ".$preregid." "."to your"." ".$gmail." "."emaill address";
											$body= "Your Application successfully submited and your Pre Registred id  is"." ".$preregid." ". "Plase keep this with you for futrue refrence and first log to your account to active. after using this code then your account will be activated.  Your Application Staus is Inactive <a href='http://localhost:8080/activate_user_account/'>click here to activate<a>,";
											$email_message=	$this->mail->user_reg_sendmail($gmail,$subject,$body);
											$message =$subject;
											$session= session();
											$session->setFlashdata('sucess', $message);
											return redirect()->to('/view_users');
									}
								}
								return  view("users/system_created_users",$data);
				}

				// Activate user account after creating
				public function activate_user_account()
				{
									$data=[];
									if ($this->request->getMethod()=='post')
									{
													$rules=
																	[
																				'email'=> 'required|valid_email|user_not_registred[email]|is_activeted[email]',
																				'activatekey'=> 'required|min_length[5]|is_activativation_key_available[activatekey,email]',
																				];

													$errors=	['email'    => [
																				            'required' => 'Email field requierd',
																										'valid_email' => 'Email should be valid',
																										'user_not_registred'=>'User still not registred',
																				            'is_active' => 'User name already activated'
																									],

																	];

								 if (! $this->validate($rules,$errors))
														{
																				$data['validation']= $this->validator;
														}

								else{

																$data['user']= $this->model->getuser_from_email(	$this->request->getVar('email'));

															;
																$user_id = $data['user']['id'];
																$myTime = new Time('now');
																$time = Time::parse($myTime);
																$number = sprintf('%04d',$user_id);

																$preregid = $time->getYear().$number;



														if  (($this->request->getVar('activatekey')==$preregid)&& $this->request->getVar('email')==$data['user']['email']){
																$this->curd->change_status($user_id,$status=0,"ok",$this->model);

																echo var_dump($data);
																print_r($preregid);

																print_r($user_id);

														 $gmail =$data['user']['email'];
														 $name = $data['user']['firstname']." ".$data['user']['lastname'];
														 $subject = $name." "."your account successfully activated" ;
														 $body= "Your account  successfully activated your can loing to your account and apply for courses your want";
														 $email_message=	$this->mail->user_reg_sendmail($gmail,$subject,$body);
														 $session= session();
				 										 $session->setFlashdata('sucess', $body);
														 return redirect()->to('/login');
													 }
												}
											}
							return  view("users/activate_user_account",$data);
				}

				public function create_user_by_system()
					{
										$data=[];
										if ($this->request->getMethod()=='post')
										{
														$rules=
																		[
																					'firstname'=> 'required|min_length[3]|max_length[20]',
																					'lastname'=> 'required|min_length[3]|max_length[100]',
																					'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
																					'password'=> 'required|min_length[8]|max_length[255]',
																					'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]|is_unique[users.mobile]',
																					'cpassword'=>
																						[
																							'label' => "Confirm Password",
																							'rules'=> 'matches[password]',
																							'errors'=> [
																															'matches'=>" Confirm password should be match with password"
																												 ]
																						]
																		 ];
									 if (! $this->validate($rules))
															{
																					$data['validation']= $this->validator;
															}
									else
											{
															$newdata =
																			[
																				'email' => $this->request->getVar('email'),
																				'password' => $this->request->getVar('password'),
																				'role' => $this->request->getVar('role'),
																				'firstname' => $this->request->getVar('firstname'),
																				'lastname' => $this->request->getVar('lastname'),
																				'mobile' => $this->request->getVar('mobile'),
																				'slug' => url_title($this->request->getVar('email')),
																			];
															$this->model->save($newdata);
															$user_id = $this->model->getInsertID();
															$myTime = new Time('now');
															$time = Time::parse($myTime);
															$number = sprintf('%04d',$user_id);
															$preregid = $time->getYear().$number;
															$gmail =$newdata['email'];
															$subject = "Application has submited successfully with pre-registraion id"."  ".$preregid." "."to your"." ".$gmail." "."emaill address";
															$body= "Your Application successfully submited and your Pre Registred id  is"." ".$preregid." ". "Plase keep this with you for futrue refrence and first log to your account to active. after using this code then your account will be activated.  Your Application Staus is Inactive <a href='http://localhost:8080/activate_user_account/'>click here to activate<a>,";
															$email_message=	$this->mail->user_reg_sendmail($gmail,$subject,$body);
															$message =$subject;
															$session= session();
															$session->setFlashdata('sucess', $message);
															return redirect()->to('/');
													}
								}

								return  view("users/create_user",$data);
				}

				public function admin_edit_users($slug)
				{
					//	$model = new UserModel();
							$data['user'] = $this->model->getusers($slug);

							if (empty($data['user']))
						 {
								 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
						 }
						 	$session = session();
								$session->set('seleuid', $data['user']['id']);
								 $data['title'] = $data['user']['firstname'];

						return  view("users/user_details_view",$data);
				}

				public function admin_edit_user()
					{
									$data=[];
									if ($this->request->getMethod()=='post')
									{
										$rules=[
											'firstname'=> 'required|min_length[3]|max_length[20]',
											'lastname'=> 'required|min_length[3]|max_length[20]',
												'email'=> 'required|min_length[5]|max_length[50]|valid_email',
										];
										if ($this->request->getPost('password')!=''){
											$rules['password']= 'required|min_length[3]|max_length[20]';
											$rules['cpassword']= 'matches[password]';
										}
									 if (! $this->validate($rules)){
										$data['validation']= $this->validator;
									}
									 else
										{
										$newdata =
										[
													'id' => session()->get('seleuid'),
													'role' => $this->request->getPost('role'),
													'firstname' => $this->request->getPost('firstname'),
													'lastname' => $this->request->getPost('lastname'),
													'email' => $this->request->getVar('email'),
													'mobile'=> $this->request->getVar('mobile'),
													'slug' => url_title($this->request->getVar('email')),
													'update' => date('Y-m-d H:i:s',now()),
										];

							if ($this->request->getPost('password')!=''){
								$newdata['password']= $this->request->getPost('password');
							}
										$this->model->save($newdata);
										session()->setFlashdata('sucess', 'Sucessfully Updated');
										return redirect()->to('/view_users');
									 }
									}
									$data['user']=$this->model->where('id',session()->get('id'))->first();
									return view("users/user_profile_view",$data);
				}

				public function search(){

        $search=$this->request->getVar('search');
        $db= \Config\Database::connect();
        $builder = $db->table('users');
       $builder->like('firstname',$search);
			 $builder->orLike('lastname',$search);
      $query=$builder->get();
        $q=$query->getResultArray();

    $data['r']=$q;

    return view('users/users_view',$data);
}
}
