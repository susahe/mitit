<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<div class="row">
	<div class="">
		<div class="container">
		<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
     <h5> Chnage <?= $user['firstname'].' '.$user['lastname']?>  password </h5>
			<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
							<hr>
				<form class="" action="/user_chagne_password" method="post">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<input type="text"  hidden class="form-control" name ="email" id="email" value=<?= $user['email']?>  placeholder="Enter your Email">
							</div>
						</div>
							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label for="password">Current  Password </label>
									<input type="password" class="form-control" name ="current_password" id="passwd" value="">
								</div>
							</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label for="password"> Password </label>
								<input type="password" class="form-control" name ="password" id="passwd" value="">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label for="password"> Confirm Password </label>
								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="">
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
						<input type="submit" class="col-3 btn btn-primary float-right" value="Change">
					</div>
        </div>
			</form>
			</div>
</div>
</div>
</div>
<?= $this->endSection() ?>
