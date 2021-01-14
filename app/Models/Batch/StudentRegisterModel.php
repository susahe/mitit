<?php namespace App\Models\Batch;

use CodeIgniter\Model;


class StudentRegisterModel extends Model {
  protected $table ='tbl_student_register';
  protected $primaryKey = 'reg_id_pk';
  protected $allowedFields = ['std_register_id_fk','batch_std_reg_id_fk','teacher_batch_id_fk','status','addmision','installment','completed'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];






}
