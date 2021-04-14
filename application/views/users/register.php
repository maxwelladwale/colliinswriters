<div class="text-center container" >
<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <h1 class="text-center"><?= $title; ?></h1>
			
			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>First Name</label>
					<input type="text" class="form-control" name="fname" placeholder="First Name">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>Second Name</label>
					<input type="text" class="form-control" name="sname" placeholder="Second Name">
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
			</div>

			<div class="col-md-6" style="padding-top: 30px;">
				<label>User Type</label>
                <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <select class="form-control" type="text" name="user_type" placeholder="User Type" >
                        <option>- Select User Type -</option>
							<?php foreach($usertypes as $usertype): ?>
                        <option value="<?php echo $usertype['id']; ?>"><?php echo $usertype['name']; ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>

			<div class="col-md-6 ">
				<div class="form-group single_input wow fadeInUp">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group single_input wow fadeInUp">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block col-md-6">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </div>