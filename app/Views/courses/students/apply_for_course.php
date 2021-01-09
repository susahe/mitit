<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<div class="container">

  <h4>Apply for the course: <?= $course['csname']?> </h4>
  <small> each course have number of batches this year have following batches select on of that to enroll.</small>



</div>

<hr>




      <?php if ($batches):?>

      <?php foreach($batches as $batch){?>

          <form class="" action="/apply_for_batch/<?= $batch['course_id_fk']?>" method="post">
          <input type="text" name="std_register_id_fk" value="<?= $_SESSION['id']?>" >
          <input type="text" name="batch_std_reg_id_fk" value="<?= $batch['batch_id_pk']?>" >
          <input type="text" name="teacher_stdregister_id_fk" value="<?= $batch['teacher_batch_id_fk']?>" >

        <div class="col-12 col-sm-6">
        <div class="list-group" data-placement="top" title="Click here to apply for the course">
            <a type="submit" class="list-group-item list-group-item-action"  href="">
          <div class="d-flex w-100 justify-content-between">
            <h3 class="mb-2"><?= $batch['batch_code']?></h3>
            <small>Current year:<?=$batch['batch_year']?></small>
          </div>
          <h5 class="mb-1 d-flex justify-content-between align-items-center">
            Maximum students :
            <span class="badge badge-secondary"><?=$batch['max_batch_students']?></span> </h5>
            <h5 class="mb-1 d-flex justify-content-between align-items-center">
   Current students<span class="badge badge-secondary"><?=$batch['curent_students']?></h5>
          <div class="text-center">
          <input  type ="submit" class=" btn btn-default border" data-toggle="tooltip" value="Click here to apply">
        </div>
        </a>

      </div>

    </div>
      </form>
    <?php }?>
    <?php else :?>
    <option> There is not Batch created for this course </option>
    <?php endif; ?>
















    <?php if (isset($validation)): ?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
      </div>
    </div>
    <?php endif; ?>


  </div>
</div>



<script type="text/javascript">
$("#batch").change(function() {
  var selectedItem = $(this).val();
  var abc = $('option:selected',this).data("value");

  document.querySelector('#the-link').setAttribute('href', abc);

});
</script>

<?= $this->endSection() ?>
