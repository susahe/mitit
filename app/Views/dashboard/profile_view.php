<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<?php if ($users) :?>
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">

	<div class="col-12 col-sm-12">
	<h2 align="center"> Personal Info </h3>
	<p align="center"><small> Basic info. your name profile photo and other detials </small></p>

<h4> Basic info </h4>
<ul class="list-group">
  <a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between"><span>Profile picture</span><span><img src="/uploads/images/user_profiles/<?= $profile['profileimg'] ; ?> " width=50 height=50 alt="profile picture"> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Name<span><?= $users['firstname']." ".$users['lastname'] ?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between flex-wrap ">Birthday<span><?= $profile['birthdate']?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between ">Gender<span><?=$profile['gender']==1 ?'Male':'Female' ?> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between ">Password<span>*************** <small>Last change  <?= $users['lastchange'] ?></small> </span><span><h4>></h4></span></a>
</ul>
<h4> Contact info </h4>
<ul class="list-group">
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">E-mail<span><?=$users['email'] ?> </span> <span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Phone<span><?= $profile['mobile'] ?> </span> </span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Home Phone<span><?=$profile['hometel'] ?></span><span><h4>></h4></span></a>
	<a href="#" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between">Address<span><?= $profile['address']?></span><span><h4>></h4></span></a>
</ul>
</div>
<?php else :?>
<h1> No Yours profile define </h1>
<?php endif ; ?>
<?= $this->endSection() ?>
