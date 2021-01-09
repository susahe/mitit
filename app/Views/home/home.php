<?= $this->include('templates/header') ?>

<div class="container">
	<div class="row">
			<div class="col-lg-9">

			</div>
			<div class="col-lg-3">
				<div class="row">
				<h5> Login </h5>
				<hr>
					<?php if (session()->get('sucess')): ?>
						<div class="alert alert-success" role="alert">
								<?= session()->get('sucess')?>
						</div>
					<?php endif; ?>
						<form class="" action="/home" method="post">
								<div class="form-group">

									<input type="email" class="form-control inpt-mit" name ="email" id="email" value="<?php set_value('email');?>" placeholder="Login E-mail">
								</div>

								<div class="form-group">

									<input type="password" class="form-control inpt-mit" name ="password" id="passwd" value="" placeholder="Login Password">
								</div>
					<?php if (isset($validation)): ?>
								<div class="col-sm-4">
										<div class="alert alert-danger" role="alert">
											<?= $validation->listErrors(); ?>
										</div>
								</div>

					<?php endif; ?>

								<div class ="row">
									<div class="col-12">
										<button type="submit" class="btn btn-primary">Login </button>
									</div>
								</div>



						</form>

							<hr>
					<?php if (session()->get('sucess')): ?>
								<div class="alert alert-success" role="alert">
					<?= session()->get('sucess')?>
								</div>
					<?php endif; ?>

						<div>
							<h5>Student Registration </h5>


							<a class="btn btn-mit" href="createstudent">School Student Application</a>
							<br/>	<br/>
							<a class="btn btn-mit" href="createstudent">School Leaver Application </a>

						</div>

						<hr>
						<h5>Certificate Vertification</h5>
							<form class="" action="/verifycertificate" method="post">
								<div class="form-group">

										<div class="input-group-btn">
										<input type="text" class="form-control" name ="certificateno" id="certificateno" value="<?php set_value('certificateno');?>" placeholder="Enter Certificate Number Here">
										<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"> </i> </button>
								</div>



						</form>
</div>
</div>
</div>
</div>

<?= $this->include('templates/footer') ?>