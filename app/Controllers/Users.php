<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\User\ProfileModel;
use App\Libraries\Curd;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
class Users extends BaseController
{
				private $user_model;
				private $user_profile;
				private $mail;
				private $curd;

				public function __construct()
									{
										helper('form');
										$this->user_model = new UserModel();
										$this->profile_model = new ProfileModel();
										$this->mail = new Send_Mail();
										$this->curd = new Curd();
										helper('date');
									}

				//  load all users in the admin Dasbhboard
				public function index()
						{

						}
				public function user_chagne_password()
				{
					$data=[];
					if ($this->request->getMethod()=='post')
					{
						$rules=[
							'email' => 'required',
							'current_password'=> 'required|is_password_exist[current_password]',
							'password'=> 'required|min_length[3]|max_length[20]',
							'cpassword'=> 'matches[password]',
						];

					 if (! $this->validate($rules)){
						$data['validation']= $this->validator;
					}
					 else
						{
						$newdata =
						[
									'user_id_pk' => session()->get('id'),
									'password'=> $this->request->getVar('password'),
									'update' => date('Y-m-d H:i:s',now()),
									'lastchange' => date('Y-m-d H:i:s',now()),
						];
						$this->user_model->save($newdata);
						$user= 	$this->user_model->where('email',$this->request->getVar('email'))
													->first();
							$this->setUserSession($user);
						session()->setFlashdata('sucess', 'Sucessfully change password');
						return redirect()->to('/dashboard');
					 }
				 }
						$data['user']=$this->user_model->where('user_id_pk',session()->get('id'))->first();
					return  view("dashboard/change_password",$data);
				}



					// Assingn session to Users
				private function setUserSession($user)
						{
										$data=
													[
															'id'=>$user['user_id_pk'],
															'firstname'=>$user['firstname'],
															'lastname'=>$user['lastname'],
															'email'=>$user['email'],
															'isLogedIn' => true,
															'loginUser'=>$user['user_role'],
												];
										session()->set($data);
										return true;
						}
				// Edit users


				public function activate_user_account(){
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

																$data['user']= $this->user_model->getuser_from_email(	$this->request->getVar('email'));


																$user_id = $data['user']['user_id_pk'];
																$myTime = new Time('now');
																$time = Time::parse($myTime);
																$number = sprintf('%04d',$user_id);
																$preregid = $time->getYear().$number;
														if  (($this->request->getVar('activatekey')==$preregid)&& $this->request->getVar('email')==$data['user']['email']){
																$this->user_model->change_status($id,$status=0,);
																//echo var_dump($data);
																//print_r($preregid);
																//print_r($user_id);
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

					public function view_profile($slug=null)
				 			{
				 							$data['user'] = $this->user_model->getusers($slug);
				 										if (empty($data['user']))
				 													{
				 															throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
				 													}
				 										$this->setUserSession($data['user']);
				 										$data['title'] = $data['user']['firstname'];
				 										return  view("users/user_profile_view",$data);
				 			}



					public function create_profile()
											{
															$data=[];
															if ($this->request->getMethod()=='post')
															{
																$rules=[
																	'gender'=> 'required',
																	'address'=> 'required|min_length[3]|max_length[255]',
																	'nic'=> 'required|min_length[3]|max_length[20]',
																	'birthdate'=> 'required|min_length[3]|max_length[20]',
																	'mobile'=> 'required|min_length[3]|max_length[20]',
																	'hometel'=> 'required|min_length[3]|max_length[20]',
																'nicimage' => 'uploaded[nicimage]|max_size[nicimage,1024]|ext_in[nicimage,jpg]',
																'profileimg' => 'uploaded[profileimg]|max_size[profileimg,1024]|ext_in[profileimg,jpg]',
																								];

															 if (! $this->validate($rules)){
																$data['validation']= $this->validator;
															}
															 else
																{
																	$profileimg= $this->request->getFile('profileimg');
																	$nicimage= $this->request->getFile('nicimage');


																 if($profileimg->isValid() && !$profileimg->hasMoved()){
																	 $profileimg->move('./uploads/images/user_profiles');
																 }

																 if($nicimage->isValid() && !$nicimage->hasMoved()){
																	 $nicimage->move('./uploads/images/nic_images');
																 }


																$newdata =
																[
																					'profile_id_pk' => session()->get('id'),
																					'gender' => $this->request->getVar('gender'),
																					'address' => $this->request->getVar('address'),
																					'nic' => $this->request->getVar('nic'),
																					'birthdate' => $this->request->getVar('birthdate'),
																					'mobile' => $this->request->getVar('mobile'),
																					'hometel' => $this->request->getVar('hometel'),
																					'profileimg' => $profileimg->getName(),
																					'nicimg'=>$nicimage->getName(),
																					'is_create'=>1,

																];

																//echo var_dump($newdata);
																$this->profile_model->insert($newdata);

															 	session()->setFlashdata('sucess', 'Sucessfully profile created');
															 	return redirect()->to('/dashboard');
															  }
															 }
															//$data['user']=$this->user_model->where('user_id_pk',session()->get('id'))->first();
															return view("dashboard/profile_create",$data);
										}





					public function edit_profile($id_user)

											{
															$data=[];
															if ($this->request->getMethod()=='post')
															{
																$rules=[
																	'gender'=> 'required',
																	'address'=> 'required|min_length[3]|max_length[255]',
																	'nic'=> 'required|min_length[3]|max_length[20]',
																	'birthdate'=> 'required|min_length[3]|max_length[20]',
																	'mobile'=> 'required|min_length[3]|max_length[20]',
																	'hometel'=> 'required|min_length[3]|max_length[20]',
																'nicimage' => 'uploaded[nicimage]|max_size[nicimage,1024]|ext_in[nicimage,jpg]',
																'profileimg' => 'uploaded[profileimg]|max_size[profileimg,1024]|ext_in[profileimg,jpg]',
																								];

															 if (! $this->validate($rules)){
																$data['validation']= $this->validator;
															}
															 else
																{
																	$profileimg= $this->request->getFile('profileimg');
																	$nicimage= $this->request->getFile('nicimage');


																 if($profileimg->isValid() && !$profileimg->hasMoved()){
																	 $profileimg->move('./uploads/images/user_profiles');
																 }

																 if($nicimage->isValid() && !$nicimage->hasMoved()){
																	 $nicimage->move('./uploads/images/nic_images');
																 }


																$newdata =
																[

																					'gender' => 1,
																					'address' => 'sdsd',
																					'nic' => '770231043V',
																					'birthdate' => '2015-01-10',
																					'mobile' => '07730511133',
																					'hometel' => '0112244411',
																					'profileimg' => $profileimg->getName(),
																					'nicimg'=>$nicimage->getName(),
																					'is_create'=>1,

																];

																//echo var_dump($newdata);
																$this->profile_model->update(session()->get('id'),$newdata);

															 	session()->setFlashdata('sucess', 'Sucessfully Updated');
															 	return redirect()->to('/dashboard');
															  }
															 }
															//$data['user']=$this->user_model->where('user_id_pk',session()->get('id'))->first();
															return view("dashboard/profile_create",$data);
										}




















// ====================================================================================================




				public function upload_profile_pic($id){

					 $data=[];
						if ($this->request->getMethod()=='post')
						{
							$rules=[
							    'profileimg' =>'uploaded[profileimg]|max_size[profileimg,1024]|ext_in[profileimg,jpg]|is_image[profileimg]',
	        ];


						 if (! $this->validate($rules)){
							$data['validation']= $this->validator;
						}
						 else
							{
								$file= $this->request->getFile('profileimg');
							 if($file->isValid() && !$file->hasMoved()){
								 $file->move('./uploads/images/user_profiles');
							 }

		 $file =  $this->request->getFile('profileimg');
		 $fname = $file->getName();

							$newdata =
							[
										'id' => session()->get('id'),
										'firstname' => $this->request->getPost('firstname'),
										'lastname' => $this->request->getPost('lastname'),
										'email' => $this->request->getVar('email'),

										'slug' => url_title($this->request->getVar('email')),
										'update' => date('Y-m-d H:i:s',now()),
							];
				if ($this->request->getPost('password')!=''){
					$newdata['password']= $this->request->getPost('password');
				}
							$this->user_model->save($newdata);
							$user= 	$this->user_model->where('email',$this->request->getVar('email'))
														->first();
								$this->setUserSession($user);
							session()->setFlashdata('sucess', 'Sucessfully Updated');
							return redirect()->to('/dashboard');
						 }
						}
						$data['user']=$this->user_model->where('user_id_pk',session()->get('id'))->first();
						return view("users/admin/edit_user",$data);
				 }


				 public function user_profile()
			 					{
			 						$data['user']=$this->user_model->where('user_id_pk',session()->get('id'))->first();
			 						return view("users/user_profile",$data);
			 					}




								public function activate_user($id)
										{
												session()->setFlashdata('sucess', 'Sucessfully activated');
												$this->user_model->change_status($id,$status=0,);
												return redirect()->to('/admin_users');
											}
								public function deactivate_user($id)
										{
											session()->setFlashdata('sucess', 'Sucessfully deactivated');
											$this->user_model->change_status($id,$status=1);
											return redirect()->to('/admin_users');
										}
}
