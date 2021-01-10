<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>

<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<h3> View All Available Teachers </h3>

<a class="btn btn-secondary float-right" href="/create_teacher"> Create Teacher </a>

<?php if ($teachers) :?>
 <table class="table table-bordered table-striped table-hover">

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

<?php foreach($teachers as $teacher){ ?>

<tr>







  <td> <?= $teacher['firstname']?>  </td>
  <td> <?= $teacher['lastname']?>  </td>

  <td> <?= $teacher['nic']?>  </td>
  <td> <?= $teacher['mobile']?>  </td>
  <td> <?= $teacher['hometel']?>  </td>
  <td> <?= $teacher['teacher_status']?>  </td>

<td> <a href="#">Apply for Course</a>

</tr>
<?php } ?>

  </tbody>
</table>

<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
</div>
<?= $this->endSection() ?>
