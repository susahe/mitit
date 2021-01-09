<?php namespace App\Controllers;
use App\Models\User\UserModel;
use App\Models\User\ParentModel;
use App\Models\User\TeacherModel;
use App\Models\Course\CourseModel;
use App\Models\Batch\BatchModel;
use App\Models\User\StudentModel;
use CodeIgniter\I18n\Time;
class Dashboard extends BaseController
{
	private $model;
	private $csmodel;
	private $student_model;
	private $parent_model;
	private $teacher_model;
	private $batch_model;
	public function __construct()

	{
		helper('form');
		helper('date');

		$this->user_model = new UserModel();
		$this->cs_model = new CourseModel();
		$this->student_model = new StudentModel();
		$this->parent_model =new ParentModel();
		$this->teacher_model = new TeacherModel();
		$this->batch_model = new BatchModel();
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
		elseif ($loginUser=="Teacher"){
			$data=[];

			return  view("dashboard/teacher/teacher_dashboard",$data);

		}
		elseif ($loginUser=="Staff"){
			$data=[];

			return  view("dashboard/staff/staff_dashboard",$data);

		}
		elseif ($loginUser=="Parent"){
			$data=[];

			return  view("dashboard/parent/parent_dashboard",$data);

		}

		elseif ($loginUser=="Admin"){
			$data=[];


			return  view("dashboard/admin/admin_dashboard",$data);

		}

	}


	// -----------------------------------------Admin Dashobard  ----------------------------------

	public function admin_profile_view()
	{
			$data=[];
			$myTime = new Time('now');
			$time = Time::parse($myTime);
			$year = $time->getYear()-6;
			$data['bdate']= $year.'-12-31';
			$data['courses'] = $this->cs_model->getCourses();
			return  view("dashboard/admin/admin_profile_view",$data);
	}

	public function admin_user_views()
	{
		$data=[];

		$data['users']=$this->user_model->get_all_users();
		return  view("dashboard/admin/admin_user_views",$data);
	}
	public function admin_student_views()
	{
		$data=[];
		$data['students'] = $this->student_model->get_all_student_with_username();
		return  view("dashboard/admin/admin_student_views",$data);
	}
	public function admin_teacher_views()
	{
		$data=[];
		$data['courses'] = $this->cs_model->getCourses();
			$data['teachers']= $this->teacher_model->select_users_name_for_teachers();
		return  view("dashboard/admin/admin_teacher_views",$data);
	}
	public function admin_parent_views()
	{
		$data=[];
		$data['parents'] = $this->parent_model->get_all_parent_accounts();
		return  view("dashboard/admin/admin_parent_views",$data);
	}
		public function admin_course_views()
		{
			$data=[];
			$data['courses'] = $this->cs_model->getCourses();
			return  view("dashboard/admin/admin_course_views",$data);
		}

		public function admin_batch_views()
		{
			$data=[];
			$data['batches'] = $this->batch_model->get_all_batches();
			return  view("dashboard/admin/admin_batch_views",$data);
		}
		public function admin_schedule_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_schedule_views",$data);
		}

		public function admin_grade_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_grade_views",$data);
		}

		public function admin_payment_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_payment_views",$data);
		}
		public function admin_attendance_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_attendance_views",$data);
		}
		public function admin_setting_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_setting_views",$data);
		}
		public function admin_report_views()
		{
			$data=[];
			$data['payment'] = '';
			return  view("dashboard/admin/admin_report_views",$data);
		}



	// -----------------------------------------Staff Dashobard  ----------------------------------

	public function staff_profile_view($id)
	{
		$data=[];
		$myTime = new Time('now');
		$time = Time::parse($myTime);
		$year = $time->getYear()-6;
		$data['bdate']= $year.'-12-31';
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/staff/staff_profile_view",$data);
	}

	public function staff_course_view()
	{
		$data=[];
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/staff/staff_course_views",$data);
	}

	public function staff_schedules_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/staff/staff_schedule_views",$data);
	}

	public function staff_grades_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/staff/staff_grade_views",$data);
	}

	public function staff_payments_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/staff/staff_payment_views",$data);
	}







	// -----------------------------------------Teacher Dashobard  ----------------------------------

	public function teacher_profile_view($id)
	{
		$data=[];
		$myTime = new Time('now');
		$time = Time::parse($myTime);
		$year = $time->getYear()-6;
		$data['bdate']= $year.'-12-31';
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/staff/staff_profile_view",$data);
	}

	public function teacher_course_view()
	{
		$data=[];
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/teacher/teacher_course_views",$data);
	}

	public function teacher_schedules_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/teacher/teacher_schedule_views",$data);
	}

	public function teacher_grades_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/teacher/teacher_grade_views",$data);
	}

	public function teacher_payments_view()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/teacher/teacher_payment_views",$data);
	}





	// ----------------------------------------Students Dashobard  ----------------------------------
	public function student_profile_view($id)
	{
		$data=[];
		$myTime = new Time('now');
		$time = Time::parse($myTime);
		$year = $time->getYear()-6;
		$data['bdate']= $year.'-12-31';
		$data['courses'] = $this->cs_model->getCourses();
		$data['users'] = $this->user_model->getuser_from_id($id);
		return  view("dashboard/student/student_profile_view",$data);
	}

	public function student_courses()
	{
		$data=[];
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/student/student_course_views",$data);
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

	// -----------------------------------------Child Dashobard  ----------------------------------

	public function child_profile_view($id)
	{
		$data=[];
		$myTime = new Time('now');
		$time = Time::parse($myTime);
		$year = $time->getYear()-6;
		$data['bdate']= $year.'-12-31';
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/child/child_profile_view",$data);
	}

	public function child_courses()
	{
		$data=[];
		$data['courses'] = $this->cs_model->getCourses();
		return  view("dashboard/child/child_courses",$data);
	}

	public function child_schedules()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/child/child_schedules",$data);
	}

	public function child_grades()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/child/child_grades",$data);
	}

	public function child_payments()
	{
		$data=[];
		$data['payment'] = '';
		return  view("dashboard/child/child_payments",$data);
	}

	public function return_parent_account($parentid)
	{

		$session= session();
		$data['user']=$this->user_model->getuser_from_id($parentid);

		$session->remove('childid');
		$session->set('loginUser', $data['user']['user_role']);
		$session->remove('child_firstname');
		$session->remove('child_lasname');


		return redirect()->to('/dashboard');
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
