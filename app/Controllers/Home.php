<?php namespace App\Controllers;

use App\Models\User\UserModel;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;


class Home extends BaseController

{
				// class attributes

				private $user_model;
				private $curd;

				// consturct
				//======================================================================
				public function __construct(){
					// Helpers
					helper('form');
					helper('date');

					// create models from model classes
					$this->user_model = new UserModel();

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
			  			// $this->curd->update_lastlogin($id,$this->user_model);
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
																$this->curd->change_status($user_id,$tblid="user_id_pk",$status=0,$this->user_model);

																//echo var_dump($data);
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






				// user logout
				//======================================================================
				public function logout(){
						session()->destroy();
						return redirect()->to('/');

				}

}
