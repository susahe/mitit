<?php namespace App\Course\Models;

use CodeIgniter\Model;



class CourseModuleTaskModel extends Model {
  protected $table ='tasks';
  protected $primaryKey = 'id';
  protected $allowedFields = ['module', 'tname',  'tduration',   'tasses',      'tslug',   'status',   'updated',   'created'];



public function getCoursesModulesTask($slug=null){
  if(!$slug){
    return $this->findAll();
  }

  return $this->asArray()
          ->where(['tslug'=>$slug])
          ->first();
}





}
