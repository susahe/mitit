<?php namespace App\Models\Course;

use CodeIgniter\Model;



class CourseModel extends Model {
  protected $table ='tbl_courses';
  protected $primaryKey = 'cs_id_pk';
  protected $allowedFields = ['csname','cstheryhrs','cspracthrs','csassinghrs','csprojecthrs','csfees','cstype','csperyear','csslug','csduemonths','csperyear','status','updated','created','courseobjective','cscode','no_installation','teacher_id_fk','max_students'];



  public function getSchoolStudentCourseList()
  {
    $this->select('id,csname,cstheryhrs,cspracthrs,csduemonths,csslug,status,csfees,cstype,csimage','courseobjective','cscode');
    $this->where('cstype','1');
    $this->where('status','1');
    $courselist = $this->get()->getResultArray();
    return $courselist;


  }


    public function getSchoolLeaversCourseList()
    {
      $this->select('id,csname,cstheryhrs,cspracthrs,csduemonths,csslug,status,csfees,cstype,csimage','courseobjective','cscode');
      $this->where('cstype','2');
      $this->where('status','1');
      $courselist = $this->get()->getResultArray();
      return $courselist;


    }



    public function selectCourseById($course_id)
    {
        $result = $this->select('csname')
            ->where('id',$course_id)
            ->first();
        return $result;
    }



      public function get_course_list1()
      {
        $this->select('cs_id_pk,csname');
        $courselist = $this->get()->getResultArray();
        return $courselist;
        $this->join('tbl_courses','tbl_courses.teacher_id_fk=tbl_teacher.teacher_id_pk');
        //$this->where('tbl_courses.cs_id_pk',$csid);
        $this->join('tbl_users','tbl_users.user_id_pk=tbl_teacher.teacher_id_pk');
        $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname,tbl_courses.cs_id_pk');
        $teacher = $this->get()->getResultArray();
        return $teacher;

      }




          public function get_course_list()
          {
      $this->select('cs_id_pk,csname,teacher_id_fk');

      //$this->where('tbl_courses.cs_id_pk',$csid);
      $this->join('tbl_users','tbl_courses.teacher_id_fk=tbl_users.user_id_pk');
      $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname,tbl_courses.cs_id_pk');
      $teacher = $this->get()->getResultArray();
      return $teacher;

      $courselist = $this->get()->getResultArray();
      return $courselist;


    }










public function getCourses($slug=null){
  if(!$slug){
    return $this->findAll();
  }

  return $this->asArray()
          ->where(['csslug'=>$slug])
          ->first();
}

function getCountCourses(){

return $query = $this->countAll() ;
}



public function getSchoolStudents()
{
  $this->select('id,csname,cstheryhrs,cspracthrs,csduemonths,csslug,status,csfees,cstype,csimage');
  $this->where('cstype','1');
  $this->where('status','1');
  $student = $this->get()->getResultArray();
  return $student;
}

public function getSchoolLeavers()
{
  $this->select('id,csname,cstheryhrs,cspracthrs,csduemonths,csslug,status,csfees,cstype,csimage');
  $this->where('cstype','2');
  $this->where('status','1');
  $student = $this->get()->getResultArray();
  return $student;
}

public function getStudentnon()
{
    $this->select('*');
    $this->where('cstype','3');
    $student= $this->get()->getResultArray();
    return $student;
}

public function getselectedCourse($id)
{
  $result = $this->select('id,csname')
      ->where('id',$id)
      ->first();

  return $result;
}


public function getAdminCourses()
{


//  $builder->db->table('student');


  return $this->findAll();



}
public function enrollCourses($userid)
{
  $this->select('courses.id,courses.csname,courses.csslug');
  $this->where('enroll.user',$userid);
  $this->join('enroll','enroll.course = courses.id');
  $new_student= $this->get()->getResultArray();
  return $new_student;


}

public function selectteacherid($csid){
  $result = $this->select('teacher_id_fk')
      ->where('cs_id_pk',$csid)
      ->first();

  return $result;

}

}
