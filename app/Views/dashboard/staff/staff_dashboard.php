<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>


<div class="row">
<div class="col-12 col-sm-12">
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h3 > <?= $_SESSION['firstname']." ".$_SESSION['lastname']?>'s Dash Board  </h3><small>you are a  staff account  you can do staff related acctivites though this account's </small>

</div>
</div>
</div>






<?= $this->endSection() ?>
