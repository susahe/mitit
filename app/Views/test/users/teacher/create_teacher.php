<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>

<div class="row">
	<div class="">
		<div class="container">
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
			<h3> Create a Teacher </h3>
							<hr><br/>
							<form class="" action="/create_teacher" method="post">
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

									<div class="col-12 col-sm-4">
										<div class="form-group">
											<div class="form-check">
											<fieldset>
														<div class="some-class">
															<input type="radio" class="radio" name="gender" value="1"<?= set_value('gender','male');?>" id="male" />
															<label for="male">Male</label>
															<input type="radio" class="radio" name="gender" value="0"<?= set_value('gender','female');?>" id="female" />
															<label for="female">Female</label>
														</div>
													</fieldset>
													<small> Enter your first name here </small>

												</div>

											</div>

										</div>



									<div class="col-12 col-sm-4">
										<div class="form-group">

												<input type="text" class="form-control" name ="nic" id="firstname" value="<?= set_value('nic');?>" placeholder="National Id Number">
												<small> Enter your National id number here </small>
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group">


															 <input type="date" name="birthdate" max="<?= $bdate?>"
																			min="1960-01-01" class="form-control" value="<?= set_value('birthdate');?>">


												<small> Enter your birth date here </small>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">

												<textarea class="form-control" id="address" name="address" rows="4" value="<?= set_value('address');?>">

												</textarea>

	<small> Enter your Address here </small>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">

												<input type="text" class="form-control" name ="mobile" id="mobile" value="<?= set_value('hometel');?>"placeholder="Mobile Number">
												<small> Enter your first name here </small>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">

												<input type="text" class="form-control" name ="hometel" id="hometel" value="<?= set_value('hometel');?>"placeholder="Home Telephone Number">
												<small> Enter your first name here </small>
										</div>
									</div>


									<div class="col-12 col-sm-4">
										<div class="form-group">
												<label for="address">profiel Pic</label>
												<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
												<small> Enter your first name here </small>
										</div>

									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group">
												<label for="address">Nic copy</label>
												<div class="custom-file">
					<input type="file" class="custom-file-input" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
												<small> Enter your first name here </small>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
												<label for="address">Education Qulification</label>
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
												<small> select highest educational qulification you have achieved </small>
										</div>
									</div>


									<div class="col-12"">
										<?php if (isset($validation)): ?>
										<div class="col-12">
											<div class="alert alert-danger" role="alert">
												<?= $validation->listErrors(); ?>
											</div>
										</div>
										<?php endif; ?>
									</div>

											<div class="col-12 col-sm-12">

											<button type="submit" class="btn btn-primary float-right">Register </button>
										</div>


							</form>
</div>
<div class="col-12"">
	<hr/>

	</div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>lo
