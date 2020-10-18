<?php

require_once 'app/require.php';
require_once 'app/controllers/CheatController.php';

$user = new UserController;
$cheat = new CheatController;

Session::init();

if (!Session::isLogged()) {
	Utility::redirect("login.php");
}

$id = Session::get("id");
$username = Session::get("username");
$admin = Session::get("admin");

Utility::head($username);
Utility::navbar();


?>

<div class="container mt-2">

	<div class="row">

		<!--Welome message-->
		<div class="col-12 mt-3 mb-2">
			<div class="alert alert-primary" role="alert">
				Welcome, <b><?php Utility::display($username) ?></b>
			</div>
		</div>


		<!--Chatbox-->
		<div class="col-lg-9 col-md-12">
			<div class="rounded p-3 mb-3">
				<div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-comments"></i> Chatbox</div>
				<?php print_r($cheat->getCheatData()); ?>
			</div>
		</div>


		<!--Status-->
		<div class="col-lg-3 col-md-12">
			<div class="rounded p-3 mb-3">
				<div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-exclamation-circle"></i> Status</div>
				<div class="row text-muted">

					<!--Total Members-->
					<div class="col-12 clearfix">
						Status: <p class="float-right mb-0"><?php Utility::display($cheat->getCheatData()->status); ?></p>
					</div>

					<!--Latest Member-->
					<div class="col-12 clearfix">
						Version: <p class="float-right mb-0"><?php Utility::display($cheat->getCheatData()->version); ?></p>
					</div>

				</div>
			</div>
		</div>


		<!--Statistics-->
		<div class="col-12">
			<div class="rounded p-3 mb-3">
				<div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-chart-area"></i> Statistics</div>
				<div class="row text-muted">

					<!--Total Members-->
					<div class="col-12 clearfix">
						Members: <p class="float-right mb-0"><?php Utility::display($user->getUserCount()); ?></p>
					</div>

					<!--Latest Member-->
					<div class="col-12 clearfix">
						Latest Member: <p class="float-right mb-0"><?php Utility::display($user->getNewUser()); ?></p>
					</div>

				</div>
			</div>
		</div>


	</div>
</div>
<?php Utility::footer(); ?>