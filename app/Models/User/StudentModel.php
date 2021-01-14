<?php namespace App\Models\User;

use CodeIgniter\Model;


class StudentModel extends Model {
  protected $table ='tbl_student';
  protected $primaryKey = 'id';
  protected $allowedFields = ['student_id_fk','address','gender','nic','birthdate','mobile','hometel','slug','student_status','education'];
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
   $this->join('tbl_users','tbl_users.user_id_pk=tbl_student.student_id_fk');
   $this->select('tbl_users.firstname,tbl_users.lastname');

   $students = $this->get()->getResultArray();
   return $students;
  }
public function get_child_from_id($id)
{
  $this->select('tbl_users.firstname,tbl_users.lastname');
  $this->where('user_id_pk',$id);
  return $this->asArray()->first();
}

}
