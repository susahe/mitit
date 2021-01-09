<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>



<div class="row">
<div class="col=12 col-sm-12">
		<h3> Create Course  </h3>
	<div class="container">
			<div class="card col=12 col-sm-12">

				<h1></h1>
				<form class="" action="/create_course" method="post">
					<div class="row">

						<div class="col-12 col-sm-9">
							<div class="form-group">
									<input type="text" class="form-control" name ="csname" id="courseName" value="<?= set_value('csname');?>" placeholder="Enter Course Name" data-toggle="tooltip" data-placement="top" title="Course name or Course Title">
									<small> course name enter here </small>
							</div>
						</div>
						<div class="col-12 col-sm-3">
							<div class="form-group">
									<input type="text" class="form-control" name ="cscode" id="cs_code" value="<?= set_value('cscode');?>" placeholder="Enter Course code">
									<small> course code enter here </small>
							</div>
 					</div>
					<div class="col-12 col-lg-12">
							 <div class="form-group">
								  <label for="course_objectives">Course objectives:</label>
	     						<textarea class="form-control" id="coruse_objectives" rows="3" name="courseobjective"></textarea>
									<small> course objective is important to student know the ultimate goal of the course </small>
							</div>

					</div>

						<div class="col-12 col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name ="cstheryhrs" id="cstheryhrs" value="<?= set_value('cstheryhrs');?>" placeholder="Theory hours">
								<small> number of  hours for theory </small>
							</div>
						</div>

						<div class="col-12 col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name ="cspracthrs" id="cspracthrs" value="<?= set_value('cspracthrs');?>" placeholder="Practical hourse">
								<small> number of  hours for practical </small>
							</div>
						</div>
					<div class="col-12 col-sm-3">
							<div class="form-group">
								<input type="number" class="form-control" name ="csprojecthrs" id="csprojecthrs" value="<?= set_value('csprojecthrs');?>" placeholder="Project hours ">
								<small> hours of assesments/projects </small>
							</div>
					</div>



						<div class="col-12 col-sm-3">
							<div class="form-group">
								<div class="input-group ">
								  <div class="input-group-prepend">
								    <span class="input-group-text">Rs.</span>
								  </div>
								  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name ="csfees" id="csfees"  min="200" max="100000" value="<?= set_value('csfees');?>" placeholder="Course fees ">

								  <div class="input-group-append">
								    <span class="input-group-text">.00</span>
								  </div>

								</div>
									<small> coruse fees in Rs. </small>


							</div>
						</div>
					<div class="col-12 col-sm-3">
								<div class="form-group">
										<input type="number" class="form-control" name ="csperyear" id="csperyear" value="<?= set_value('csperyear');?>" placeholder="Course per year ">
										<small> number of courses for year </small>
								</div>
					</div>
					<div class="col-12 col-sm-3">
								<div class="form-group">
										<input type="number" class="form-control" name ="csduemonths" id="csduemonths" value="<?= set_value('csduemonths');?>" placeholder="Total months ">
										<small> total number of months for the course </small>
								</div>
					</div>
					<div class="col-12 col-sm-3">
								<div class="form-group">
									<select class="form-control" id="sel1" name="cstype" data-toggle="tooltip" data-placement="top" title="Course type">
											<option >Select Course Type</option>
											<option value=1>School Student</option>
											<option value=2>School Leaver </option>
									</select>
									<small> select the course type (training/acadamic) </small>
								</div>
					</div>
					<div class="col-12 col-sm-3">
							<div class="form-group">
									 <select class="form-control" name="no_installation" id="sel1" data-toggle="tooltip" data-placement="top" title="Input the way of payment made">
										 <option >Select Installment </option>
										 <option>Full Installment</option>
										 <option>2 Installment </option>
										 <option>3 Installment </option>
										 <option>4 Installment </option>
										 <option>5 Installment </option>
										 <option>6 Installment </option>
										 <option>4 Monthly Installment </option>
									 </select>
									 <small> course payment number of installment  </small>
 							</div>
					</div>
						<div class="col-12 col-sm-9">
							<div class="form-group">

  <select class="form-control" id="teacher" name="teacher_id_fk">
		<?php if ($teacher):?>
		<?php foreach($teacher as $teacher){?>
    <option value="<?= $teacher['user_id_fk']?>"> <?= $teacher['firstname']." ".$teacher['lastname']?></option>
	<?php }?>
<?php else :?>
<option> There is not teacher in database </option>
<?php endif; ?>
	  </select>
	<small> select the teacher from here </small>
</div>

						</div>
						<div class="col-12 col-sm-3">
									<div class="form-group">
											<input type="number" class="form-control" name ="max_students" id="max_students" value="<?= set_value('max_students');?>" placeholder="Course maximum students ">
											<small> maximum number of students for the course </small>
									</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
									<label for="address">Course Image</label>
									<div class="custom-file">
	    <input type="file" class="custom-file-input" id="customFile">
	    <label class="custom-file-label" for="customFile">Choose file</label>
	  </div>
									<small> Enter course image here </small>
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
						<div class="col-12 col-sm-12 ">

						<button type="submit" class="col-3 btn btn-primary float-right ">Create Course </button>
						<h1> </h1>
						<div>
					</div>
				</form>
</div>
</div>
</div>

</div>



<?= $this->endSection() ?>
