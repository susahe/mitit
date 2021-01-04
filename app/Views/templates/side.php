
<?php
  $uri = service('uri');

 ?>

<?php if ((session()->get('isLogedIn')) && (session()->get('loginUser')=='Admin')): ?>

<ul class="navbar-nav">

 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard (current)</a>

 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="profile_person_view"> <i class="bi bi-file-person-fill"></i>  Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='users' ? 'active' : null )?>"">
   <a class="nav-link" href="/view_users"> <i class="bi bi-person-fill"></i> Users</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses">Courses</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='teachers' ? 'active' : null )?>"">
   <a class="nav-link" href="/teachers">Teaachers</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='parents' ? 'active' : null )?>"">
   <a class="nav-link" href="/parents">Parents</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='studens' ? 'active' : null )?>"">
   <a class="nav-link" href="/students">Students</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='enrolls' ? 'active' : null )?>"">
   <a class="nav-link" href="/enrolls">Groups</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules"> <i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>


 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Payment</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Reports</a>
 </li>
<li class="nav-item <?=($uri->getSegment(1)=='settings' ? 'active' : null )?>"">
  <a class="nav-link" href="/settings">Settings</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>

<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Staff')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="profile_person_view"> <i class="bi bi-file-person-fill"></i>  Profile View</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='teachers' ? 'active' : null )?>"">
   <a class="nav-link" href="/teachers">Teaachers</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='studens' ? 'active' : null )?>"">
   <a class="nav-link" href="/students">Students</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='groups' ? 'active' : null )?>"">
   <a class="nav-link" href="/groups">Groups</a>
 </li>

</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Teacher')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="profile_person_view"><i class="bi bi-file-person-fill"></i>  Profile View</a>
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
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses">Courses</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Schedules</a>
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
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/create_student_profile/<?=(session()->get('id'))?>"><i class="bi bi-file-person-fill"></i> Profile View</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses"> <i class="bi bi-journals"></i> Courses</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades"><i class="bi bi-journals"></i> Grades</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules"><i class="bi bi-calendar2-minus"></i>  Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout"><i class="bi bi-door-closed"></i> Logout</a>
 </li>
</ul>
<?php else:?>
  <ul class="navbar-nav">
   <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
     <a class="nav-link" href="/dashboard"><i class="bi bi-file-person-fill"></i>Dashboard <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
     <a class="nav-link" href="profile_person_view"> <i class="bi bi-file-person-fill"></i> Profile View</a>
   </li>
   <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
     <a class="nav-link" href="/guest_courses">Available Courses</a>
   </li>


  </ul>

  <ul class="navbar-nav ml-auto">
   <li class="nav-item ">
     <a class="nav-link" href="/logout">Logout</a>
   </li>
  </ul>
<?php endif;?>
