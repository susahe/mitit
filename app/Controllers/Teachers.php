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
				private $teachermodel;
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
					$this->model 				= new UserModel();
					$this->teachermodel = new TeacherModel();
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


					 $data['teacher'] = $this->teachermodel->findAll();
					 return  view("users/teacher/teacher_view",$data);

				}




				// Set Sessions





				// Edit users

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




							public function  create_teacher()
							{


									$data=[];
										$rest = session()->get('cs');
									$data['courses']= $this->csmodel->getselectedCourse($rest);
									if ($this->request->getMethod()=='post')
									{
									$rules=[
										'address'=> 'required|min_length[3]|max_length[255]',
										//'days'=> 'required|min_length[3]|max_length[20]',
									//	'time'=> 'required'
								];

										if (! $this->validate($rules)){

								 		$data['validation']= $this->validator;
								 	}
								 	 else
								 		{


								 			//	$model = new UserModel();
								 		$newdata = [
											'id' => session()->get('id'),
								 			'address' => $this->request->getVar('address'),
								 		//	'days' => $this->request->getVar('days'),
								 		//	'time' => $this->request->getVar('time'),
								 			//'slug' => url_title($this->request->getVar('time')),
								 		];
										$coursedata=[
											'id'=>session()->get('id'),
											'course'=>2,
										];

										$studentno = '20'.session()->get('id');
										$userdata=[
												'id' => session()->get('id'),
												'username' => $studentno,
										];
										echo var_dump($coursedata);
								//	$this->studentmodel->insert($newdata);
								//	$this->model->save($userdata);
									$this->enroll->insert($coursedata);


								 		$message = "You are Sucessfuly Apply for the Course your Student Number is ".$studentno;

										$user_id = $this->model->getInsertID();
										$email = session()->get('email');
										$myTime = new Time('now');


										$email_message=	$this->mail->user_reg_sendmail(	$email,	$studentno);
										$message = "You areSucessfuly registred your Pre Registration Id is"." ".	$studentno." ".$email_message;
										$session= session();
										$session->setFlashdata('sucess', $message);





//echo var_dump($newdata);
									return redirect()->to('/dashboard');
								 	 }
								 }
								 #$
								 $data['days'] = $this->days->get_days_id(session()->get('id'));
								 	return  view("/users/teacher/create_teacher",$data);
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
