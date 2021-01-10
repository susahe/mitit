<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<?php if ($users) :?>




<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
<?= $this_=5 ?>
	<div class="col-12 col-sm-12">
	<h2 align="center"> Personal Info </h3>
	<p align="center"><small> Basic info. your name profile photo and other detials </small></p>
</div>
<h4> Basic info </h4>
<ul class="list-group">
  <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between"><span>Profile picture</span><span><img src="#" alt="profile picture"> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Name<span><?= $users['firstname']." ".$users['lastname'] ?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between flex-wrap ">Birthday<span><?= $this_?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between ">Gender<span><?=$this_ ?> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between ">Password<span>*************** <small>Last change  <?= $users['lastchange'] ?></small> </span><span><h4>></h4></span></a>

</ul>

<h4> Contact info </h4>
<ul class="list-group">
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">E-mail<span><?=$users['email'] ?> </span> <span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Phone<span><?= $this_?> </span> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Home Phone<span><?=$this_ ?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Address<span><?= $this_?></span><span><h4>></h4></span></a>

</ul>
</div>
<?php else :?>

<?php endif ; ?>
<?= $this->endSection() ?>
