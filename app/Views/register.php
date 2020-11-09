<div class="container">
	<div class="row">
		<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
			<div class="container">
				<h3> Register </h3>
				<hr>
				<form class="" action="/register" method="post">
					<div class="row">

						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="firstname"> First Name</label>
								<input type="text" class="form-control" name ="firstname" id="firstname" value="<?php set_value('firstname');?>" placeholder="Enter your first Name">
							</div>
						</div> 
					
						<div class="col-12 col-sm-6">				
							<div class="form-group">
								<label for="lastname"> Last Name </label>
								<input type="text" class="form-control" name ="lastname" id="lastname" value="<?php set_value('role');?>">
							</div>
						</div>
					
						<div class="col-12">
							<div class="form-group">
								<label for="email"> Email address </label>
								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>">
							</div>
						</div>					
				
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="password"> Password </label>
								<input type="password" class="form-control" name ="password" id="passwd" value="">
							</div>
						</div>
					
						<div class="col-12 col-sm-6">					
							<div class="form-group">
								<label for="password"> Confirm Password </label>
								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="">
							</div>
						</div> 
						
						<div class="col-12">					
							 <div class="form-group">
							    <label for="role">System Role</label>
							    <select class="form-control form-control-lg" id="role">
							      <option class="col-12">Student</option>
							      <option>Teacher</option>
							      <option>Parent</option>
							      <option>Staff</option>
							      <option>Admin</option>
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
					</div> 
					<div class ="row">
						<button type="submit" class="col-12 btn btn-primary">Register </button>
					</div> 
							<div class="col-12-sm-8 text-right">
								<a href="/"> Already have  account</a>
							</div> 
										
					
				</form>
			</div> 
		</div>
	</div>
</div> 
