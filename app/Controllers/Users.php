<?php namespace App\Controllers;

class Users extends BaseController
{
	// login
	public function index()
	{
		helper('form');
		$data = [];
		echo view('templates/header',$data);
		echo view('templates/nav');
		echo view("login");
  	    	echo view("templates/footer");
		
	}
	//--------------------------------------------------------------------

	// Register 

	public function register()
	{
		$data=[];
		helper('form');
		
		if ($this->request->getMethod()=='post')
		{
			$rules=[
				'firstname'=> 'required|min_length[3]|max_length[20]',
				'lastname'=> 'required|min_length[3]|max_length[20]',
				'email'=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email],',
				'password'=> 'required|min_length[3]|max_length[20]',
				'cpassword'=> 'matches[password]',
			];
		 if (! $this->validate($rules)){
		 
		 	$data['validation']= $this->validator;
		}
		 else
		  {
		  // 
		 }
		}
		echo view('templates/header',$data);
		echo view('templates/nav');
		echo view("register");
  	    	echo view("templates/footer");
		 
		
	
	}
}

