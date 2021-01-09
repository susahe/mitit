<?php namespace App\Enroll\Models;

use CodeIgniter\Model;


class ScheduleModel extends Model {
  protected $table ='enroll';
  protected $primaryKey = 'id';
  protected $allowedFields = ['user','course','status','enroldate','closedate'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];







}
