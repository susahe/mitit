<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<?php if ($current_batch){?>
<div class="container">
  <div class="row">
    <div class=col-12>
<h4>Course name: <?= $course['csname']?> </h4>




<small> each course have number of batches this year have following batches select on of that to enroll.</small>
<h3 class="align-right"> Course teacher <i class="bi bi-file-person-fill"></i>  <span class="badge badge-secondary"><?=$current_batch['firstname'].' '.$current_batch['lastname']?></span></h3>
</div>
    <ul class="nav nav-pills">
      <?php if ($batches):?>
      <?php foreach($batches as $batch){?>
      <li class="nav nav-tabs ">
      <a class="nav-link"  href="/apply_for_batch/<?= $batch['batch_id_pk']?>"><?= $batch['batch_code']?></a>
      </li>
    <?php }?>
    <?php else :?>
    <option> There is not Batch created for this course </option>
    <?php endif; ?>
    </ul>

<small> select the batch from here </small>

</div>

</div>
<div class="col-md-12 offset-md-8">




        <h5 class="card-text"><i class="bi bi-file-person-fill"></i>Maximum: <span class="badge badge-secondary"><?=$current_batch['max_batch_students']?></span></h5>

        <h5 class="card-text"> <i class="bi bi-file-person-fill"></i>Current:<span class="badge badge-secondary"><?=$current_batch['curent_students']?></span></h5>

        <h5 class="card-text"> <i class="bi bi-file-person-fill"></i>Year: <span class="badge badge-secondary"><?=$current_batch['batch_year']?></span></h5>




</div>
<div>
  <form class="" action="/apply_for_batch" method="post">
  <input type="text" name="std_regster_id" value="" hidden>
  <input type="text" name="batch_std_reg_id_fk" value="" hidden>
  <input type="text" name="teacher_stdreggister_id_fk" value="" hidden>
  <input type=submit class="btn btn-primary" value="Apply" >
  </form>
</div>






</div>
</div>
</div>
<?php }?>

</div>

<script type="text/javascript">
$("#batch").change(function() {
  var selectedItem = $(this).val();
  var abc = $('option:selected',this).data("value");

  document.querySelector('#the-link').setAttribute('href', abc);

});
</script>
<?= $this->endSection() ?>
