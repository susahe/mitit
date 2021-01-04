<?php namespace App\Libraries;
use App\Models\UserModel;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
namespace App\Libraries;

class Curd{
  public function __construct()
            {
              helper('form');
              helper('date');
            }

public function create($rules,$newdata,$model)
    {
              $data=[];


              if (! $this->validate($rules))
                         {

                                     $data['validation']= $this->validator;
                         }
            else
                {
                        $this->model->save($newdata);
                        $user_id = $this->model->getInsertID();
                        $myTime = new Time('now');
                        $time = Time::parse($myTime);
                        $preregid = $time->getYear().$user_id;
                        $gmail =$newdata['email'];
                        $email_message=	$this->mail->user_reg_sendmail($gmail,$preregid);
                        $message = "You areSucessfuly registred your Pre Registration Id is"." ".$preregid." ".$email_message;
                        $session= session();
                        $session->setFlashdata('sucess', $message);
                        return redirect()->to('/view_users');
                    }


          return  $data;

  }


  public function edit_user($rules,$newdata)
    {
            $data=[];

              $this->model->save($newdata);
              session()->setFlashdata('sucess', 'Sucessfully Updated');
              return redirect()->to('/view_users');


            $data['user']=$this->model->where('idusers',session()->get('id'))->first();
            return view("users/user_profile_view",$data);
  }


// Activate or Deactivate Objects
public function change_status($id,$tbl_id,$stat,$model)
    {
        $newdata=[];
         if ($stat==0){
         $newdata =
                 [
                   $tbl_id  =>$id ,
                 'status'=>1,
                   'update' => date('Y-m-d H:i:s',now()),
                 ];
      }
           else{

             $newdata =
                     [
                       $tbl_id  =>$id ,
                     'status'=>0,
                       'update' => date('Y-m-d H:i:s',now()),
                     ];

        }
                  $model->save($newdata);


      }

      public function update_lastlogin($id,$tbl_id,$stat,$model)
          {
              $newdata=[];


               $newdata =
                       [
                        $tbl_id =>$id,
                         'lastlogin' => date('Y-m-d H:i:s',now()),

                       ];


                        $model->save($newdata);


            }



}

?>
