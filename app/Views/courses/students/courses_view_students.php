<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<h3> Welcome to MIT Computer Training Center </h3>
<div class="container">
  <div class="p-3">
<h4> Are you School Student or School Leaver? </h4>

<span class="" ><a class="cstype_yes  " type="submit" href="/course_select/1">School Leaver</a> </span>
<span class=""><a class=" cstype_yes " type="submit" href="/course_select/2">School Student</a></span>
</div>

<?php if ($courses) : ?>
<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Theory Hours</th>
      <th> Practical Hrs </th>

      <th> Course Fees </th>
      <th> Course Type </th>
  <th> Duration Months </th>
      <th> Action </th>


  </tr>
</thead>
<tbody>

<?php foreach($courses as $course){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>











<td> <a href="/retirive_course_select/<?= $course['id']?> ">Apply for Course</a>

</tr>
<?php }?>
<?php endif;?>
  </tbody>
</table>

<?= $this->endSection() ?>
