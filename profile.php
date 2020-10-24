<?php

require_once 'app/require.php';

Session::init();

if (!Session::isLogged()) { Util::redirect('/login'); }
// if ($_SERVER['REQUEST_METHOD'] == 'POST') { $error = $user->loginUser($_POST); }

$uid = Session::get("uid");
$username = Session::get("username");
$admin = Session::get("admin");
$active = Session::get("active");

Util::banCheck();
Util::head($username);
Util::navbar();

?>

<main class="container mt-2">

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

					<div class="h5 border-bottom border-secondary pb-1"><?php Util::display($username); ?></div>
					<div class="row">
						<div class="col-12 clearfix">
							UID: <p class="float-right mb-0"><?php Util::display($uid); ?></p>
						</div>

						<div class="col-12 clearfix">

						
							Sub:
							<p class="float-right mb-0">
								<?php if ($active == '1') : ?>
									<i class="fas fa-check-circle"></i>
								<?php else : ?>
									<i class="fas fa-times-circle"></i>
								<?php endif; ?>
							</p>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</main>
<?php Util::footer(); ?>