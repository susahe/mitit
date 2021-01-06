<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="row">
	<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
		<div class="container">
			<h3> Create Course  </h3>
				<form class="" action="/create_course" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
									<input type="text" class="form-control" name ="csname" id="courseName" value="<?= set_value('csname');?>" placeholder="Enter Course Name">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="cstheryhrs" id="cstheryhrs" value="<?= set_value('cstheryhrs');?>" placeholder="Theory Hours for the Coruse">

							</div>
						</div>

						<div class="col-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="cspracthrs" id="cspracthrs" value="<?= set_value('cspracthrs');?>" placeholder="Practical Hourse for the Course">
							</div>
						</div>



						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="csprojecthrs" id="csprojecthrs" value="<?= set_value('csprojecthrs');?>" placeholder="Enter Project Hours ">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="text" class="form-control" name ="csfees" id="csfees" value="<?= set_value('csfees');?>" placeholder="Enter Course Fees ">
							</div>
						</div>


					<div class="col-12 col-sm-6">
								<div class="form-group">
										<input type="text" class="form-control" name ="csperyear" id="csperyear" value="<?= set_value('csperyear');?>" placeholder="Enter Course Per Year ">
								</div>
					</div>

					<div class="col-12 col-sm-6">
								<div class="form-group">
										<input type="text" class="form-control" name ="csduemonths" id="csduemonths" value="<?= set_value('csduemonths');?>" placeholder="Enter Course per Months ">
								</div>
					</div>


						<div class="col-12">
							 <div class="form-group">

									<input type="text" name="cstype" value="">

							  </div>
						</div>

						<div class="col-12">
							 <div class="form-group">

									<input type="text" name="csobjctive" value="">

								</div>
						</div>
						<div class="col-12">
							 <div class="form-group">

									<input type="text" name="no installation" value="">

								</div>
						</div>
						<div class="col-12">
							 <div class="form-group">

									<input type="text" name="teacher_id_fk" value="">

								</div>
						</div>
						<div class="col-12">
							 <div class="form-group">

									<input type="text" name="maxstudents" value="">

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
						<button type="submit" class="col-3 btn btn-primary">Register </button>
					</div>
				</form>
</div>
 <a href#> Help </a> <a href="#>privacy Terms
</div>

</div>

<?= $this->endSection() ?>
