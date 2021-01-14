<?php namespace App\Models\User;

use CodeIgniter\Model;




class UserModel extends Model
  {

    protected $table ='tbl_users';
    protected $primaryKey = 'user_id_pk';
    protected $allowedFields = ['email','password','user_role','firstname','lastname','slug','status','created','update','lastlogin','user_name','lastchange'];
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


      public function get_child_from_id($id)
      {
        $this->select('firstname,lastname');
        $this->where('user_id_pk',$id);
        return $this->asArray()->first();
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

                return $this->asArray()->select('user_id_pk,email,status,user_role,firstname,lastname,lastchange')
                     ->where(['user_id_pk' => $id])
                     ->first();
      }}




      public function get_all_users($slug = false)
      {
          if ($slug === false)
          {
              return $this->orderBy('user_id_pk','DESC')->findAll();
          }
          return $this->asArray()
                      ->where(['slug' => $slug])

                      ->first();
       }

       public function change_status($id,$stat)
           {
               $newdata=[];
                if ($stat==0){
                $newdata =
                        [
                          'user_id_pk'  =>$id ,
                        'status'=>1,
                          'update' => date('Y-m-d H:i:s',now()),
                        ];
             }
                  else{

                    $newdata =
                            [
                              'user_id_pk'  =>$id ,
                            'status'=>0,
                              'update' => date('Y-m-d H:i:s',now()),
                            ];

               }
                         $this->save($newdata);


             }
  }
