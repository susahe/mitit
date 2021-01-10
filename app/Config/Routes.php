<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

//----------------------------------------------------------------------------------------
// Home routes - Start Home Routes
//-----------------------------------------------------------------------------------------
// Login Modules
//================================ login Routes=======================================
$routes->match(['get','post'],'/login', 'Home::login',['filter'=>'noauth']);

//================================ Home Routes========================================
$routes->get('/', 'Home::index',['filter'=>'noauth']);
//================================Create user ========================================
$routes->match(['get','post'],'/create_user', 'Home::create_user',['filter'=>'noauth']);
// ================================activate email Routes ============================
$routes->match(['get','post'],'/activate_user_account', 'Home::activate_user_account',['filter'=>'noauth']);
// ================================Chnage Password============================
$routes->match(['get','post'],'/change_password', 'Home::change_password',['filter'=>'noauth']);
//================================ Lougout Routes ====================================
$routes->get('logout', 'Home::logout',['filter'=>'auth']);


//----------------------------------------------------------------------------------------
// Home routes - stop Home Routes
//-----------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------------
// Dashboard routes - Start Dashboard Routes
//-----------------------------------------------------------------------------------------
// Any one click dashboard  view
$routes->get('/dashboard', 'Dashboard::index',['filter'=>'auth']);


//=============================Student Dahsboard Routes========================================


$routes->get('/student_courses', 'Dashboard::student_courses',['filter'=>'auth']);
$routes->get('/student_profile_view/(:num)', 'Dashboard::student_profile_view/$1',['filter'=>'auth']);
$routes->get('/student_courses', 'Dashboard::student_courses',['filter'=>'auth']);
$routes->get('/student_schedules', 'Dashboard::student_schedules',['filter'=>'auth']);
$routes->get('/student_grades', 'Dashboard::student_grades',['filter'=>'auth']);
$routes->get('/student_payments', 'Dashboard::student_payments',['filter'=>'auth']);
$routes->get('/student_view_child_accounts', 'Dashboard::student_view_child_accounts',['filter'=>'auth']);

// ===============================================================================================

//=============================Child Dahsboard Routes========================================


$routes->get('/child_courses', 'Dashboard::child_courses',['filter'=>'auth']);
$routes->get('/child_profile_view/(:num)', 'Dashboard::child_profile_view/$1',['filter'=>'auth']);
$routes->get('/child_courses', 'Dashboard::child_courses',['filter'=>'auth']);
$routes->get('/child_schedules', 'Dashboard::child_schedules',['filter'=>'auth']);
$routes->get('/child_grades', 'Dashboard::child_grades',['filter'=>'auth']);
$routes->get('/child_payments', 'Dashboard::child_payments',['filter'=>'auth']);
$routes->get('/child_view_child_accounts', 'Dashboard::child_view_child_accounts',['filter'=>'auth']);
$routes->get('/return_parent_account/(:num)', 'Dashboard::return_parent_account/$1',['filter'=>'auth']);
// ===============================================================================================


//=============================Teacher Dahsboard Routes========================================


$routes->get('/techer_courses', 'Dashboard::teacher_course_view',['filter'=>'auth']);
$routes->get('/techer_profile_view/(:num)', 'Dashboard::teacher_profile_view/$1',['filter'=>'auth']);
$routes->get('/techer_courses', 'Dashboard::teacher_course_view',['filter'=>'auth']);
$routes->get('/techer_schedules', 'Dashboard::teacher_schedule_view',['filter'=>'auth']);
$routes->get('/techer_grades', 'Dashboard::teacher_grade_view',['filter'=>'auth']);
$routes->get('/techer_payments', 'Dashboard::cteacher_payment_view',['filter'=>'auth']);


// ===============================================================================================

//=============================Staff Dahsboard Routes========================================


$routes->get('/staff_courses', 'Dashboard::staff_course_views',['filter'=>'auth']);
$routes->get('/staff_profile_view/(:num)', 'Dashboard::staff_profile_view/$1',['filter'=>'auth']);
$routes->get('/staff_courses', 'Dashboard::staff_course_views',['filter'=>'auth']);
$routes->get('/staff_schedules', 'Dashboard::staff_schedule_views',['filter'=>'auth']);
$routes->get('/staff_grades', 'Dashboard::staff_grade_views',['filter'=>'auth']);
$routes->get('/staff_payments', 'Dashboard::staff_payment_views',['filter'=>'auth']);

// ===============================================================================================

//=============================Admin Dahsboard Routes========================================



$routes->get('/admin_profile', 'Dashboard::admin_profile_view',['filter'=>'auth']);
$routes->get('/admin_users', 'Dashboard::admin_user_views',['filter'=>'auth']);
$routes->get('/admin_students', 'Dashboard::admin_student_views',['filter'=>'auth']);
$routes->get('/admin_parents', 'Dashboard::admin_parent_views',['filter'=>'auth']);
$routes->get('/admin_childs', 'Dashboard::admin_child_views',['filter'=>'auth']);
$routes->get('/admin_teachers', 'Dashboard::admin_teacher_views',['filter'=>'auth']);
$routes->get('/admin_staff', 'Dashboard::admin_staff_views',['filter'=>'auth']);
$routes->get('/admin_courses', 'Dashboard::admin_course_views',['filter'=>'auth']);
$routes->get('/admin_schedules', 'Dashboard::admin_schedule_views',['filter'=>'auth']);
$routes->get('/admin_batches', 'Dashboard::admin_batch_views',['filter'=>'auth']);
$routes->get('/admin_grades', 'Dashboard::admin_grade_views',['filter'=>'auth']);
$routes->get('/admin_payments', 'Dashboard::admin_payment_views',['filter'=>'auth']);
$routes->get('/admin_attendance', 'Dashboard::admin_attendance_views',['filter'=>'auth']);
$routes->get('/admin_reports', 'Dashboard::admin_report_views',['filter'=>'auth']);
$routes->get('/admin_settings', 'Dashboard::admin_setting_views',['filter'=>'auth']);
// ===============================================================================================



//----------------------------------------------------------------------------------------
// Dashboard routes - End Dashboard Routes
//-----------------------------------------------------------------------------------------



$routes->match(['get','post'],'/course_select/(:num)', 'Dashboard::course_select/$1');

//-----------------------------
// Person profile
//------------------------------
$routes->get('/create_person_profile', 'Users::create_person_profile',['filter'=>'auth']);
$routes->match(['get','post'],'/profile_person_view', 'Users::profile_person_view',['filter'=>'auth']);




//----------------------------
// Guest
//---------------------------

// Guest Courses
$routes->get('/guest_courses', 'Dashboard::view_guest_course',['filter'=>'auth']);



//----------------------------
// Users routes
//----------------------------

$routes->match(['get','post'],'/system_created_users', 'Users::system_created_users',['filter'=>'auth']);
$routes->match(['get','post'],'/edit_user', 'Users::edit_user',['filter'=>'auth']);

$routes->get('/user_profile', 'Users::user_profile',['filter'=>'auth']);

$routes->match(['get','post'],'/activate_user/(:num)', 'Users::activate_user/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/deactivate_user/(:num)', 'Users::deactivate_user/$1',['filter'=>'auth']);
$routes->get('user_profile_view/(:segment)', 'Users::view_profile/$1',['filter'=>'auth']);


// Users -> Students  routes
//----------------------------

$routes->get('apply_for_course/(:segment)', 'Courses::apply_course/$1',['filter'=>'auth']);
$routes->match(['get','post'],'apply_for_batch/(:num)', 'Batches::apply_for_batch/$1',['filter'=>'auth']);


$routes->get('/child_accounts', 'Students::view_child_accounts',['filter'=>'auth']);
$routes->get('/view_student_profile/(:num)', 'Students::view_student_profile/$1',['filter'=>'auth']);
$routes->get('/add_child_account', 'Students::add_child_account',['filter'=>'auth']);

$routes->match(['get','post'],'/create_child_account', 'Students::create_child_account',['filter'=>'auth']);
$routes->match(['get','post'],'/create_student_profile', 'Students::create_student_profile',['filter'=>'auth']);


$routes->get('/apply_course/(:num)', 'Students::apply_course/$1',['filter'=>'auth']);
$routes->get('/view_users', 'Users::index',['filter'=>'auth']);
$routes->match(['get','post'],'/create_student', 'Students::create_student',['filter'=>'auth']);

$routes->match(['get','post'],'/set_days/(:alpha)', 'Students::set_days/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/edit_days/(:num)', 'Students::edit_days/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/remove_days/(:num)', 'Students::remove_days/$1',['filter'=>'auth']);


$routes->match(['get','post'],'/retirive_course_select/(:num)', 'Students::retirive_course_select/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/activate_student/(:num)', 'Students::activate_student/$1');
$routes->match(['get','post'],'/deactivate_student/(:num)', 'Students::deactivate_student/$1');

$routes->get('/students', 'Students::index',['filter'=>'auth']);

// Users -> Parents  routes
//----------------------------
$routes->get('/log_to_child/(:num)', 'Parents::activate_child_account/$1',['filter'=>'auth']);


$routes->add('/reate_student_by_parent', 'Parents::reate_student_by_parent/$1',['filter'=>'auth']);




$routes->get('/parents', 'Parents::index',['filter'=>'auth']);


// Users -> Staffs  routes
//----------------------------
$routes->get('/parents', 'Staffs::index',['filter'=>'auth']);


// Users -> Teachers  routes
//----------------------------
$routes->match(['get','post'],'//create_teacher', 'Teachers::create_teacher',['filter'=>'auth']);

$routes->get('/teachers', 'Teachers::index',['filter'=>'auth']);

$routes->match(['get','post'],'/set_days_teachers/(:alpha)', 'Teachers::set_days_teachers/$1',['filter'=>'auth']);



// Users -> Admin  routes
//----------------------------
$routes->get('/admin_edit_users/(:segment)', 'Users::admin_edit_users/$1',['filter'=>'auth']);

// Admin Created Users with all rolls
$routes->match(['get','post'],'/create_user_system', 'Users::system_created_users',['filter'=>'auth']);


// Edit users profile by the admin user
$routes->match(['get','post'],'/admin_edit_user', 'Users::admin_edit_user',['filter'=>'auth']);






//----------------------------------
// Courses
//---------------------------------

$routes->get('/courses', 'Courses::index',['filter'=>'auth']);
$routes->match(['get','post'],'create_course', 'Courses::create_course',['filter'=>'auth']);


$routes->get('course_view/(:segment)', 'Courses::view_course/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/activate_course/(:num)', 'Courses::activate_course/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/deactivate_course/(:num)', 'Courses::deactivate_course/$1',['filter'=>'auth']);

$routes->get('/coursemodule', 'CourseModule::index',['filter'=>'auth']);
$routes->match(['get','post'],'/activate_course_module/(:num)', 'CourseModule::activate_course_module/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/deactivate_course_module/(:num)', 'CourseModule::deactivate_course_module/$1',['filter'=>'auth']);


$routes->get('/coursemoduletask', 'CourseModuleTask::index',['filter'=>'auth']);
$routes->match(['get','post'],'/activate_course_module_task/(:num)', 'CourseModuleTask::activate_course_module_task/$1',['filter'=>'auth']);
$routes->match(['get','post'],'/deactivate_course_module_task/(:num)', 'CourseModuleTask::deactivate_course_module_task/$1',['filter'=>'auth']);




//----------------------------------
// create batch
//---------------------------------



$routes->match(['get','post'],'/create_batch', 'Batches::create_batch',['filter'=>'auth']);









$routes->get('/test/(:num)', 'Test/Test::index/$1');
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//$routes->get('/', 'Admin::index',['filter'=>'noauth']);


//$routes->match(['get','post'],'view_profile', 'Users::user_profile',['filter'=>'auth']);












//$routes->match(['get','post'],'/login', 'Users::login',['filter'=>'noauth']);
// $routes->match(['get','post'],'register', 'Users::register',['filter'=>'auth']);
 //$routes->match(['get','post'],'register_student', 'Students::register_student',['filter'=>'noauth']);
// $routes->match(['get','post'],'course_view', 'Course::index',['filter'=>'noauth']);
// $routes->match(['get','post'],'verifycertificate', 'Certificate::verifycertificate',['filter'=>'noauth']);

// $routes->match(['get','post'],'students', 'Students::index',['filter'=>'auth']);

// $routes->match(['get','post'],'courses', 'Course::courses',['filter'=>'auth']);
// $routes->get('dashboard', 'Dashboard::index',['filter'=>'auth']);
// $routes->get('slug_view/(:segment)', 'Students::slug_view/$1',['filter'=>'auth']);
// $routes->get('(:any)', 'Students::slug_view/$1',['filter'=>'auth']);
// $routes->get('email', 'Students::send_mail');
/**
 * --------------------------------------------------------------------
 * Additional Routingsssss
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
