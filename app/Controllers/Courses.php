<?php namespace App\Controllers;
use App\Models\Course\CourseModel;
use App\Models\User\TeacherModel;
use App\Models\Batch\BatchModel;
use App\Libraries\Curd;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
class Courses extends BaseController
{
	private $course_model;
	private $teacher_model;
	private $batches_model;
	private $mail;

	public function __construct()

	{
		helper('form');
		helper('date');
		 $this->course_model = new CourseModel();
		 $this->teacher_model = new TeacherModel();
		 $this->batches_model= new BatchModel();
		  $this->curd = new Curd();
		// $this->mail = new Send_Mail();

	}
	// login
	public function index()
	{

	 $data['courses']= $this->course_model->findAll();

		//	echo var_dump($data);
		if(!$data['courses']){
			$data['message'] = "There is No Course to view";
		}

	   return view("courses/admin/courses_view_admin",$data);

		 	//return view("courses/course_view",$data);

	}

	public function view_course($cslug=null){
		$model = new CourseModel();
			$data['course'] = $this->model->getCourses($cslug);

			if (empty($data['course']))
		 {
				 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $cslug);
		 }
		 		$this->setCourseSession($data['course']);
				 $data['title'] = $data['course']['csname'];

		return  view("courses/course_view",$data);

	}

	public function create_course(){
		$data=[];
		if ($this->request->getMethod()=='post')
		{
		$rules=[
			'csname'=> 'required|min_length[3]|max_length[255]',
			'cscode'=> 'required|max_length[5]',
			'cstheryhrs'=> 'required',
			'cspracthrs'=> 'required',
			'no_installation' => 'required',
			'csprojecthrs'=> 'required',
			'csfees'=> 'required',
			'cstype'=> 'required',
			'csperyear'=> 'required',
		//	'csimage'=> 'required',
				'csduemonths'=> 'required',

				'teacher_id_fk'=>'required',
		];
	 if (! $this->validate($rules)){

		$data['validation']= $this->validator;
	}
	 else
		{



		$newdata = [

			'csname' => $this->request->getVar('csname'),
			'cstheryhrs' => $this->request->getVar('cstheryhrs'),
			'cspracthrs' => $this->request->getVar('cspracthrs'),

			'csprojecthrs' => $this->request->getVar('csprojecthrs'),
			'csfees' => $this->request->getVar('csfees'),
			'cstype' => $this->request->getVar('cstype'),
			'csperyear' => $this->request->getVar('csperyear'),
		//	'csimage' => $this->request->getVar('csimage'),
			'csduemonths' => $this->request->getVar('csduemonths'),
			'teacher_id_fk' => $this->request->getVar('teacher_id_fk'),
		'csslug' => url_title($this->request->getVar('csname').$this->request->getVar('teacher_id_fk')),
		];

	$this->course_model->save($newdata);


		$message = "Sucessfuly Added to the database";

		$session= session();

		$session->setFlashdata('sucess', $message);

		return redirect()->to('/admin_courses');
	 }
}
$data['teacher']= $this->teacher_model->select_users_name_for_teachers();
	return  view("courses/admin/create_course_admin",$data);

	}


	private function setUserSession($user){

		$data=[
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

	private function setCourseSession($course){

		$data=[
			'id'=>$course['id'],
			'csname'=> $course['csname'],
			'cstheryhrs'=> $course['cstheryhrs'],
			'cspracthrs'=> $course['cspracthrs'],

			'csprojecthrs'=> $course['csprojecthrs'],
			'csfees'=> $course['csfees'],
			'cstype'=> $course['cstype'],
			'csperyear'=>$course['csperyear'],
		//	'csimage'=> 'required',
				'csduemonths'=> $course['csduemonths'],


		];

		session()->set($data);

		return true;

	}


	public function edit_course(){

		$data=[];
		if ($this->request->getMethod()=='post')
		{
		$rules=[
			'csname'=> 'required|min_length[3]|max_length[255]',
			'cstheryhrs'=> 'required',
			'cspracthrs'=> 'required',

			'csprojecthrs'=> 'required',
			'csfees'=> 'required',
			'cstype'=> 'required',
			'csperyear'=> 'required',
		//	'csimage'=> 'required',
				'csduemonths'=> 'required',
		];
	 if (! $this->validate($rules)){

		$data['validation']= $this->validator;
	}
	 else
		{



		$newdata = [

			'csname' => $this->request->getVar('csname'),
			'cstheryhrs' => $this->request->getVar('cstheryhrs'),
			'cspracthrs' => $this->request->getVar('cspracthrs'),

			'csprojecthrs' => $this->request->getVar('csprojecthrs'),
			'csfees' => $this->request->getVar('csfees'),
			'cstype' => $this->request->getVar('cstype'),
			'csperyear' => $this->request->getVar('csperyear'),
		//	'csimage' => $this->request->getVar('csimage'),
			'csduemonths' => $this->request->getVar('csduemonths'),
		'csslug' => url_title($this->request->getVar('csname')),
		];

	$this->model->save($newdata);
					session()->setFlashdata('sucess', 'Sucessfully Updated');
					return redirect()->to('/courses');
				 }
				}
				$data['user']=$model->where('id',session()->get('id'))->first();


				return view("courses/course_view",$data);


	}


public function activate_course($id)
		{
				$message = "The user sucessfully activated";
				//$data=$this->model->getUserStatusById($id);
				$newdata=	$this->curd->change_status($id,$status=0,$message,$this->model);
				return redirect()->to('/courses');
			}


public function deactivate_course($id)
		{
			$message = "The user sucessfully deactivated";
			//$data=$this->model->getUserStatusById($id);
			$this->curd->change_status($id,$status=1,$message,$this->model);
			return redirect()->to('/courses');
		}





public function apply_course($cslug)
{
		// $data=[];
		//
		 $data['course'] = $this->course_model->getCourses($cslug);
		 $data['batches'] = $this->batches_model->get_all_batches_by_courseId($data['course']['cs_id_pk']);
			$data['current_batch'] = $this->batches_model->selectbatch($data['course']['cs_id_pk']);

		 return view("courses/students/apply_for_course",$data);
		//$data['batch'] = $this->batches_model->findAll();
		//$data['batch'] = $this->batches_model->get_batchBy_ID();
	//	echo var_dump($data['batches']);
}



}