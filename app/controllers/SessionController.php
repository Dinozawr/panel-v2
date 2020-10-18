<?php

class Session {

    public static function init() {

		session_start();
			
	}


    public static function set($key, $val) {

		$_SESSION[$key] = $val;
			
	}


    public static function get($key) {

        if (isset($_SESSION[$key])) {

			return $_SESSION[$key];

        } else {

			return false;
				
		}
			
	}


	public static function isLogged() {

		if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

			return true;

		} else {

			return false;

		}

	}


	public static function isAdmin() {

		if (isset($_SESSION["login"]) && $_SESSION["admin"] == 1) {

			return true;

		} else {

			return false;

		}

	}
		
}