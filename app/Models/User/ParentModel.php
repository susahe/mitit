<?php namespace App\Models\User;

use CodeIgniter\Model;


class ParentModel extends Model {
  protected $table ='tbl_parent_student';
  protected $primaryKey = 'rel_id_pk';
  protected $allowedFields = ['prt_id_fk','std_id_fk','created','update','status'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];


  public function select_students_from_parent($p_id)
  {
    if ($p_id)
    {

    //   $this->join('tbl_users','tbl_users.user_id_pk=tbl_parent_student.prt_id_fk','LEFT');
    //   //  $this->join('tbl_users','tbl_users.user_id_pk=tbl_parent_student.prt_id_fk');
    //   $this->select('*');
    // //  $this->where('tbl_users.user_role','Child')
    // //  $this->select('tbl_users.firstname,tbl_users.lastname');
    //   //$this->select('tbl_users.firstname,tbl_users.lastname,tbl_student.address,tbl_student.gender,tbl_student.nic,tbl_student.birthdate,tbl_student.student_status');
    // //  $this->join('tbl_users', 'tbl_users.user_id_pk=tbl_parent_student.std_id_fk');
    //   // $this->select('tbl_users.firstname,tbl_users.lastname');
    //   // $this->where('tbl_parent_prt_id_fk',$p_id);
    //   // $this->where('tbl_parent_student.std_id_fk','tbl_users.user_id_pk');
    //   // $this->where('tbl_student.user_id','tbl_users.user_id_pk');
    //   $this->where('tbl_parent_student.prt_id_fk',$p_id);
    // //  $this->join('tbl_users', 'tbl_users.user_id_pk=tbl_parent_student.prt_id_fk' );
    // //  $this->join('tbl_student', 'tbl_student.user_id= tbl_users.user_id_pk');
    // //  $this->join('tbl_student','tbl_parent_student.std_id_fk=tbl_users.user_id_pk');
    //   $student = $this->get()->getResultArray();
    //   $this->distinct();
    //   return $student;

    $this->select('*');
    $this->where('prt_id_fk', $p_id);
    $this->join('tbl_users','tbl_users.user_id_pk=tbl_parent_student.std_id_fk');
    $this->select('tbl_users.firstname,tbl_users.lastname');
    $this->join('tbl_student','tbl_users.user_id_pk=tbl_student.user_id');

    $student = $this->get()->getResultArray();
    return $student;
 }}

public function get_all_parent_accounts()
{
      $this->select('*');
        $this->join('tbl_users','tbl_users.user_id_pk=tbl_parent_student.std_id_fk');
        $this->select('tbl_users.firstname,tbl_users.lastname');
        $this->join('tbl_student','tbl_users.user_id_pk=tbl_student.user_id');
        $student = $this->get()->getResultArray();
        return $student;
}

}
