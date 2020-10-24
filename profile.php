<?php

require_once 'app/require.php';
require_once 'app/controllers/CheatController.php';

$user = new UserController;
$cheat = new CheatController;

Session::init();

if (!Session::isLogged()) { Util::redirect('/login'); }

$uid = Session::get("uid");
$username = Session::get("username");
$admin = Session::get("admin");

Util::banCheck();
Util::head($username);
Util::navbar();


?>

<section class="container mt-2">

	<div class="row justify-content-center">

		<div class="col-12 mt-3 mb-2">

			<?php if (isset($error)) : ?>
				<div class="alert alert-primary" role="alert">
					<?php Util::display($error); ?>
				</div>
			<?php endif; ?>

		</div>

		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title text-center">Login</h4>

					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Username" name="username" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Password" name="password" required>
						</div>

						<button class="btn btn-outline-primary btn-block" id="submit" type="submit" value="submit">Login</button>

					</form>

				</div>
			</div>
		</div>

	</div>

</section>
<?php Util::footer(); ?>