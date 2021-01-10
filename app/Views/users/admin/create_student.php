<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<?php
echo '<pre>';
	 print_r($_POST);
	 echo '</pre>';
	?>
<div class="row">
	<div class="">
		<div class="container">

					<h3> Your Selected Course :<?= $courses['csname']?> </h3>
							<hr><br/>

							<h4>Days your prefer to follow the course</h4>
							<script>
								function changeLevel(){
									var l = "/set_days/";
								  var level;
								  if(document.getElementById("day").value == 1){
								      level = "Monday";
								  }
								  else if(document.getElementById("day").value == 2){
								        level = "Tuesday";
								    }
										else if(document.getElementById("day").value == 3){
												 level = "Wednesday";
										 }
										 else if(document.getElementById("day").value == 4){
													 level = "Thursday";
											 }
											 else if(document.getElementById("day").value == 5){
														 level = "Friday";
												 }
												 else if(document.getElementById("day").value == 6){
															 level = "Saturday";
													 }

										else{
								        level = "Sunday";
								    }

								  document.getElementById("lvl").innerHTML=("Level: " +level);
									document.getElementById("add").setAttribute("href",l+level);

								}

							</script>


							<p id="lvl">Level: </p>


							<div class="col-12 col-sm-3">
									<div class="form-group">
									<label for="address">Day</label>

							<select class="form-control" id="day" name="days" onchange='changeLevel()'>
								<option> </otpion>
								<option value=1 selected> Monday</option>
								<option value=2> Tuesday</option>
								<option value=3> Wednesday</option>
								<option value=4> Thursday</option>
								<option value=5> Friday</option>
								<option value=6> Saturday</option>
								<option value=7> Sunday</option>
							</select>
							</div></div>

<div class=" col-6 col-sm-3"><a id="add" type="submit" class="btn btn-primary" href="/set_days/<?php $phpVar ?>" >Add </a> </div>









													<div class="col-12 col-sm-3">
															<div class="form-group">
													<table border="1">
														<tr><th>Days</th><th colspan="2"> Action </th>
														 </tr>
							<?php foreach($days as $day){ ?>
								<?php if(count($days)<=10):?>

								<tr> <td> <?= $day['days']?> </td><td>  <a id="Remove" type="submit" class="btn btn-primary" href="/remove_days/<?=$day['id'] ?>">Remove </a></td></tr>
							<?php else: ?>
							<?php endif;?>
							<?php } ?>
													</table>
												</div></div>


								<hr/>
													<div class="col-12 col-sm-9">
														<div class="form-group">

															<input type="text" hidden class="form-control" name ="time" id="course" value="<?= $courses['csname']?>" placeholder="Enter time">

														</div>
													</div>


												</div>

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
<div class="col-12"">
	<?php if (isset($validation)): ?>
	<div class="col-12">
		<div class="alert alert-danger" role="alert">
			<?= $validation->listErrors(); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
	<hr/>

	</div>
</div>
</div>

</div>

<?= $this->endSection() ?>lo
