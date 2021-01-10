<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<div class="row">
<div class="col-12 col-sm-12">
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h3 > <?= $_SESSION['firstname']." ".$_SESSION['lastname']?>'s Child Accounts  </h3>

</div>

</div>








</div>
<div>

  <div class="pb-5">
    <a href="/add_child_account" class="btn btn-secondary float-right" type="submit"> Add Child </a>

  </div>
  <table class="table table-bordered table-striped">

     <thead class="thead-light">

    <tr>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Address  </th>
        <th>mobile </th>


        <th>nic </th>
        <th> Action </th>
    </tr>
  </thead>
  <tbody>



  <?php foreach($childs as $user){ ?>
  <tr>



    <td> <?= $user['firstname'] ?> </td>
    <td> <?= $user['lastname'] ?> </td>
    <td> <?= $user['address'] ?> </td>
    <td> <?= $user['mobile'] ?> </td>
    <td> <?= $user['nic'] ?> </td>
    <td colspan="2">   <a href="/log_to_child/<?= $user['student_id_pk']?>" class="btn btn-secondary float-right" type="submit"> View </a> </td>


    <?php }?>

  </tr>




    </tbody>
  </table>

</div>

<?= $this->endSection() ?>
