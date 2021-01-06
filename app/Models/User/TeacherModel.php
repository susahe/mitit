<?php namespace App\Models\User;

use CodeIgniter\Model;


class TeacherModel extends Model {
  protected $table ='tbl_teacher';
  protected $primaryKey = 'teacher_id_pk';
  protected $allowedFields = ['address','nic','birthdate','mobile','hometel','slug','teacher_status','user','created','update'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];





}
