<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<h3> All Available courses </h3>
<div class="">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<small> you can filter courses by typing any word in the table </small>
</div>
<?php if ($courses) :?>
 <table class="table table-bordered table-striped">

    <table class="table table-bordered table-striped">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Theory Hours</th>
      <th> Practical Hrs </th>

      <th> Course Fees </th>
      <th> Course Duration </th>
      <th> Course Type </th>

      <th> Action </th>


  </tr>
</thead>
<tbody id="myTable">

<?php foreach($courses as $course){ ?>

<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['cs_id_pk']?></a></td>
  <td> <a class=" " href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>
  <td> <?= $course['cstheryhrs']?>  </td>
  <td> <?= $course['cspracthrs']?>  </td>
  <td> <?= $course['csfees']?>  </td>

  <td> <?= $course['csduemonths']?>  </td>
  <?php  if ($course['cstype']==0){

     ?>

    <td>
      <a href=""> School Student Courses </a>


    </td>

  <?php  }
    else
    { ?>
      <td>
      <a href=""> Profesional Courses </a>



    <?php }?>

<td> <a href="/apply_for_course/<?=esc($course['csslug'],'url');?>" data-toggle="tooltip" data-placement="top" title="apply for Course click here">Apply for Course<i class="bi bi-chevron-compact-right"></i></a> </td>


</tr>
<?php } ?>

  </tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
</div>
<?= $this->endSection() ?>
