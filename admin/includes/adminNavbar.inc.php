<!--Admin navigation-->

<!-- Check if admin // This is not important really.-->
<?php if (Session::isAdmin()) : ?>
	<div class="col-12 mt-3 mb-2">
		<div class="rounded p-3 mb-3">
			<a href='/index' class="btn btn-outline-primary btn-sm">Home</a>
			<a href='users' class="btn btn-outline-primary btn-sm">Users</a>
			<a href='invites' class="btn btn-outline-primary btn-sm">Invite codes</a>
		</div>
	</div>
<?php endif; ?>