<?php namespace App\Models\User;

use CodeIgniter\Model;


class StudentModel extends Model {
  protected $table ='tbl_student';
  protected $primaryKey = 'student_id_pk';
  protected $allowedFields = ['address','gender','nic','birthdate','mobile','hometel','slug','student_status','education','user_id'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];





}
