<?php
include 'app/require.php';

$user = new UserController;


if (Session::isLogged()) {

	Utility::redirect("index.php");
	
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$error = $user->getRegister($_POST);

}

Utility::head('Register');
Utility::navbar();
?>

	<div class="container mt-2">

        <div class="row justify-content-center">

			<div class="col-12 mt-3 mb-2">

				<?php if (isset($error)) : ?>
				<div class="alert alert-primary" role="alert">
			 		<?php Utility::display($error); ?>
			 	</div>
				<?php endif; ?>

			</div>

            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
				<div class="card">
					<div class="card-body text-center">

						<h4 class="card-title">Register</h4>
				
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		
							<div class="form-group text-left">
    							<label for="username">Username</label>
								<input type="text" class="form-control form-control-sm" id="username" name="username" minlength="3" required>
							</div>
		
							<div class="form-group text-left">
    							<label for="password">Password</label>
    							<input type="password" class="form-control form-control-sm" id="password" name="password" minlength="4" required>
  							</div>
		
							<div class="form-group text-left">
    							<label for="confirmPassword">Confirm Password</label>
    							<input type="password" class="form-control form-control-sm" id="confirmPassword" name="confirmPassword" minlength="4" required>
  							</div>
		
							<div class="form-group text-left">
    							<label for="invCode">Invite code</label>
    							<input type="text" class="form-control form-control-sm" id="invCode" name="invCode" required>
  							</div>
		  
							<button class="btn btn-dark" id="submit" type="submit" value="submit">Submit</button>

						</form>

					</div>
				</div>
			</div>

		</div>
		
	</div>

<script src="<?php SITE_ROOT ?>/assets/js/matchPass.js"></script>
<?php Utility::footer(); ?>