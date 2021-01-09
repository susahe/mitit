<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<div class="row">
	<div class="">
		<div class="container">
			<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper">
     <h3> <?= $_SESSION['firstname']." ".$_SESSION['lastname']?>'s </h3>




				<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
				<hr>


								<form class="" action="/create_student_profile" method="post">
									<div class="row">



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
</div>
		</div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>lo
