<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<div class="row">
<div class="col-12 col-sm-12">
  <?php if (session()->get('sucess')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('sucess')?>
    </div>
  <?php endif; ?>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h3 > <?= $guest_user['firstname']." ".$guest_user['lastname']?>'s Dash Board  </h3>
<small> <?php  if($is_application_submited) {
  echo "your are login to a guest account.you have submit your Application but it need to be process. if you are have any problem contact  ";
}
else{
  echo "your are login to a guest account. If you wnat to change your account to student or parent you have to apply for coruse and enroll to it. To apply for course please check avialble coruse section.";
}
?></small>
</div>
<div class="row">



</div>


<div class='row'>
<div class="col-12 col-sm-3">
<div class="shadow-sm p-3 mb5 bg-white rounded  col-lg-12">
<h6>Registred Students</h6>
 <h4><?= $student_reg?></h4>
</div>
</div>




<div class="col-12 col-sm-3">
<div class="shadow-sm p-3 mb-5 bg-white rounded  col-lg-12">
<h6>Current Students</h6>
 <h4><?= $student_active?></h4>
</div>
<div>
</div>


</div>
</div>


<?= $this->endSection() ?>
