<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<h4> Newly Registred Students </h4>


<table class="table" >

   <thead class="thead-light">

  <tr>
      <th> ID# </th>

      <th>Address </th>
      <th> FIrst Name </th>
      <th> Last Name </th>
      <th>Status </th>
  </tr>
</thead>
<tbody>



<?php foreach($students as $user){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/user_profile_view/<?=esc($user['slug'],'url');?>">  <?= $user['id']?></a></td>

  <td> <?= $user['address']?></td>

  <td> <?= $user['firstname']?></td>
  <td> <?= $user['lastname']?> </td>
<?php  if ($user['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_student/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/inactive_user.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_student/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/active_user.png');?>" ></a>


    <form>
      </td>
  <?php }?>

</tr>



<?php } ?>
  </tbody>
</table>

<?= $this->endSection() ?>
