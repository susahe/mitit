<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User\UserModel;
use App\Models\DaysModel;
use App\Models\User\TestModel;
use App\Models\Course\CourseModel;
use App\Models\EnrolModel;

use App\Models\Test\Custom;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;


class Test extends BaseController
{

				private $model;

				public function __construct()

				{
					// helper classess
					helper('form');
					helper('date');

					// Using Model create Objects
					$this->model = new TestModel();

				}





							public function  test()
							{


									$data=[];



										$userdata =
														[
															'pid' => 1,
															'status' => 1,

														];

										$this->model->insert($userdata);

										var_dump($this->model->findAll());


									}



}
