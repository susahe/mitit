<?php namespace App\Models\Enroll;

use CodeIgniter\Model;


class DaysModel extends Model {
  protected $table ='days';
  protected $primaryKey = 'id';
  protected $allowedFields = ['user','days'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];

public function get_days_id($id)

{
  $result = $this->select('id,days')
      ->where('user',$id)
      ->findAll();


  return $result;
}


}
