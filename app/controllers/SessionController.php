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

		return (isset($_SESSION["login"]) && $_SESSION["login"] === true) ? true : false;

	}


	public static function isAdmin() {

		return (isset($_SESSION["login"]) && $_SESSION["admin"] == 1) ? true : false;

	}


	public static function isBanned() {

		return (isset($_SESSION["login"]) && $_SESSION["banned"] == 1 && $_SESSION["admin"] == 0) ? true : false;

	}
		
}
