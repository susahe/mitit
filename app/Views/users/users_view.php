<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>


<div class="pb-5">
<a class="btn btn-secondary float-right" href="/create_user_system"> Create users </a>
</div>
<div class ="#">
<table class="table table-hover" >

   <thead class="thead-dark">

  <tr>
      <th> ID# </th>

      <th> User's Name</th>

      <th> E-mail </th>
      <th> Contact No </th>
<th> Last  Login </th>
      <th> Role </th>
      <th> Created </th>
      <th> Update </th>
      <th>Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($users as $user){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/admin_edit_users/<?=esc($user['slug'],'url');?>">  <?= $user['id']?></a></td>

  <td> <a class=" " href="/admin_edit_users/<?=esc($user['slug'],'url');?>"> <?= $user['firstname']?>&nbsp;&nbsp; <?= $user['lastname']?></a> </td>


  <td> <?= $user['email']?>  </td>
  <td> <?= $user['mobile']?>  </td>
  <td> <?= $user['created']?> </td>
  <td> <?= $user['update']?> </td>
    <td> <?= $user['lastlogin']?> </td>
  <td> <?= $user['role']?>  </td>




<?php  if ($user['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_user/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/inactive_user.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_user/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/active_user.png');?>" ></a>



  <?php }?>

    </td>
</tr>



<?php } ?>
  </tbody>
</table>
</div>
<?php if ($pager) :?>


  <?= $pager->links() ?>



     <?php endif ?>

  <form>
</div> 






<?= $this->endSection() ?>
