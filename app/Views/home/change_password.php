<?= $this->include('templates/header') ?>
<div class="row">
	<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
		<div class="container">
			<h3> Activate User Account</h3>
					<hr><br/>
				<form class="" action="/change_password" method="post">
					<div class="row">


						<div class="col-12 col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>" placeholder="Enter your Email">
								<small> enter your emaill address to change password</small>
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
						<button type="submit" class="col-4 btn btn-primary float-right">Change Password </button>
					</div>
					</div>
				</form>

<div class="col-12"">
	<hr/>
	<div class="text-center"><small><a href="#"> Help </a> <a href="#">Privacy </a> <a href="#"> Terms</a> | Contact : 011 2226361/077 3051133 </small>
	</div>
</div>
</div>

</div>
</div>

<?= $this->include('templates/footer') ?>
