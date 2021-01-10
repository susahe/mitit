<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>

<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<h3> View All Available profesional courses </h3>

<div class="">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<small> you can filter users by typing key words </small>
</div>
<a class="btn btn-secondary float-right" href="/create_teacher"> Create Student </a>
<?php if ($students) :?>
 <table class="table table-bordered table-striped">

   <thead class="thead-light">



  <tr>
      <th> ID# </th>
      <th> Student Name </th>
      <th>  Last Name</th>

      <th> Gender </th>
      <th> Birth Date </th>
      <th> Mobile  </th>
      <th> Home Telephone </th>

      <th> Action </th>


  </tr>
</thead>
<tbody id="myTable">

<?php foreach($students as $student){ ?>

<tr>








  <td> <?= $student['student_id_pk']?> </td>
  <td> <?= $student['firstname']?>  </td>
  <td> <?= $student['lastname']?>  </td>
  <td> <?= $student['gender']?>  </td>
  <td> <?= $student['birthdate']?>  </td>
  <td> <?= $student['mobile']?>  </td>
  <td> <?= $student['hometel']?>  </td>

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
