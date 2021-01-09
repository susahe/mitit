<?php namespace App\Models\User;

use CodeIgniter\Model;


class StudentModel extends Model {
  protected $table ='tbl_student';
  protected $primaryKey = 'student_id_pk';
  protected $allowedFields = ['address','gender','nic','birthdate','mobile','hometel','slug','student_status','education','user_id'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];


  public function get_all_students($slug = false)
  {
      if ($slug === false)
      {
          return $this->findAll();
      }
      return $this->asArray()
                  ->where(['slug' => $slug])
                  ->first();
   }

   public function get_all_student_with_username()
   {
   $this->select('*');
   $this->join('tbl_users','tbl_users.user_id_pk=tbl_student.user_id');
   $this->select('tbl_users.firstname,tbl_users.lastname');

   $students = $this->get()->getResultArray();
   return $students;
  }
}
