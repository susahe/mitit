<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<h3> View All Available Users  </h3>
<div class="">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<small> you can filter users by typing any word in the table </small>
</div>

<a class="btn btn-secondary float-right" href="/admin/users/create" data-toggle="tooltip" data-placement="top" title="Create User Click here"> Create User </a>

<div>

</div>
<?php if ($users) :?>
 <table class="table table-bordered table-striped">
<thead class="thead-light">
<tr>
      <th> ID# </th>
      <th> First Name </th>
      <th>  Last Name</th>
      <th> E-mail </th>

      <th> User Role </th>
      <th> User Name </th>
        <th> Status </th>
      <th> Action </th>

</tr>
</thead>
<tbody id="myTable">
<?php foreach($users as $user){ ?>
<tr>
  <td> <?= $user['user_id_pk']?>  </td>
  <td> <?=$user['firstname']?>  </td>
  <td> <?=$user['lastname']?>  </td>
  <td> <?=$user['email']?>  </td>

  <td> <?=$user['user_role']?>  </td>
  <td> <?=$user['user_name']?>  </td>

  <?php  if ($user['status']==0){

     ?>

    <td>
      <a class="  " type="submit" href="/admin/users/activate/<?=$user['user_id_pk'];?>"><img class="userstatus" src="<?php echo base_url('img/inactive_user.png');?>"></a>


    </td>

  <?php  }
    else
    { ?>
      <td>
      <a class="  " href="/admin/users/deactivate/<?=$user['user_id_pk'];?>"><img class="userstatus" src="<?php echo base_url('img/active_user.png');?>" ></a>



    <?php }?>
<td> <a href="/admin/users/edit/<?=$user['user_id_pk'];?>" data-toggle="tooltip" data-placement="top" title="view more about users"><i class="bi bi-chevron-compact-right"></i></a> </td>
</tr>
<?php } ?>
</tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
</div>
<?= $this->endSection() ?>
