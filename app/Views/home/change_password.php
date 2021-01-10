<?= $this->include('templates/header') ?>
<div class="row">
	<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
		<div class="container">
			<h3> Activate User Account</h3>
					<hr><br/>
				<form class="" action="/activate_user_account" method="post">
					<div class="row">



						<div class="col-12 col-sm-9">
							<div class="form-group">

								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>" placeholder="Enter your Email">
								<small> You can use  e-mail address which you used to created user account </small>
							</div>
						</div>

						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="tel" class="form-control" name ="activatekey" id="activatekey" value="<?= set_value('activatekey');?>" placeholder="Activate Key" >
								<small>if you don't know key check the mail</small>
							</div>
						</div>



						<?php if (isset($validation)): ?>
						<div class="col-12">
							<div class="alert alert-danger" role="alert">
								<?= $validation->listErrors(); ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class ="row">
						<div class="col-12">
						<span> <a href="/login"> Login </a> </span>
						<button type="submit" class="col-3 btn btn-primary float-right">Activate </button>
					</div>
					</div>
				</form>
</div>
<div class="col-12"">
	<hr/>
	<div class="text-center"><small><a href="#"> Help </a> <a href="#">Privacy </a> <a href="#"> Terms</a> | Contact : 011 2226361/077 3051133 </small>
	</div>
</div>
</div>

</div>

<?= $this->include('templates/footer') ?>
