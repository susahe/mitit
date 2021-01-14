<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<div class="row">
	<div class="col-12  form-wrapper">
		<div class="container">
     <h3> <?= $user['firstname'].' '.$user['lastname']?> </h3>




				<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
				<hr>

				<form class="" action="/admin_edit_user" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="firstname"> First Name</label>
								<input type="text" class="form-control" name ="firstname" id="firstname" value="<?= set_value('firstname',$user['firstname']);?>" placeholder="Enter your first Name">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="lastname"> Last Name </label>
								<input type="text" class="form-control" name ="lastname" id="lastname" value="<?= set_value('lastname',$user['lastname']);?>">
							</div>
						</div>

						<div class="col-12 col-sm-9">
							<div class="form-group">
								<label for="email"> Email address </label>
								<input type="email" class="form-control" name ="email"  id="email" value="<?=$user['email'];?>">
							</div>
						</div>
            <div class="col-12 col-sm-3">
              <div class="form-group">
                <label for="email"> Phone Number </label>
                <input type="text" class="form-control" name ="mobile"  id="email" value="<?=$user['mobile'];?>">
              </div>
            </div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="password"> Password </label>
								<input type="password" class="form-control" name ="password" id="passwd" value="">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="password"> Confirm Password </label>
								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="">
							</div>
						</div>

						<div class="col-12 cols-sm-6">
							 <div class="form-group">
							    <label for="role" >System Role</label>
							    <select class="form-control form-control-lg" id="role" name='role' >
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
          <div class="col-12">
						<button type="submit" class="col-3 btn btn-primary float-right">Update </button>
					</div>
        </div>



				</form>
			</div>
</div>
		</div>
</div>
</div>
</div>
<?= $this->endSection() ?>
