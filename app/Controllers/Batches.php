<?php namespace App\Controllers;
use App\Models\Users\UserModel;
use App\Models\DaysModel;
use App\Models\Batch\BatchModel;
use App\Models\Batch\StudentRegisterModel;
use App\Models\User\TeacherModel;
use App\Models\Course\CourseModel;
use App\Models\EnrolModel;

use App\Models\Custom;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;


class Batches extends BaseController
{
	private $teacher_model;
	private $student_register_model;
	private $batch_model;
	private $course_model;
				public function __construct()

				{
					// helper classess
					helper('form');
					helper('date');
					$this->batch_model = new BatchModel();
					$this->teacher_model = new TeacherModel();
					$this->course_model =  new CourseModel();
					$this->student_register_model = new StudentRegisterModel();
				}


				public function index()
				{
					$data=[];


				}












							public function  create_batch()
							{

								$data=[];
								if ($this->request->getMethod()=='post')
								{
								$rules=[
									'batch_code'=> 'required|min_length[3]|max_length[255]',
									'course_id_fk'=> 'required|max_length[5]',
									'max_students'=> 'required',
									'start_date'=> 'required',
									'end_date' => 'required',

								];
							 if (! $this->validate($rules)){

								$data['validation']= $this->validator;
							}
							 else
								{



								$newdata = [

									'batch_code' => $this->request->getVar('batch_code'),

									'teacher_batch_id_fk' => $this->request->getVar('teacher_id_pk'),
									'batch_year' => $this->request->getVar('batch_year'),
									'max_students' => $this->request->getVar('max_students'),
											'course_id_fk' => $this->request->getVar('course_id_fk'),
									'start_date' => $this->request->getVar('start_date'),
									'end_date' => $this->request->getVar('end_date'),
								];

							$this->batch_model->save($newdata);


								$message = "Sucessfuly Added to the database";

								$session= session();

								$session->setFlashdata('sucess', $message);

								return redirect()->to('/admin_batches');
							 }
						}
								$data['courses'] = $this->course_model->get_course_list();
								$data['teacher']= $this->teacher_model->select_course_teacher($data['courses']['']);
								return view('/courses/admin/create_batch_admin',$data);

									}




	public function apply_for_batch($id)
									{

										$data=[];
										if ($this->request->getMethod()=='post'){


											$rules=[
												'teacher_stdregister_id_fk' => 'required',
												'batch_std_reg_id_fk' =>'required',
												'std_register_id_fk'=>'required',

											];
											if (! $this->validate($rules)){

											$data['validation']= $this->validator;
											}
											else
											{



											$newdata = [

												'teacher_stdregister_id_fk' => $this->request->getVar('teacher_stdregister_id_fk'),
												'batch_std_reg_id_fk' => $this->request->getVar('batch_std_reg_id_fk'),
												'std_register_id_fk' => $this->request->getVar('std_register_id_fk'),


											];

											$this->student_register_model ->save($newdata);


											$message = "Sucessfuly Added to the database";

											$session= session();

											$session->setFlashdata('sucess', $message);

											return redirect()->to('/student_courses');
											}


										}


											 	$data['course'] = $this->batch_model->course_slug($id);
											  $data['course'] = $this->course_model->getCourses($data["course"]["csslug"]);
												$data['batches'] = $this->batch_model->get_all_batches_by_courseId($data['course']['cs_id_pk']);
												$data['current_batch'] = $this->batch_model->selectbatch($id);
										//	 echo var_dump($data);
											$cs = '/apply_for_course'.'/'.$data["course"]["csslug"];
											return view("courses/students/apply_for_course",$data);
									}


}
