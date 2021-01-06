<?php namespace App\Course\Models;

use CodeIgniter\Model;



class CourseModuleModel extends Model {
  protected $table ='modules';
  protected $primaryKey = 'id';
  protected $allowedFields = ['course','mdname','cstheryhrs','cspracthrs','csprojecthrs','csslug','csduemonths','status','updated','created'];


public function getCoursesModules($slug=null){
  if(!$slug){
    return $this->findAll();
  }

  return $this->asArray()
          ->where(['csslug'=>$slug])
          ->first();
}
function getCountCoursesModules(){

return $query = $this->countAll() ;
}

public function selectCourseById($course_id)
{
    $result = $this->select('csname')
        ->where('id',$course_id)
        ->first();


    return $result;
}

public function getCourseById($id){

   return $this->db->table('courses')
         ->where('id',$id)
         ->get()
         ->getResults();

}



}
