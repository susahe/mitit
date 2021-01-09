<?php namespace App\Models\User;

use CodeIgniter\Model;


class TestModel extends Model {
  protected $table ='test';
  protected $primaryKey = 'pid';
  protected $allowedFields = ['pid','status'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];






  public function select_users_name_for_teachers()
  {



    $this->select('*');
    $this->join('tbl_users','tbl_users.user_id_pk=tbl_teacher.user_id_fk');
      $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname,');


    $student = $this->get()->getResultArray();
    return $student;
  }


  public function select_student_name_for_course()
  {



    $this->join('tbl_courses','tbl_courses.teacher_id_fk=tbl_teacher.user_id_fk');
    $this->join('tbl_users','tbl_users.user_id_pk=tbl_teacher.user_id_fk');
      $this->select('tbl_users.user_id_pk,tbl_users.firstname,tbl_users.lastname,');


    $student = $this->get()->getResultArray();
    return $student;
  }

}
