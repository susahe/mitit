<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\User\PersonModel;
use App\Models\User\StudentModel;

use App\Models\Enroll\DaysModel;
use App\Models\Course\CourseModel;
use App\Models\Enroll\EnrolModel;

use App\Models\Custom;

use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;
use Endroid\QrCode\QrCode;

class Students extends BaseController
{

				private $model;
				private $mail;
				private $studentmodel;
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
					$this->model = new UserModel();
					$this->studentmodel = new StudentModel();
					$this->csmodel = new CourseModel();
					$this->curd = new Curd();
					$this->mail 	= new Send_Mail();
					$this->days = new DaysModel();
					$this->enroll = new EnrolModel();
				}

				// login
				public function index()
				{
					$data=[];




				}

				public function view_profile($slug=null){
				//	$model = new UserModel();
						$data['user'] = $this->model->getusers($slug);

						if (empty($data['user']))
					 {
							 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
					 }
					 		$this->setUserSession($data['user']);
							 $data['title'] = $data['user']['firstname'];

					return  view("users/user_profile_view",$data);

				}


				public function create_student_profile($id)
				{
					$data=[];


					if ($this->request->getMethod()=='post')
					{
					$rules=[
						'address'=> 'required|min_length[3]|max_length[255]',
						'gender'=> 'required',
						'nic'=> 'required',
						'birthdate'=>'required',
						'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]',
						'hometel'=> 'min_length[10]|max_length[10]|valid_phone_number[hometel]',
						'installment'=>'required',
						'qulification' => 'required'

				];

						if (! $this->validate($rules)){

						$data['validation']= $this->validator;
					}
					 else
						{


							//	$user_model = new Useruser_model();
						$newdata = [
							'user' => session()->get('id'),
							'address' => $this->request->getVar('address'),
							'gender' => $this->request->getVar('gender'),
							'nic' => $this->request->getVar('nic'),
							'birthdate' => $this->request->getVar('birthdate'),
							'hometel' => $this->request->getVar('hometel'),
							'mobile' => $this->request->getVar('mobile'),

						];




						$user_id = session()->get('id');
						$myTime = new Time('now');
						$time = Time::parse($myTime);
						$number = sprintf('%04d',$user_id);
						$studentno = $time->getYear().$number;


						// $userdata=[
						// 		'id' => session()->get('id'),
						// 		'username' => $studentno,
						// 		'role' => "Student",
						// ];

						$this->$student_model->insert($newdata);
					//$this->user_model->save($userdata);
					//$this->enroll->insert($coursedata);

						// if (session()->get('is_parent')==1){
						// 	$body = "You Child/ Slibling has Sucessfuly Apply for the Course ". " ".$data['courses']['csname']." ". " and your registration id is"." ".$studentno. "Your QR Code " ;
						// }
						// else{
						//
						// }
					//	$user_id = $this->user_model->getInsertID();
						$email = session()->get('email');
						$myTime = new Time('now');

						$subject = "Application has submited successfully" ;
						$body=	$body = "You are Sucessfuly submit your course application ". " ".$data['courses']['csname']." ". " and your registration id is"." ".$studentno. "Your QR Code " ;
						$this->mail->user_reg_sendmail($email,$subject,$body);

						$message = $subject." ".	$studentno;
						$session= session();
						$session->setFlashdata('sucess', $message);
						$session->set('loginUser','Student');

					return redirect()->to('/dashboard');
					 }
				 }

				 $myTime = new Time('now');
				 $time = Time::parse($myTime);
				 $year = $time->getYear()-4;
				 $data['bdate']= '2017-12-31';
				//	$data['user']=$this->user_model->where('id',session()->get('id'))->first();
				return view("users/student/student_profile",$data);
				}







}
