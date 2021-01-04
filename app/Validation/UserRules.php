<?php namespace App\Validation;
use App\Models\User\UserModel;
use CodeIgniter\I18n\Time;



class UserRules {

  public function __construct()
            {

              helper('date');
            }


  public function is_activativation_key_available(string $str, string $fields, array $data):bool
  {
    $model = new UserModel();
    $user = $model->select('user_id_pk,email')
          ->where('email',$data['email'])
          ->first();
    $user_id = $user['user_id_pk'];
    $myTime = new Time('now');
    $time = Time::parse($myTime);
    $number = sprintf('%04d',$user_id);
    $preregid = $time->getYear().$number;
	  print_r($preregid);
    echo var_dump($user);

          if (($data['activatekey']==$preregid)&&($data['email']==$user['email']))
            return true;
          else
            return false;
  }


public function is_notindb(string $str, string $fields, array $data):bool
{
  $model = new UserModel();
  $user = $model->where('email',$data['email'])
        ->first();

  if (!$user)
    return false;


    return true;
}

  public function validateUser(string $str, string $fields, array $data):bool
  {

    $model = new UserModel();
    $user = $model->where('email',$data['email'])
          ->first();

    if (!$user)
      return false;


      return password_verify($data['password'],$user['password']);


  }

  public function is_activeted(string $email,$fields, array $data):bool
  {

    $model = new UserModel();
    $user = $model->where('email',$data['email'])
            ->where('status',1)
            ->first();

    if (!$user)
      return true;
    else

      return false;


  }


  public function is_active(string $email,$fields, array $data):bool
  {

    $model = new UserModel();
    $user = $model->where('email',$data['email'])
            ->where('status',1)
            ->first();

    if (!$user)
      return false;
    else

      return true;


  }

  public function user_not_registred(string $email,$fields, array $data):bool
  {

    $model = new UserModel();
    $user = $model->where('email',$data['email'])
                  ->first();

    if (!$user)
      return false;
    else

      return true;


  }
}
