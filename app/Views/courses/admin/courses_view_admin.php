<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="pb-5">
<a class="btn btn-secondary float-right" href="/system_created_users"> Create Course </a>
</div>
<table class="table" >

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Course Name </th>
      <th>  Theory Hours</th>

      <th> Practical Hrs </th>
      <th> Project Hrs </th>
      <th> Course Fees </th>

      <th>Course Due Months </th>

        <th> Course Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($courses as $course){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/course_view/<?=esc($course['csslug'],'url');?>">  <?= $course['id']?></a></td>
  <td align="left"> <a class="text-left" href="/course_view/<?=esc($course['csslug'],'url');?>"> <?= $course['csname']?></a> </td>










  <td> <?= $course['cstheryhrs']?>  </td>
  <td> <?= $course['cspracthrs']?>  </td>
  <td> <?= $course['csprojecthrs']?> </td>
  <td> <?= $course['csfees']?>  </td>


  <td> <?= $course['csduemonths']?>  </td>


<?php  if ($course['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_course/<?=$course['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_inactive.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_course/<?=$course['id'];?>"><img class="coursetatus" src="<?php echo base_url('img/course_active.png');?>" ></a>



      </td>
  <?php }?>
</tr>
<?php } ?>
  </tbody>
</table>

<?= $this->endSection() ?>
