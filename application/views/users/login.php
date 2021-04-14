<div class="text-center container" >
<div style="margin-left:30%"> <?php echo form_open('users/login');?>
      <img class="mb-4" src="<?php echo base_url();?>/assets/img/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal" style="margin-left:-50%">Input Credentials to Login</h1>
      <h1 class="text-center" style="margin-left:-50%"><?= $title; ?></h1>
	  <?php echo validation_errors(); ?>

			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>Email</label>
					<input type="email" class="form-control" name="first_auth" placeholder="Email | Username">
				</div>
			</div>

			<div class="col-md-6 ">
				<div class="form-group single_input wow fadeInUp">
					<label>Password</label>
					<input type="password" class="form-control" name="sec_auth" placeholder="Password">
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block col-md-6">Submit</button>
			<p>Don't have an account?<a href="<?php echo base_url();?>/users/register">Create one</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	  <?php echo form_close(); ?>
	</div>
</div>