  
<?php

include 'app/require.php';

// Disable direct access
if(!isset($_SERVER['HTTP_REFERER'])){
    Util::redirect('/');
}

Session::init();

if (!Session::isLogged()) { Util::redirect('/login'); }

$user = new UserController;
$user->logoutUser();
Util::redirect('/login');

?>