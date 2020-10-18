  
<?php

include 'app/require.php';

// Disable direct access
if(!isset($_SERVER['HTTP_REFERER'])){
    Utility::redirect("index.php");
}

Session::init();

if (!Session::isLogged()) {
	Utility::redirect("login.php");
}

$user = new UserController;
$user->logoutUser();
Utility::redirect("login.php");

?>