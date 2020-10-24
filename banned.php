<?php

require_once 'app/require.php';

$user = new UserController;

Session::init();

if (!Session::isLogged()) { Util::redirect('login'); }

$uid = Session::get("uid");
$username = Session::get("username");
$admin = Session::get("admin");

Util::banCheck();
Util::head($username);
Util::navbar();


?>

<section class="container mt-2">

	<div class="row">

		<!--Banned message-->
		<div class="col-12 mt-3 mb-2">
			<div class="alert alert-primary" role="alert">
				You have been permanently banned.
			</div>
		</div>

	</div>

</section>
<?php Util::footer(); ?>