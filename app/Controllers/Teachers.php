<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\DaysModel;
use App\Models\User\TeacherModel;
use App\Models\Course\CourseModel;
use App\Models\EnrolModel;

use App\Models\Test\Custom;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;


class Teachers extends BaseController
{

				private $model;
				private $mail;
				private $teacher_model;
				private $user_model;
				private $curd;
				private $csmodel;
				private $days;
				private $enroll;
				public function __construct()

				{
					// helper classess
					helper('form');
					helper('date');
				//	$this->db = db_connect();



					// Using Model create Objects
					$this->user_model = new UserModel();
					$this->teacher_model = new TeacherModel();
					$this->csmodel = new CourseModel();
					$this->curd = new Curd();
					$this->mail 	= new Send_Mail();
					//$this->days = new DaysModel();
				//	$this->enroll = new EnrolModel();
				}

				// login
				public function index()
				{
					$data=[];


					 //$student = new
					// echo var_dump($student);
					//
				//	 $data['students'] = $student->getStudents();
				//	echo var_dump($data);
				//$model = new StudentModel();

					//	echo var_dump($data);

				// 	$data['students'] = $this->studentmodel->getStudents();
				// //		echo var_dump($std);
				//
				//
				//
				// 	echo  view("users/student/student_view",$data);
				//
				// }
				//
				// public function view_profile($slug=null){
				// //	$model = new UserModel();
				// 		$data['user'] = $this->model->getusers($slug);
				//
				// 		if (empty($data['user']))
				// 	 {
				// 			 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
				// 	 }
				// 	 		$this->setUserSession($data['user']);
				// 			 $data['title'] = $data['user']['firstname'];


					 $data['teacher'] = $this->teacher_model->findAll();
					 return  view("users/teacher/teacher_view",$data);

				}




				// Set Sessions





				// Edit users


							public function  create_teacher()
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
																	],


																	'address'=> 'required|min_length[3]|max_length[255]',
																	'gender'=> 'required',
																	'nic'=> 'required',
																	'birthdate'=>'required',
																	'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]',
																	'hometel'=> 'min_length[10]|max_length[10]|valid_phone_number[hometel]',

																	'qulification' => 'required'
													 ];

																	if (! $this->validate($rules)){

									$data['validation']= $this->validator;
								}
								 else
									{
										// $user_id = session()->get('id');
										// $myTime = new Time('now');
										// $time = Time::parse($myTime);
										// $number = sprintf('%04d',$user_id);
										// $teacherno = $time->getYear().$number;

										//	$user_model = new Useruser_model();

										$userdata =
														[
															'email' => $this->request->getVar('email'),
															'password' => $this->request->getVar('password'),
															'user_role' => "Teacher",
															'firstname' => $this->request->getVar('firstname'),
															'lastname' => $this->request->getVar('lastname'),
															'slug' => url_title($this->request->getVar('email')),
														];

										$this->user_model->save($userdata);
										$user_id = $this->user_model->getInsertID();



									$newdata = [
										'teacher_id_fk' => $user_id,
										'address' => $this->request->getVar('address'),
										'gender' => $this->request->getVar('gender'),
										'nic' => $this->request->getVar('nic'),
										'birthdate' => $this->request->getVar('birthdate'),
										'hometel' => $this->request->getVar('hometel'),
										'mobile' => $this->request->getVar('mobile'),

									];


											$this->teacher_model->insert($newdata);



								 		$message = "You are Sucessfuly Apply for the Course your Student Number is ";

									//	$user_id = $this->model->getInsertID();
										$email = session()->get('email');
										$myTime = new Time('now');


								//		$email_message=	$this->mail->user_reg_sendmail(	$email,	$teacherno);
										$message = "You areSucessfuly registred your Pre Registration Id is";
										$session= session();
										$session->setFlashdata('sucess', $message);





//echo var_dump($newdata);
									return redirect()->to('/admin_teachers');
								 	 }
								 }

								 $myTime = new Time('now');
								 $time = Time::parse($myTime);
								 $year = $time->getYear()-6;
								 $data['bdate']= $year.'-12-31';
								 	return  view("/users/teacher/create_teacher",$data);
								 	}




														public function edit_user(){

																	$data=[];
																	helper('form');
																		$model = new UserModel();
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


																		$newdata = [
																			'idusers' => session()->get('id'),
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


																	//	echo var_dump($newdata);
																		//$model->update(session()->get('id'),$newdata);
																	//	$model->update($newdata['idusers'], $newdata);
																		$model->save($newdata);
																		session()->setFlashdata('sucess', 'Sucessfully Updated');
																		return redirect()->to('/');
																	 }
																	}
																	$data['user']=$model->where('idusers',session()->get('id'))->first();


																	return view("users/user_profile_view",$data);
									}








									public function retirive_course_select($rest){
										$session = session();



											$session->set('cs',$rest);

												return redirect()->to('/create_student');;

									}

									public function activate_student($id)
											{
													$message = "The Student sucessfully activated";
													//$data=$this->model->getUserStatusById($id);
													$this->curd->change_status($id,$status=0,$message,$this->studentmodel);
													return redirect()->to('/dashboard');
												}


									public function deactivate_student($id)
											{
												$message = "The Student sucessfully deactivated";
												//$data=$this->model->getUserStatusById($id);
												$this->curd->change_status($id,$status=1,$message,$this->studentmodel);
												return redirect()->to('/dashboard');
											}




public function set_days_teachers($d){


		//	$model = new UserModel();
	$newdata = [
		'user' => session()->get('id'),
	//	'days' => $this->request->getVar('days'),
		'days' => $d,
		//'slug' => url_title($this->request->getVar('time')),
	];

//	echo var_dump($newdata);
			$this->days->save($newdata);


return redirect()->to('/create_teacher');




}
}
