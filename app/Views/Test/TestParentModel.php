<?php namespace App\Models\User;

use CodeIgniter\Model;


class ParentModel extends Model {
  protected $table ='tbl_parent_student';
  protected $primaryKey = 'rel_id_pk';
  protected $allowedFields = ['prt_it_fk','std_id_fk','created','update','status'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];



  public function getusers($slug = false)
  {
      if ($slug === false)
      {
          return $this->findAll();
      }

      return $this->asArray()
                  ->where(['slug' => $slug])
                  ->first();
  }

  public function getStudent($id)
  {
      return $this->asArray()
                  ->where(['id'=> $id])
                  ->first();
  }





  public function getStudents()
  {


  //  $builder->db->table('student');
    $this->select('*');
    $this->join('users', 'student.id = users.id' );
    $student = $this->get()->getResultArray();
    return $student;


  }

public function  get_newly_reg_students(){
  $this->select('users.id,users.firstname,users.lastname,users.slug,student.address,student.status');
  $this->where('student.status',0);
  $this->join('users','student.id = users.id');
  $new_student= $this->get()->getResultArray();
  return $new_student;

}


public function all()
{
  $this->db->table('student')->get->getResult();
}

}
