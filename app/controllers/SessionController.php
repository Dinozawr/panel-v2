<?php

class Session {

    public static function init() {
		
	    	// This will make it only run on HTTPs protocol.
		session_start(['cookie_lifetime' => 0,'cookie_secure' => true,'cookie_httponly' => true]);
			
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


	public static function isBanned() {

		if (isset($_SESSION["login"]) && $_SESSION["banned"] == 1 && $_SESSION["admin"] == 0) {

			return true;

		} else {

			return false;

		}

	}
		
}
