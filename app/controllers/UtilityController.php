<?php

// Extends to NO classes
// Only Public methods

class Utility {

	public static function redirect($location) {

		header("location:". $location);
		exit;

	}

	public static function head($title) {

		include('includes/head.inc.php');

	}

	public static function navbar() {

		include('includes/navbar.inc.php');

	}

	public static function footer() {

		include('includes/footer.inc.php');

	}

	public static function display($string) {

		echo htmlspecialchars($string);

	}
	
}