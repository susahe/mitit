<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<div class="row">

		<div class="container">
			<h3> Create Course  </h3>
				<form class="" action="/create_course" method="post">
					<div class="row">

						<div class="col-12 col-sm-9">
							<div class="form-group">
									<input type="text" class="form-control" name ="csname" id="courseName" value="<?= set_value('csname');?>" placeholder="Enter Course Name">
									<small> course name enter here </small>
							</div>

						</div>

												<div class="col-12 col-sm-3">
													<div class="form-group">
															<input type="text" class="form-control" name ="cscode" id="courseName" value="<?= set_value('cscode');?>" placeholder="Enter Course code">
															<small> course code enter here </small>
													</div>

												</div>
						<div class="col-12 col-lg-12">
							 <div class="form-group>

	     <label for="exampleFormControlTextarea1">Course objectives:</label>
	     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

								</div>
								<small> coruse objective enter here</small>
						</div>

						<div>

						</div>
						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="number" class="form-control" name ="cstheryhrs" id="cstheryhrs" value="<?= set_value('cstheryhrs');?>" placeholder="Theory hours">
								<small> number of theory hours </small>
							</div>
						</div>

						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="number" class="form-control" name ="cspracthrs" id="cspracthrs" value="<?= set_value('cspracthrs');?>" placeholder="Practical hourse">
								<small> number of theory hours </small>
							</div>
						</div>



						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="number" class="form-control" name ="csprojecthrs" id="csprojecthrs" value="<?= set_value('csprojecthrs');?>" placeholder="Project hours ">
								<small> number of theory hours </small>
							</div>
						</div>

						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="number" class="form-control" name ="csfees" id="csfees"  min="200" max="100000" value="<?= set_value('csfees');?>" placeholder="Course fees ">
								<small> number of theory hours </small>
							</div>
						</div>


					<div class="col-12 col-sm-3">
								<div class="form-group">
										<input type="number" class="form-control" name ="csperyear" id="csperyear" value="<?= set_value('csperyear');?>" placeholder="Course per year ">
										<small> number of theory hours </small>
								</div>
					</div>

					<div class="col-12 col-sm-3">
								<div class="form-group">
										<input type="number" class="form-control" name ="csduemonths" id="csduemonths" value="<?= set_value('csduemonths');?>" placeholder="Course per months ">
										<small> number of theory hours </small>
								</div>
					</div>


						<div class="col-12 col-sm-3">
							<div class="form-group">

	<select class="form-control" id="sel1">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
	</select>
	<small> number of theory hours </small>
</div>

						</div>


						<div class="col-12 col-sm-3">
							<div class="form-group">

	 <select class="form-control" id="sel1">
		 <option>1</option>
		 <option>2</option>
		 <option>3</option>
		 <option>4</option>
	 </select>
	 <small> number of theory hours </small>
 </div>

						</div>
						<div class="col-12 col-sm-9">
							<div class="form-group">

  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
	<small> select teacher from here </small>
</div>

						</div>
						<div class="col-12 col-sm-3">
									<div class="form-group">
											<input type="number" class="form-control" name ="csduemonths" id="csduemonths" value="<?= set_value('csduemonths');?>" placeholder="Course per months ">
											<small> number of theory hours </small>
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
						<button type="submit" class="col-3 btn btn-primary ">Register </button>
					</div>
				</form>
</div>
</div>




<?= $this->endSection() ?>
