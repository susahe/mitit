<?php namespace App\Controllers;
use App\Models\Users\UserModel;
use App\Models\Test\TestModel;
use App\Models\Custom;
use App\Libraries\Curd;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Test extends BaseController
{
	private $model;
	private $mail;
	private $curd;
	private $test;

	public function __construct()
						{
							helper('form');
							// $this->model = new TestModel();
							// $this->mail = new Send_Mail();
							// $this->curd = new Curd();
							// $this->test = new TestModel();

						}

public function  index()
{
	// 	// $data=[];
	// 	 $data['users']= 	$this->model->getuser_from_id(1);
	// 	// print_r($data);
	//
	// //echo view('test/test',$data);
	// // Create a basic QR code
	//
	//
  // echo $data['users']['firstname']." ".$data['users']['lastname'];


	$qrcode = new QrReader('path/to_image');
	$text = $qrcode->text(); //return decoded text from QR Code

}
public function create_student()
{
			$data=[];
	if ($this->request->getMethod()=='post')

				$data =[
							'address' => $this->request->getVar('address'),
							'days' => $this->request->getVar('days'),
							'time' => $this->request->getVar('time'),
				];

				$rules = $this->test->validationRules;


												 if (! $this->validate($rules))
																		{
																								$data['validation']= $this->validator;
																		}

												else
														{

																		$this->test->save(	$data);

																		return redirect()->to('/test');
																}

return  view('test/test', $data);
}


public function create_user()
		{
							$data=[];
    if ($this->request->getMethod()=='post'){
									$rules=
															[
																		'firstname'=> 'required|min_length[3]|max_length[20]',
																		'lastname'=> 'required|min_length[3]|max_length[100]',
																		'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
																		'password'=> 'required|min_length[8]|max_length[255]',
																		'mobile'=> 'required|min_length[10]|max_length[10]|valid_phone_number[mobile]|is_unique[users.mobile]',
																		'cpassword'=>
																			[
																				'label' => "Confirm Password",
																				'rules'=> 'matches[password]',
																				'errors'=> [
																												'matches'=>" Confirm password should be match with password"
																									 ]
																			]
															];


												$newdata =
																[

																	'email' => $this->request->getVar('email'),
																	'password' => $this->request->getVar('password'),
																	'role' => $this->request->getVar('role'),
																	'firstname' => $this->request->getVar('firstname'),
																	'lastname' => $this->request->getVar('lastname'),
																	'mobile' => $this->request->getVar('mobile'),
																	'slug' => url_title($this->request->getVar('email')),
																];


												$data = $this->curd->create($rules,$newdata,	$this->model);
												return redirect()->to('/view_users');
	echo var_dump($data);
					}

					return  view("users/create_user",$data);
	}

	public function activate_user($id)
			{
						$this->curd->change_status($id,$model);
						return redirect()->to('/view_users');
			}


			public function edit_user(){

						$data=[];
						helper('form');
							$model = new UserModel();
						if ($this->request->getMethod()=='post')
						{
							$rules=[
								'firstname'=> 'required|min_length[3]|max_length[20]',
								'lastname'=> 'required|min_length[3]|max_length[20]',
							];
							if ($this->request->getPost('password')!=''){
								$rules['password']= 'required|min_length[3]|max_length[20]';
								$rules['cpassword']= 'matches[password]';
							}

						 if (! $this->validate($rules)){

							$data['validation']= $this->validator;
						}
						 else
							{


							$newdata = [
								'idusers' => session()->get('id'),
								'role' => $this->request->getPost('role'),
								'firstname' => $this->request->getPost('firstname'),
								'lastname' => $this->request->getPost('lastname'),
								'email' => $this->request->getVar('email'),
								'mobile'=> $this->request->getVar('mobile'),
								'slug' => url_title($this->request->getVar('email')),
								'update' => date('Y-m-d H:i:s',now()),
							];

				if ($this->request->getPost('password')!=''){
					$newdata['password']= $this->request->getPost('password');
				}


						//	echo var_dump($newdata);
							//$model->update(session()->get('id'),$newdata);
						//	$model->update($newdata['idusers'], $newdata);
							$model->save($newdata);
							session()->setFlashdata('sucess', 'Sucessfully Updated');
							return redirect()->to('/');
						 }
						}
						$data['user']=$model->where('idusers',session()->get('id'))->first();


						return view("users/user_profile_view",$data);
	}

}
