<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="container-fluid">
<div class="row  shadow-sm p-3 mb-5 bg-white rounded">
<div class="col-12">

<h4>School Students Courses </h4>
<small>if you're school student you can select courses form follwoing list and apply for a course </small>
</div>
</div>

<div class="row"">
<?php foreach ($course_school as $data) {?>
  <div class="col-12 col-sm-6 ">
  <div class="card shadow-sm p-3 mb-5 bg-white rounded ">
    <div class="card-header">

      <img class="card-img-top img-thumbnail rounded mx-auto d-block" src="/uploads/images/course_img/cs1.jpeg"  alt="Card image cap">
      <h6 class="text-center"><?=$data['csname']?></h6>
    <div class="col text-center">

      <a type="btn" class="btn btn-primary" href="/apply_course/<?= $data['id']?>" class="card-link">Apply for the course</a>
    </div>
    </div>
    <div class="card-body">
        <small class="card-text"> Objectives: </small>
        <table class="table ">
        <tr>
        <td><h6 class="card-text"> Theory </h6></td>
        <td><h6 class="card-text"> Practical</h6></td>
        <td><h6 class="card-text">Duration Months</h6></td>
        </tr>
        <tr>
        <td><span class="align-text-bottom"><?= $data['cstheryhrs']?> hours</span></td>
        <td><span class="align-text-bottom"><?= $data['cspracthrs']?> hours</span></td>
        <td><span class="align-text-bottom"><?= $data['csduemonths']?></span></td>

    </tr>

        <tr class="bg-info text-white">
        <td><h6 class="card-text"> Course Fees</h6></td>
        <td colspan=2><span class="align-text-bottom">Rs. <?= $data['csfees']?>/=</span></td>
        <td> </td>

      </tr>
      </table>
      <a href="#" class="card-link d-flex flex-row-reverse">more details..</a>
   </div>
  </div>
  </div>

  <?php } ?>
</div>


<div class="row shadow-sm p-3 mb-5 bg-white rounded">
<div class="col-12">

<h4> School Leaver Courses </h4>
<small> if you're school leaver student you can select courses form follwoing list and apply for a course </small>
</div>
</div>
<div class="row">
<?php foreach ($course_school_leaver as $data) {?>
  <div class="col-12 col-sm-6 ">
  <div class="card shadow-sm p-3 mb-5 bg-white rounded ">
    <div class="card-header">

      <img class="card-img-top img-thumbnail rounded mx-auto d-block" src="/uploads/images/course_img/cs1.jpeg"  alt="Card image cap">
      <h6 class="text-center"><?=$data['csname']?></h6>
    <div class="col text-center">

    <a type="btn" class="btn btn-primary" href="/apply_course/<?= $data['id']?>" class="card-link">Apply for the course</a>
    </div>
    </div>
    <div class="card-body">
        <small class="card-text"> Objectives: </small>
        <table class="table ">
        <tr>
        <td><h6 class="card-text"> Theory </h6></td>
        <td><h6 class="card-text"> Practical</h6></td>
        <td><h6 class="card-text">Duration Months</h6></td>
        </tr>
        <tr>
        <td><span class="align-text-bottom"><?= $data['cstheryhrs']?> hours</span></td>
        <td><span class="align-text-bottom"><?= $data['cspracthrs']?> hours</span></td>
        <td><span class="align-text-bottom"><?= $data['csduemonths']?></span></td>

    </tr>

        <tr class="bg-info text-white">
        <td><h6 class="card-text"> Course Fees</h6></td>
        <td colspan=2><span class="align-text-bottom">Rs. <?= $data['csfees']?>/=</span></td>
        <td> </td>

      </tr>
      </table>
<a href="#" class="card-link d-flex flex-row-reverse">more details..</a>
   </div>
  </div>
  </div>

  <?php } ?>
</div>
</div>





<?= $this->endSection() ?>
