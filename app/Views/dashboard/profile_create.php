<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>
<div class="row">

		<div class="container">
			<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
     <h3>  <?= $_SESSION['firstname']." ".$_SESSION['lastname']?> Profile </h3>




				<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
				<hr>



<form action="/user/profile/create/" method="post" enctype="multipart/form-data">
						<div class="row">


							<div class="col-12 col-sm-3">
								<div class="form-group">
										<label for="address">Gedner</label>
										<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" id="gender" value="male"<?= set_value('gender','male');?>>
				<label class="form-check-label" for="gender">
				Male
				</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" id="gender" value="female"<?= set_value('gender','female');?>>
				<label class="form-check-label" for="gender">
				Female
				</label>
				</div>
										<small> Enter your first name here </small>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
										<label for="address">National ID Number</label>
										<input type="text" class="form-control" name ="nic" id="firstname" value="<?= set_value('nic');?>" placeholder="National Id Number">
										<small> Enter your first name here </small>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
										<label for="address">Date of Birth</label>

													 <input type="date" name="birthdate" max=""
																	min="1960-01-01" class="form-control" value="<?= set_value('birthdate');?>">


										<small> Enter your first name here </small>
								</div>
							</div>
							<div class="col-12 col-sm-12">
								<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control" name ="address" id="address" value="<?= set_value('address');?>" placeholder="Address">
										<small> Enter your first name here </small>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
										<label for="address">Home Telephone</label>
										<input type="text" class="form-control" name ="mobile" id="mobile" value="<?= set_value('mobile');?>"placeholder="Address">
										<small> Enter your first name here </small>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
										<label for="address">Home Telephone</label>
										<input type="text" class="form-control" name ="hometel" id="firstname" value="<?= set_value('hometel');?>"placeholder="Address">
										<small> Enter your first name here </small>
								</div>
							</div>


							<div class="col-12 col-sm-4">
								<div class="form-group">
										 <label>NIC Image</label>
											<input type="file" name="nicimage" value="<?= set_value('nicimage');?>" />
											</div>
																<small> please upload your nic image  </small>
										</div>

								<div class="col-12 col-sm-4">
									<div class="form-group">
								       <label>Profile Image</label>
								        <input type="file" class="file-path validate"  name="profileimg" value="<?= set_value('profileimg');?>" >
								        </div>
												<small> please upload your profile image </small>
								      </div>
								  </div>
								</div>


					



							<div class="col-12 col-sm-12">
								<div class="form-group">
								<label for="address">Exam</label>

															<select class="form-control" id="qulification" name="qulification" onchange=''>
																<option> </otpion>
																<option value=1> No Education</option>
																<option value=2> Grade 5 </option>
																<option value=3> Grade 8</option>
																<option value=4> Up to GCE OL</option>
																<option value=5> Passed G.C.E OL</option>
																<option value=6> Up to GCE AL </option>
																<option value=7> Passed G.C.E AL </option>
																<option value=8> Undergraduate </option>
																<option value=9> Basic Degree </option>
																<option value=10> Basic Degree </option>
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

									<div class="col-12 col-sm-12">

									<input type="submit" class="btn btn-primary float-right" value="Register">
								</div>
	</form>
<?php
echo '<pre>';
	print_r($_POST);
echo '</pre>';
?>
</div>

</div>


<?= $this->endSection() ?>
