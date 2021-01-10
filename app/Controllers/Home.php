<?php namespace App\Controllers;

use App\Models\User\UserModel;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;


class Home extends BaseController

{
				// class attributes

				private $user_model;

				private $send_mail;

				// consturct
				//======================================================================
				public function __construct(){
					// Helpers
					helper('form');
					helper('date');

					// create models from model classes
					$this->user_model = new UserModel();
					$this->send_mail = new Send_Mail();
				}


				// Index Page Home Page
				//======================================================================
				public function index(){
						$data=[];
						return  view("home/login",$data);

				}


			// Register session
				//======================================================================
				private function setUserSession($user){

							$data=[
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


				// user login
				//======================================================================
				public function login(){
					helper('form');
					$data['title'] = "Users";
					if ($this->request->getMethod()=='post')
					{
						$rules=
									[
									'email'			=> 'required|min_length[6]|max_length[50]|valid_email|user_not_registred[email]|is_active[email]',
									'password'	=> 'required|min_length[8]|max_length[255]|validateUser[email,password]',
									];
						$errors=
									[
									'password'	=> [ 'validateUser'	=> 'Email or Password don \'t match'],
									'email' 		=> ['user_not_registred'			=> "You are not registred user",
																	'is_active' 		=> "Your account not activated, please check your email"]
									];

				 	 if (! $this->validate($rules,$errors))
					 {
								 $data['validation']= $this->validator;
					 }
					 else
					 {
			  			 $user= $this->user_model->getuser_from_email($this->request->getVar('email'));
							 $id = $user['user_id_pk'];
							 $this->setUserSession($user);
							 return redirect()->to('/dashboard');
				 	 	}
				}

						return  view("home/login",$data);

			}

				// user Account Activation	===================================================================
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

																$data['user']= $this->user_model->getuser_from_email(	$this->request->getVar('email'));


																$user_id = $data['user']['user_id_pk'];
																$myTime = new Time('now');
																$time = Time::parse($myTime);
																$number = sprintf('%04d',$user_id);

																$preregid = $time->getYear().$number;



														if  (($this->request->getVar('activatekey')==$preregid)&& $this->request->getVar('email')==$data['user']['email']){
																		$this->user_model->change_status($user_id,$status=0,);

																//echo var_dump($data);
																print_r($preregid);

																print_r($user_id);

														 $gmail =$data['user']['email'];
														 $name = $data['user']['firstname']." ".$data['user']['lastname'];
														 $subject = $name." "."your account successfully activated" ;
														 $body= "Your account  successfully activated your can loing to your account and apply for courses your want";
														 $email_message=	$this->send_mail->user_reg_sendmail($gmail,$subject,$body);
														 $session= session();
														 $session->setFlashdata('sucess', $body);
														 return redirect()->to('/login');
													 }
												}
											}
							return  view("home/activate_user_account",$data);
				}

				// creaet user account 	===================================================================
				// Activate user account after creating
				public function create_user()
					{

										$data=[];
										if ($this->request->getMethod()=='post')
										{
														$rules=
																		[
																					'firstname'=> 'required|min_length[3]|max_length[20]',
																					'lastname'=> 'required|min_length[3]|max_length[100]',
																					'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[tbl_users.email]',
																					'password'=> 'required|min_length[8]|max_length[255]',

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
																				'user_role' => "Student",
																				'firstname' => $this->request->getVar('firstname'),
																				'lastname' => $this->request->getVar('lastname'),
																				'slug' => url_title($this->request->getVar('email')),
																			];

															$this->user_model->save($newdata);
															$user_id = $this->user_model->getInsertID();
															$myTime = new Time('now');
															$time = Time::parse($myTime);
															$number = sprintf('%04d',$user_id);
															$preregid = $time->getYear().$number;
															$gmail =$newdata['email'];
															$subject = "Application has submited successfully with pre-registraion id"."  ".$preregid." "."to your"." ".$gmail." "."emaill address";
															$body= "Your Application successfully submited and your Pre Registred id  is"." ".$preregid." ". "Plase keep this with you for futrue refrence and first log to your account to active. after using this code then your account will be activated.  Your Application Staus is Inactive <a href='http://localhost:8080/activate_user_account/'>click here to activate<a>,";
															$email_message=	$this->send_mail->user_reg_sendmail($gmail,$subject,$body);
															$message =$subject;
															$session= session();
															$session->setFlashdata('sucess', $message);
															return redirect()->to('/');
													 }
								}

								return  view("home/create_user",$data);
				}


					public function change_password()
					{
						$data=[];
						return  view("home/change_password",$data);
					}

				// user logout
				//======================================================================
				public function logout(){
						session()->destroy();
						return redirect()->to('/');

				}

}
