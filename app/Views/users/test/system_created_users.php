<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="row">

		<div class="container">
		
			<div class="col-12 col-md-12 col- pb-3 bg-white form-wrapper">
			<h3> Create your account  </h3>
				<form class="" action="/create_user_system" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
									<input type="text" class="form-control" name ="firstname" id="firstname" value="<?= set_value('firstname');?>" placeholder="Enter your first Name">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="lastname" id="lastname" value="<?= set_value('lastname');?>" placeholder="Enter your Last Name">

							</div>
						</div>

						<div class="col-12 col-sm-12">
							<div class="form-group">

								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>" placeholder="Enter your Email">
							</div>
						</div>


						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="password" class="form-control" name ="password" id="passwd" value="" placeholder="Enter Password ">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="" placeholder="Confirm Password">
							</div>
						</div>

						<div class="col-12">
							 <div class="form-group">
							    <label for="role">System Role</label>
							    <select class="form-control form-control-lg" id="role" name='role'>
							      <option class="col-12">Student</option>
							      <option>Teacher</option>
							      <option>Parent</option>
							      <option>Staff</option>
							      <option>Admin</option>
							    </select>
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
						<button type="submit" class="col-3 btn btn-primary ">Register </button>
					</div>
				</form>

</div>

</div>
</div>
<?= $this->endSection() ?>
