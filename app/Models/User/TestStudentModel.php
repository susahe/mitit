<?php namespace App\Models\User;

use CodeIgniter\Model;


class StudentModel extends Model {
  protected $table ='student';
  protected $primaryKey = 'id';
  protected $allowedFields = ['user','created','update','slug','status','admimision','installment'];
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

  public function getStudent_status($id)

{


    $status= $this->asArray()->select('status')
                ->where(['user' => $id])
                ->where('status',1)
                ->first();
    if ($status){
      return 1;
    }
    else{
      return 0;
    }

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
  $this->select('users.id,users.firstname,users.lastname,users.slug,student.status');
  $this->where('student.status',0);
  $this->join('users','student.id = users.id');
  $new_student= $this->get()->getResultArray();
  return $new_student;

}


public function all()
{
  $this->db->table('student')->get->getResult();
}


public function test()

  {
      return $this->asArray()
                  ->where(['id'=> $id])
                  ->first();
  }

public function totl_num_registred_students()
{
          $this->select('*');
  return   $this->countAll();
}

public function totl_num_active_students()
{
          $this->select('*');
          $this->where('student.status',1);
  return   $this->countAllResults();
}

public function is_submit_application($id){
  $application=   $this->asArray()
              ->where(['user' => $id])
              ->first();
  if ($application){
    return true;
  }else {
    return false;
  }

}
}
