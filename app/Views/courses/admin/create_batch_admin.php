<?= $this->extend('templates/dashboard') ?>
<?= $this->Section('content') ?>



<div class="row">
		<div class="container">
	<div class="col-12 col-sm-12">
	<div class="card">
		<h6> Remaining Students: </h6>
	</div>
</div>

		<h3> Create Batch  </h3>

			<div class="card col=12 col-sm-12">

				<h1></h1>
				<div class="col-12 col-sm-12">
					<div class="form-group">


		<form class="" action="#" method="post">




				<input type="submit" name="" value="Add">

</form>


<?php
    if(isset($_POST['Add'])){ // Check if form was submitted

        $input = $_POST['course_id_fk']; // Get input text
        $message = "Success! You entered: " . $input;
    }
?>


				<div class="col=12 col-sm-12">
				<form class="" action="/create_batch" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
									<input type="text" class="form-control" name ="batch_code" id="courseName" value="<?= set_value('csname');?>" placeholder="Enter batch code" data-toggle="tooltip" data-placement="top" title="Batch code">
									<small> batch code enter here </small>
							</div>
						</div>


						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="number" min="1900" max="9999" class="form-control" name ="batch_year" id="cstheryhrs" value="<?= set_value('cstheryhrs');?>" placeholder="Year of Batch">
								<small> batch year   </small>
							</div>
						</div>



										<small> select the teacher from here </small>
										</div>




					<div class="col-12 col-sm-6">
								<div class="form-group">

										<input type="number" class="form-control" name ="max_students" id="csperyear" value="<?= set_value('csperyear');?>" placeholder="Maximum numbe ">
										<small> max students </small>
								</div>
					</div>





					<div class="col-12 col-sm-6">
								<div class="form-group">
									<label for="birthday">Start Date</label>
									<input type="date" id="birthday" name="start_date">
										<small>  </small>
								</div>
					</div>

					<div class="col-12 col-sm-6">
								<div class="form-group">
									<label for="birthday">End Date</label>
									<input type="date" id="birthday" name="end_date">
										<small>  </small>
								</div>
					</div>




						<select class="form-control" id="course" name="course_id_fk">
						<?php if ($courses):?>
						<?php foreach($courses as $course){?>
						<option value="<?= $course['cs_id_pk']?>"> <?=$course['csname']?></option>
						<?php }?>
						<?php else :?>
						<option> There is not teacher in database </option>
						<?php endif; ?>
						</select>
						<small> select the teacher from here </small>
						</div>



						<select class="form-control" id="teacher" name="teacher_batch_id_fk">
 					<?php if ($courses):?>
 					<?php foreach($courses as $course){?>
 					 <option value="<?= $course['cs_id_pk']?>"> <?=$course['firstname']." ".$course['lastname']?></option>
 					 <?php }?>
 					 <?php else :?>
 					 <option> There is not teacher in database </option>
 					 <?php endif; ?>
 					 </select>


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

						<button type="submit" class="col-3 btn btn-primary float-right ">Create Batch  </button>
						<h1> </h1>
						<div>
					</div>
				</form>
</div>
</div>
</div>

</div>
<script>
					$('#course').change(function() {
					  $('#teacher option').hide();
					  $('#teacher option[value="' + $(this).val() + '"]').show();
					  // add this code to select 1'st of streets automaticaly
					  // when city changed
					  if ($('#teacher option[value="' + $(this).val() + '"]').length) {
					    $('#teacher option[value="' + $(this).val() + '"]').first().prop('selected', true);
					  }
					  // in case if there's no corresponding street:
					  // reset select element
					  else {
					    $('#teacher').val('');
					  };
					});

</script>


<?= $this->endSection() ?>
