<?php namespace App\Models\User;

use CodeIgniter\Model;




class UserModel extends Model
  {

    protected $table ='tbl_users';
    protected $primaryKey = 'user_id_pk';
    protected $allowedFields = ['email','password','user_role','firstname','lastname','slug','mobile','status','created','update','lastlogin','user_name'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    // before insert  change the field
    protected function beforeInsert(array $data)
      {
          $data = $this->passwordHash($data);
          return $data;
      }

      // before update  change the field
    protected function beforeUpdate(array $data)
      {

       $data = $this->passwordHash($data);
       return $data;
      }

      // haspassword
    protected function passwordHash(array $data)
      {
        if(isset($data['data']['password']))
        $data['data']['password']=password_hash( $data['data']['password'],PASSWORD_DEFAULT);
        return $data;
      }

      // get user form his or him email
      public function getuser_from_email($email)
      {
          if ($email)
          {

                 return $this->asArray()->select('user_id_pk,email,status,firstname,lastname,user_role')
                      ->where(['email' => $email])
                      ->first();
       }
     }


     public function getuser_from_id($id)
     {
         if ($id)
         {

                return $this->asArray()->select('user_id_pk,email,status,user_role,firstname,lastname')
                     ->where(['user_id_pk' => $id])
                     ->first();
      }}

  }
