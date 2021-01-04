<?php namespace App\Models\Test;

use CodeIgniter\Model;


class TestModel extends Model {
  protected $table ='users';
  protected $primaryKey = 'id';
  protected $allowedFields = ['role','lastogin','firstname','lastname','update','slug','status','created'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];


protected $validationRules = [
    'address' => 'required',
    'days' => 'required',
    'time' => 'required'


];


protected $validationMessages = [

  'adresss' => ['required'=>'Sorry you are not allowed to move foward'],
  'days' => ['required' =>'this is needed'],
  'time'=> ['required'=>'this is must field'],
	'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]|is_unique[users.mobile]',

];

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

  public function getStudent($id)
  {
      return $this->asArray()
                  ->where(['id'=> $id])
                  ->first();
  }

  public function getuser_from_id($id)
  {
      if ($id)
      {

             return $this->asArray()->select('id,email,status,firstname,lastname')
                  ->where(['id' => $id])
                  ->first();
   }}
}
