<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>

<div class="row">
<div class="col-12 col-sm-12">
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h3 > <?= $_SESSION['firstname']." ".$_SESSION['lastname']?>'s Dash Board  </h3>

</div>

</div>






<div class="col-12 col-sm-12">
<div class="shadow-sm p-3 mb5 bg-white rounded  col-lg-12">
<h6>Your child account to your account</h6>

</div>
</div>



</div>
<div>


<?= $this->endSection() ?>
