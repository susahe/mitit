<?= $this->include('templates/header') ?>
<div class="row">
	<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
		<div class="container">
			<h3> Create your account  </h3>
					<hr><br/>
				<form class="" action="/create_user" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
									<input type="text" class="form-control" name ="firstname" id="firstname" value="<?= set_value('firstname');?>" placeholder="First Name">
									<small> Enter your first name here </small>
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="lastname" id="lastname" value="<?= set_value('lastname');?>" placeholder="Last Name">
								<small> Enter your last name here </small>
							</div>
						</div>

						<div class="col-12 col-sm-12">
							<div class="form-group">

								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>" placeholder="Enter your Email">
								<small> You can use only one e-mail address to create user account </small>
							</div>
						</div>



						<div class="col-12 col-sm-6">
							<div class="form-group">


								<input type="password" class="form-control" name ="password" id="passwd" value="" placeholder="Password ">
								<small> Use 8 or more characters with a mix of letters, numbers & symbols </small>
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="" placeholder="Confirm ">
								<small> Use 8 or more characters with a mix of letters, numbers & symbols </small>
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
						<input  type="submit" class="col-3 btn btn-primary float-right" value=Register>
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
