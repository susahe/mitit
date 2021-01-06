<?php namespace App\Controllers;
use App\Models\User\UserModel;
use App\Models\User\ParentModel;
use App\Models\Course\CourseModel;
use App\Models\User\StudentModel;
use CodeIgniter\I18n\Time;
class Dashboard extends BaseController
{
	private $model;
	private $csmodel;
	private $new_stdmodel;
	private $parent_model;
	public function __construct()

	{
		helper('form');
		helper('date');

		$this->user_model = new UserModel();
		$this->cs_model = new CourseModel();
		$this->new_stdmodel = new StudentModel();
		$this->parent_model =new ParentModel();
		}

		public function index()
			{
				$data = [];


			$loginUser = session()->get('loginUser');
			$loginid = session()->get('id');

				if ($loginUser=="Student") {

									$data['childs'] = $this->parent_model->select_students_from_parent($loginid);
									return  view("dashboard/student/student_dashboard",$data);
						}

						elseif ($loginUser=="Child"){
							$data=[];

						 return  view("dashboard/child/child_dashboard",$data);

						}

						elseif ($loginUser=="Admin"){
							$data=[];

						 return  view("dashboard/admin/admin_dashboard",$data);

						}

				}

				public function student_profile_view($id)
				{
							$data=[];
							$myTime = new Time('now');
							$time = Time::parse($myTime);
							$year = $time->getYear()-6;
							$data['bdate']= $year.'-12-31';
							$data['courses'] = $this->cs_model->getCourses();
				     return  view("dashboard/student/student_profile_view",$data);
				}

				public function student_courses()
				{
							$data=[];
							$data['courses'] = $this->cs_model->getCourses();
				     return  view("dashboard/student/student_courses",$data);
				}

				public function student_schedules()
				{
							$data=[];
							$data['payment'] = '';
				     return  view("dashboard/student/student_schedules",$data);
				}

				public function student_grades()
				{
							$data=[];
							$data['payment'] = '';
						 return  view("dashboard/student/student_grades",$data);
				}

				public function student_payments()
				{
					$data=[];
					$data['payment'] = '';
					return  view("dashboard/student/student_payments",$data);
				}


				public function student_view_child_accounts()
				{
							$data=[];
							$loginid = session()->get('id');
							$data['childs'] = $this->parent_model->select_students_from_parent($loginid);
							return view("dashboard/student/students_child_accounts",$data);
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
