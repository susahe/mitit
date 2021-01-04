<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>


<div class="row">
	<div class="">
		<div class="container">
     <h3> <?= $user['firstname'].' '.$user['lastname']?> </h3>




				<?php if (session()->get('sucess')): ?>
				<div class="alert alert-success" role="alert">
						<?= session()->get('sucess')?>
					</div>
							<?php endif; ?>
				<hr>


								<form class="" action="/create_student" method="post">
									<div class="row">
										<div class="col-12 col-sm-3">
											<div class="form-group">
											<label for="address">Payment Installment</label>

																		<select class="form-control" id="installment" name="installment" onchange=''>
																			<option> </otpion>
																			<option value=1> Full Installment</option>
																			<option value=2> Two Installment</option>
																			<option value=3> Trhee Installment</option>
																			<option value=4> Four Installment</option>
																			<option value=5> Five Installment</option>
																			<option value=6> Six Installment </option>
																			<option value=7> Seven Installment </option>
																		</select>
										</div>
										</div>

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

																 <input type="date" name="birthdate" max="<?= $bdate?>"
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
													<input type="text" class="form-control" name ="hometel" id="firstname" value="<?= set_value('hometel');?>"placeholder="Address">
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
													<input type="text" class="form-control" name ="" id="firstname" value="<?= set_value('firstname');?>" placeholder="Address">
													<small> Enter your first name here </small>
											</div>
										</div>
										<div class="col-12 col-sm-3">
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
<?= $this->endSection() ?>
