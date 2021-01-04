<?php namespace App\Controllers;
use App\Models\User\UserModel;
use App\Models\Course\CourseModel;
use App\Models\User\StudentModel;
use CodeIgniter\I18n\Time;
class Dashboard extends BaseController
{
	private $model;
	private $csmodel;
	private $new_stdmodel;
	public function __construct()

	{
		helper('form');
		helper('date');

		$this->user_model = new UserModel();
		$this->csmodel = new CourseModel();
		$this->new_stdmodel = new StudentModel();

		}

		public function index()
			{
				$data = [];


			$loginUser = session()->get('loginUser');
			
				if ($loginUser=="Student") {

									return  view("dashboard/student/student_dashboard",$data);
						}

				}




			public function course_select($rest)
					{
						$session = session();
						$session->set('cstype',$rest);
						if ($rest==1){
							$session->set('is_parent',0);
						}
						else{
							$session->set('is_parent',1);
						}
						return redirect()->to('/dashboard');

					}


					public function view_guest_course()
					{
						 $data= [];
					   $data['course_school'] = 	$this->csmodel->getSchoolStudentCourseList();
						 $data['course_school_leaver'] = 	$this->csmodel->getSchoolLeaversCourseList();

						 return  view("dashboard/guest/courses/guest_courses",$data);
						 echo var_dump($data);
					}

}
