<?php namespace App\Models;

use CodeIgniter\Model;



class CourseModel extends Model {
  protected $table ='courses';
  protected $primaryKey = 'idcourse';
  protected $allowedFields = ['coursename','courseduraion','coursefees'];

}
