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

		$this->model = new UserModel();
		$this->csmodel = new CourseModel();
		$this->new_stdmodel = new StudentModel();

		}

		public function index()
			{
				$data = [];
				$session = session();
				$cstype = session()->get('cstype');
				$id= session()->get('id');
				$loginUser = session()->get('loginUser');
				$data['student_status']=$this->new_stdmodel->getStudent_status($id);
				$session->set('student_status',$data['student_status']);
			 //print_r($data['student_status']);
			//	print_r($loginUser);

			$data['student_reg'] = $this->new_stdmodel->totl_num_registred_students();
			 $data['student_active'] = $this->new_stdmodel->totl_num_active_students();
			 	$data['is_application_submited'] = $this->new_stdmodel->is_submit_application($id);

				if (($loginUser=="Student")&&($data['student_status']==1)) {
					//$data['students'] = $this->new_stdmodel->get_newly_reg_students();
				//print_r($data['student_status']);
					//print_r($loginUser);
							$data['enroled_courses'] = $this->csmodel->enrollCourses($id);
							$data['student_user'] = $this->model->getUserById($id);
						return  view("dashboard/student/student_dashboard",$data);
						}

				elseif ($loginUser=="Staff"){
				$data['staff_user'] = $this->model->getUserById($id);
				$data['students'] = $this->new_stdmodel->get_newly_reg_students();
	 		  return  view("dashboard/staff/staff_dashboard",$data);

				}

				elseif ($loginUser=="Teacher"){

				 $data['students'] = $this->new_stdmodel->get_newly_reg_students();
		 		 return  view("dashboard/teacher/teacher_dashboard",$data);

				}
				elseif ($loginUser=="Parent"){
 				$data['courses']= $this->csmodel->getSchoolLeavers();
				 return  view("dashboard/parent/parent_dashboard",$data);

				}

				elseif ($loginUser=="Admin"){
				$data['students'] = $this->new_stdmodel->get_newly_reg_students();
				 return  view("dashboard/admin/admin_dashboard",$data);

				}
				else{
					$data['guest_user'] = $this->model->getUserById($id);

					print_r($data['student_reg']);
					$session= session();
					$session->setFlashdata('danger', "Before you have to proceed you have to fill your profile page");
					return  view("dashboard/guest/guest_dashboard",$data);
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
