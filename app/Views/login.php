<div class="container">
	<div class="row">
		<div class="col-12 cols-sm8 offset-sm2 col-md-6 offset-md-3 mt-5 pt-3 pb3 bg-white from-wrapper">
			<div class="container">
				<h3> Login </h3>
				<hr>
				<form class="" action="/" method="post">
					<div class="form-group">
					<label for="email"> Email address </label>
					<input type="email" class="form-control" name ="email" id="email" value="<?php set_value('email');?>">
					</div>
					<div class="form-group">
					<label for="password"> Password </label>
					<input type="password" class="form-control" name ="password" id="passwd" value="">
					</div>
					<div class ="row">
						<button type="submit" class="btn btn-primary">Login </button>
					</div> 
					<div class="col-12-sm-8 text-right">
						<a href="/register"> Dont' have accoutn yet?</a>
					</div> 
										
					</div>
				</form>
			</div> 
		</div>
	</div>
</div> 
