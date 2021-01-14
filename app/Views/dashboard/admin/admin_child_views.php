<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<div>
<h3> All Child Accounts </h3>
</div>
<a class="btn btn-secondary float-right" href="/create_teacher"> Create Parent </a>
<?php if ($child) :?>
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
<?php foreach($child as $child){ ?>
<tr>
<td> <?= $child['user_id_pk']?>  </td>
  <td> <?= $child['firstname']?>  </td>
  <td> <?= $child['lastname']?>  </td>
  <td> <?= $child['mobile']?>  </td>
  <td> <?= $child['hometel']?>  </td>
<td> <a href="#">Apply for Course</a>
</tr>
<?php } ?>
</tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
<?= $this->endSection() ?>
