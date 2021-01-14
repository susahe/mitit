<?= $this->include('templates/header') ?>
<div class="row">
	<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">


      <div class="container">
      <h5> Login </h5>
      <hr>
			<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
				</div>
			<?php endif; ?>
          <form class="" action="/login" method="post">
              <div class="form-group">

                <input type="email" class="form-control inpt-mit" name ="email" id="email" value="<?php set_value('email');?>" placeholder="Login E-mail">
              </div>

              <div class="form-group">

                <input type="password" class="form-control inpt-mit" name ="password" id="passwd" value="" placeholder="Login Password">
              </div>


              <div class ="row">
                <div class="col-12">

                </div>
              </div>


							<br/>


					<div class ="row">
						<div class="col-12">
						<span> <a href="/create_user"> Create account </a> </span>
					  <button type="submit" class="btn btn-primary float-right">Login </button>
					</div>
					</div>

  </form>
      </div>
			<?php if (isset($validation)): ?>
						<div class="col-sm-12">
								<div class="alert alert-danger" role="alert">
									<?= $validation->listErrors(); ?>
								</div>
						</div>

			<?php endif; ?>
			<div class="col-12"">
				<hr/>
				<div class="text-center"><small><a href="#"> Help </a> <a href="#">Privacy </a> <a href="#"> Terms</a> | Contact : 011 2226361/077 3051133 <a href="/activate_user_account"> Activate user account</a><a href="/change_password">  Change passowrd</small>
				</div>
			</div>
  </div>
</div>
<?= $this->include('templates/footer') ?>
