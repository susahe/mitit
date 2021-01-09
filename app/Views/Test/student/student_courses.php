<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div>
<h3> View All Available profesional courses </h3>
</div>
<div class="">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<small> you can filter users by typing any word in the table </small>
</div>
<?php if ($courses) :?>
<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Theory Hours</th>

      <th> Practical Hrs </th>
      <th> Project Hrs </th>
      <th> Course Fees </th>
      <th> Course Type </th>
      <th> Course Image </th>
      <th> Action </th>


  </tr>
</thead>
<tbody id="myTable">

<?php foreach($courses as $course){ ?>

<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>









  <td> <?= $course['cstheryhrs']?>  </td>
  <td> <?= $course['cspracthrs']?>  </td>

  <td> <?= $course['csfees']?>  </td>
  <td> <?= $course['cstype']?>  </td>
  <td> <?= $course['csimage']?>  </td>
  <td> <?= $course['csduemonths']?>  </td>

<td> <a href="#">Apply for Course</a>

</tr>
<?php } ?>

  </tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
<?= $this->endSection() ?>
