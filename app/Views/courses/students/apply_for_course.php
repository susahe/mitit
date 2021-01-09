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
        <div class="col-12 col-sm-6">
        <div class="list-group" data-placement="top" title="Click here to apply for the course">
            <a class="list-group-item list-group-item-action"  href="/apply_for_batch/<?= $batch['batch_id_pk']?>">

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
          <button class=" btn btn-default border" data-toggle="tooltip" >Click here to apply</button>
        </div>
        </a>

      </div>
    </div>
    <?php }?>
    <?php else :?>
    <option> There is not Batch created for this course </option>
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
