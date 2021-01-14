
<?php
  $uri = service('uri');

 ?>

<?php if ((session()->get('isLogedIn')) && (session()->get('loginUser')=='Admin')): ?>

<ul class="navbar-nav">

 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard"><i class="bi bi-file-person-fill"></i>Dashboard (current)</a>

 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_profile' ? 'active' : null )?>">
   <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"> <i class="bi bi-file-person-fill"></i>  Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_users' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/user/view"> <i class="bi bi-person-fill"></i> Users</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_students' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/students/view/"> <i class="bi bi-person-fill"></i> Students</a>
 </li>
  <li class="nav-item <?=($uri->getSegment(1)=='admin_parents' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/parents/view/"><i class="bi bi-file-person-fill"></i> Parents</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_childs' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/childs/view/"><i class="bi bi-file-person-fill"></i> Childs</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_teachers' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/teachers/view/"> <i class="bi bi-person-fill"></i> Teachers</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_staff' ? 'active' : null )?>">
   <a class="nav-link"  href="/user/staff/view/"> <i class="bi bi-person-fill"></i> Staff</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_courses' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/courses/view/"><i class="bi bi-file-person-fill"></i> Courses</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='admin_batches' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/batches/view/"><i class="bi bi-file-person-fill"></i> Batches</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='admin_schedules' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/schedules/view/"> <i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_grades' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/grades/view/"><i class="bi bi-file-person-fill"></i> Grades</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_attendance' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/attendance/view/"><i class="bi bi-file-person-fill"></i> Attendance</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='admin_payments' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/payments/view/"><i class="bi bi-file-person-fill"></i> Payment</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='admin_reports' ? 'active' : null )?>">
   <a class="nav-link"  href="/admin/reports/view/"><i class="bi bi-file-person-fill"></i> Reports</a>
 </li>
<li class="nav-item <?=($uri->getSegment(1)=='admin_settings' ? 'active' : null )?>">
  <a class="nav-link"  href="/admin/settings/view/"><i class="bi bi-file-person-fill"></i> Settings</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout"><i class="bi bi-file-person-fill"></i> Logout</a>
 </li>
</ul>

<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Staff')):?>
<ul class="navbar-nav">


   <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
     <a class="nav-link" href="/dashboard"><i class="bi bi-file-person-fill"></i>Dashboard (current)</a>

   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_profile' ? 'active' : null )?>">
     <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"> <i class="bi bi-file-person-fill"></i>  Profile View</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_users' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_users"> <i class="bi bi-person-fill"></i> Users</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_studens' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_studens"> <i class="bi bi-person-fill"></i> Students</a>
   </li>
    <li class="nav-item <?=($uri->getSegment(1)=='admin_parents' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_parents"><i class="bi bi-file-person-fill"></i> Parents</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_childs' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_childs"><i class="bi bi-file-person-fill"></i> Childs</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_teachers' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_teachers"> <i class="bi bi-person-fill"></i> Teachers</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_courses' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_courses"><i class="bi bi-file-person-fill"></i> Courses</a>
   </li>

   <li class="nav-item <?=($uri->getSegment(1)=='admin_batches' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_batches"><i class="bi bi-file-person-fill"></i> Batches</a>
   </li>

   <li class="nav-item <?=($uri->getSegment(1)=='admin_schedules' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_schedules"> <i class="bi bi-calendar2-minus"></i>  Schedules</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_grades' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_grades"><i class="bi bi-file-person-fill"></i> Grades</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_attendance' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_attendance"><i class="bi bi-file-person-fill"></i> Attendance</a>
   </li>

   <li class="nav-item <?=($uri->getSegment(1)=='admin_payments' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_payments"><i class="bi bi-file-person-fill"></i> Payment</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='admin_reports' ? 'active' : null )?>">
     <a class="nav-link" href="/admin_reports"><i class="bi bi-file-person-fill"></i> Reports</a>
   </li>
  <li class="nav-item <?=($uri->getSegment(1)=='admin_settings' ? 'active' : null )?>">
    <a class="nav-link" href="/admin_settings"><i class="bi bi-file-person-fill"></i> Settings</a>
  </li>
  </ul>



<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout"><i class="bi bi-file-person-fill"></i> Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Teacher')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"><i class="bi bi-file-person-fill"></i>  Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses">Courses</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='createcourse' ? 'active' : null )?>"">
   <a class="nav-link" href="/createcourse">Create Course</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='groups' ? 'active' : null )?>"">
   <a class="nav-link" href="/groups">Groups</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules"> <i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Parent')):?>
<ul class="navbar-nav">

   <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
     <a class="nav-link" href="/dashboard"><i class="bi bi-cast"></i> Dashboard <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='student_profile_view' ? 'active' : null )?>"">
     <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"><i class="bi bi-file-person-fill"></i> Profile View</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
     <a class="nav-link" href="/student_courses"> <i class="bi bi-journals"></i> Courses</a>
   </li>

   <li class="nav-item <?=($uri->getSegment(1)=='student_grades' ? 'active' : null )?>"">
     <a class="nav-link" href="/student_schedules"><i class="bi bi-journals"></i> Grades</a>
   </li>

   <li class="nav-item <?=($uri->getSegment(1)=='student_schedules' ? 'active' : null )?>"">
     <a class="nav-link" href="/student_grades"><i class="bi bi-calendar2-minus"></i>  Schedules</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='student_payments' ? 'active' : null )?>"">
     <a class="nav-link" href="/student_payments"><i class="bi bi-calendar2-minus"></i>  Payments</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='child_accounts' ? 'active' : null )?>"">
     <a class="nav-link" href="/student_view_child_accounts"><i class="bi bi-calendar2-minus"></i>  Child Accounts</a>
   </li>

</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Student')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard"><i class="bi bi-cast"></i> Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='student_profile_view' ? 'active' : null )?>"">
   <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"><i class="bi bi-file-person-fill"></i> Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/student_courses"> <i class="bi bi-journals"></i> Courses</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='student_grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/student_schedules"><i class="bi bi-journals"></i> Grades</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='student_schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/student_grades"><i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='student_payments' ? 'active' : null )?>"">
   <a class="nav-link" href="/student_payments"><i class="bi bi-calendar2-minus"></i>  Payments</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='child_accounts' ? 'active' : null )?>"">
   <a class="nav-link" href="/student_view_child_accounts"><i class="bi bi-calendar2-minus"></i>  Child Accounts</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout"><i class="bi bi-door-closed"></i> Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Child')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard"><i class="bi bi-cast"></i> Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='child_profile_view' ? 'active' : null )?>"">
   <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"><i class="bi bi-file-person-fill"></i> Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='child_courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/child_courses"> <i class="bi bi-journals"></i> Courses</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='child_grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/child_grades"><i class="bi bi-journals"></i> Grades</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='child_schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/child_schedules"><i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/return_parent_account/<?= $_SESSION['id']?>"><i class="bi bi-door-closed"></i> Parent account</a>
 </li>
</ul>
<?php else:?>
  <ul class="navbar-nav">
   <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
     <a class="nav-link" href="/dashboard"><i class="bi bi-file-person-fill"></i>Dashboard <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='user' ? 'active' : null )?>"">
     <a class="nav-link" href="/user/profile/view/<?=(session()->get('id'))?>"> <i class="bi bi-file-person-fill"></i> Profile View</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
     <a class="nav-link" href="/user/courses/view">Available Courses</a>
   </li>


  </ul>

  <ul class="navbar-nav ml-auto">
   <li class="nav-item ">
     <a class="nav-link" href="/logout">Logout</a>
   </li>
  </ul>
<?php endif;?>
