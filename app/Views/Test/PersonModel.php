<?php namespace App\Models\User;

use CodeIgniter\Model;




class PersonModel extends Model
  {

    protected $table ='person';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user','address','gender','nic','birthdate','hometel','slug','status','update','username'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];






    protected function beforeInsert(array $data)
      {
          $data = $this->passwordHash($data);
          return $data;
      }


    protected function beforeUpdate(array $data)
      {

       $data = $this->passwordHash($data);
       return $data;
      }




      public function getParent_status($id)

      {

        $this->select('status');
        $this->where('user',$id);
        $parent = $this->get()->getResultArray();
        return $parent;


      }


















    protected function passwordHash(array $data)
      {
        if(isset($data['data']['password']))
        $data['data']['password']=password_hash( $data['data']['password'],PASSWORD_DEFAULT);
        return $data;
      }


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

       public function getuser_from_email($email)
       {
           if ($email)
           {

                  return $this->asArray()->select('id,email,status,firstname,lastname')
                       ->where(['email' => $email])
                       ->first();
        }
      }

       public function getUserStatusById($id){

          return $this->db->table($this->table)
                ->where('id',$id)
                ->get()
                ->getRow();

       }

       public function update_lastlogin(array $data)
       {


       }

       // create personal details
       public function personal_details_add()
       {

       }

       // update person details
       public function personal_details_edit()
       {

       }


  }
