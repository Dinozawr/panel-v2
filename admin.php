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

if (Session::isAdmin() == true) {echo 'hi';}
?>