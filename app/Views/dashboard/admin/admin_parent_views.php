<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div>
<h3> View All Available profesional courses </h3>
</div>
<a class="btn btn-secondary float-right" href="/create_teacher"> Create Teacher </a>
<?php if ($parents) :?>
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
<tbody>

<?php foreach($parents as $parent){ ?>

<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['id']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>










  <td> <?= $parent['cstheryhrs']?>  </td>
  <td> <?= $parent['cspracthrs']?>  </td>

  <td> <?= $parent['csfees']?>  </td>
  <td> <?= $parent['cstype']?>  </td>
  <td> <?= $parent['csimage']?>  </td>
  <td> <?= $parent['csduemonths']?>  </td>

<td> <a href="#">Apply for Course</a>

</tr>
<?php } ?>

  </tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
<?= $this->endSection() ?>
