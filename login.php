<?php
include 'app/require.php';

$user = new UserController;

Session::init();

if (Session::isLogged()) {

	Utility::redirect("index.php");
	
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$error = $user->getLogin($_POST);

}

Utility::head('Login');
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

						<h4 class="card-title">Login</h4>
				
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		
							<div class="form-group text-left">
    							<label for="username">Username</label>
    							<input type="text" class="form-control form-control-sm" id="username" name="username" required>
							</div>
		
							<div class="form-group text-left">
    							<label for="password">Password</label>
    							<input type="password" class="form-control form-control-sm" id="password" name="password" required>
  							</div>
		  
							<button class="btn btn-dark" id="submit" type="submit" value="submit">Submit</button>

						</form>

					</div>
				</div>
			</div>

		</div>
		
	</div>
	
<?php Utility::footer(); ?>