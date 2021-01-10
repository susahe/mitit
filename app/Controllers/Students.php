<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;

use App\Models\User\StudentModel;
use App\Models\User\ParentModel;
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

				private $user_model;
				private $mail;
				private $student_model;
				private $parent_model;
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
					$this->student_model = new StudentModel();
					$this->parent_model = new ParentModel();
					$this->csmodel = new CourseModel();
					$this->curd = new Curd();
					$this->mail 	= new Send_Mail();

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


				public function view_student_profile($id)
				{
					$myTime = new Time('now');
					$time = Time::parse($myTime);
					$year = $time->getYear()-6;
					$data['bdate']= $year.'-12-31';
				 //	$data['user']=$this->user_model->where('id',session()->get('id'))->first();
				 return view("users/student/student_profile",$data);
				}

				public function create_student_profile()
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

						'qulification' => 'required'

				];

						if (! $this->validate($rules)){

						$data['validation']= $this->validator;
					}
					 else
						{
							$user_id = session()->get('id');
							$myTime = new Time('now');
							$time = Time::parse($myTime);
							$number = sprintf('%04d',$user_id);
							$studentno = $time->getYear().$number;

							//	$user_model = new Useruser_model();
						$newdata = [
							'user_id' => $user_id,
							'address' => $this->request->getVar('address'),
							'gender' => $this->request->getVar('gender'),
							'nic' => $this->request->getVar('nic'),
							'birthdate' => $this->request->getVar('birthdate'),
							'hometel' => $this->request->getVar('hometel'),
							'mobile' => $this->request->getVar('mobile'),

						];



				 $this->student_model->save($newdata);


						// $newdata =
						// 				[
						// 					'user_id_pk'=>$user_id,
						// 				//	'email' => 'abcc@slt.lk',
						// 				//	'password' => '123',
						// 			//		'user_role' => "Student",
						// 				//	'firstname' =>'saman',
						// 				//	'lastname' => 'kamal',
						// 					'user_name' => '$studentno'
						// 				//	'slug' => url_title('abc@slt.lk'),
						// 				];
						//
						// $this->user_model->save($newdata);

					// $this->user_model->save($userdata);
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
						$body = "You are Sucessfuly submit your course application"." ". " and your registration id is"." ".$studentno. "Your QR Code " ;
					//	$this->mail->user_reg_sendmail($email,$subject,$body);

						$message = $subject." ".	$studentno;
						$session= session();
						$session->setFlashdata('sucess', $message);
						$session->set('loginUser','Student');

					return redirect()->to('/dashboard');
					 }
				 }

				 $myTime = new Time('now');
				 $time = Time::parse($myTime);
				 $year = $time->getYear()-6;
				 $data['bdate']= $year.'-12-31';
				//	$data['user']=$this->user_model->where('id',session()->get('id'))->first();
				return view("users/student/student_profile",$data);
				}


public function create_child_account()

	{



		$data=[];


		if ($this->request->getMethod()=='post')
		{


		$rules=[
			'firstname'=> 'required|min_length[3]|max_length[20]',
			'lastname'=> 'required|min_length[3]|max_length[100]',
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

				$userdata =
								[

									'user_role' => "Child",
									'firstname' => $this->request->getVar('firstname'),
									'lastname' => $this->request->getVar('lastname'),

								];

				$this->user_model->save($userdata);
				$child_id = $this->user_model->getInsertID();


				$user_id = session()->get('id');
				$myTime = new Time('now');
				$time = Time::parse($myTime);
				$number = sprintf('%04d',$user_id);
				$studentno = $time->getYear().$number;

				//	$user_model = new Useruser_model();
			$newdata = [
				'student_id_pk' => $child_id,
				'address' => $this->request->getVar('address'),
				'gender' => $this->request->getVar('gender'),
				'nic' => $this->request->getVar('nic'),
				'birthdate' => $this->request->getVar('birthdate'),
				'hometel' => $this->request->getVar('hometel'),
				'mobile' => $this->request->getVar('mobile'),

			];



	 $this->student_model->insert($newdata);

	   $parent_child = [

			 		'prt_id_fk' =>$user_id ,
					'std_id_fk'=> $child_id,

		 ];

	$this->parent_model->save($parent_child);

			// $newdata =
			// 				[
			// 					'user_id_pk'=>$user_id,
			// 				//	'email' => 'abcc@slt.lk',
			// 				//	'password' => '123',
			// 			//		'user_role' => "Student",
			// 				//	'firstname' =>'saman',
			// 				//	'lastname' => 'kamal',
			// 					'user_name' => '$studentno'
			// 				//	'slug' => url_title('abc@slt.lk'),
			// 				];
			//
			// $this->user_model->save($newdata);

		// $this->user_model->save($userdata);
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
			$body = "You are Sucessfuly submit your course application"." ". " and your registration id is"." ".$studentno. "Your QR Code " ;
		//	$this->mail->user_reg_sendmail($email,$subject,$body);

			$message = $subject." ".	$studentno;
			$session= session();
			$session->setFlashdata('sucess', $message);
			$session->set('loginUser','Student');

		return redirect()->to('/student_view_child_accounts');
		 }
	 }

	 $myTime = new Time('now');
	 $time = Time::parse($myTime);
	 $year = $time->getYear()-6;
	 $data['bdate']= $year.'-12-31';
	//	$data['user']=$this->user_model->where('id',session()->get('id'))->first();
	return view("users/student/student_profile",$data);
	}


  

public function add_child_account()
{

	$myTime = new Time('now');
	$time = Time::parse($myTime);
	$year = $time->getYear()-6;
	$data['bdate']= $year.'-12-31';
			return view("users/student/child/create_child_profile",$data);

}

public function view_child_accounts()
{
			$data=[];
			$loginid = session()->get('id');
			$data['childs'] = $this->parent_model->select_students_from_parent($loginid);
			return view("dashboard/student/students_child_accounts",$data);
}

}
