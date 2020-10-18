<?php

// Extends to class Users
// Only Public methods

require_once SITE_ROOT . '/app/models/UsersModel.php';
require_once 'SessionController.php';

class UserController extends Users {

	public function createUserSession($user) {

		Session::init();
		Session::set("login", true);
		Session::set("id", $user->id);
		Session::set("username", $user->username);
		Session::set("admin", $user->admin);
		Session::set("hwid", $user->hwid);
		Session::set("banned", $user->banned);

	}


	public function logoutUser() {

		session_unset();
		session_destroy();

	}


	public function getRegister($data) {

		// Bind login data 
		$username = trim($data['username']);
		$password = $data['password'];
		$confirmPassword = $data['confirmPassword'];
		$invCode = trim($data['invCode']);

		// Empty error vars
		$userError = $passError = "";
		$usernameValidation = "/^[a-zA-Z0-9]*$/";

		// Validate username on length and letters/numbers
		if (empty($username)) {

			return $userError  = "Please enter a username.";

		} elseif (strlen($username) < 3) {

			return $userError  = "Username is too short.";

		} elseif (strlen($username) > 14) {

			return $userError  = "Username is too long.";

		} elseif (!preg_match($usernameValidation, $username)) {

			return $userError  = "Username must only contain alphanumerical, dashes, Underscorers!";

		} else {

			// Check if username exists
			$userExists = $this->usernameCheck($username);
			if ($userExists == true) {

				return $userError  = "Username already exists, try another.";
	
			}

		}

		
		// Validate password on length
		if (empty($password)) {

			return $passError  = "Please enter a password.";

		} elseif (strlen($password) < 4) {

			return $passError  = "Password is too short.";

		} 


		// Validate confirmPassword on length
		if (empty($confirmPassword)) {

			return $passError  = "Please enter a password.";

		} elseif ($password != $confirmPassword) {

			return $passError  = "Passwords do not match, please try again.";

		}


		// Validate invCode
		if (empty($invCode)) {

			return $invCodeError  = "Please enter an invite code.";

		} else {

			// Check if invite code is valid
			$invCodeExists = $this->invCodeCheck($invCode);

			if ($invCodeExists == false) {

				return $invCodeError  = "Invite code is invalid or already used.";

			}

		}


		// Check if all errors are empty
		if (empty($userError) && empty($passError) && empty($invCodeError) && empty($userExistsError)  && empty($invCodeError)) {

			// Hashing the password
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			$result = $this->register($username, $hashedPassword, $invCode);

			// Session start
			if ($result) {

				Utility::redirect("login.php");

			} else {

				return 'Something went wrong.';
				
			}

		}

	}


	public function getLogin($data) {

		// Bind login data 
		$username = trim($data['username']);
		$password = $data['password'];

		// Empty error vars
		$userError = $passError = "";

		// Validate username
		if (empty($username)) {

			return $userError  = "Please enter a username.";

		}

		// Validate password
		if (empty($password)) {

			return $passError  = "Please enter a password.";

		}

		// Check if all errors are empty
		if (empty($userError) && empty($passError)) {

			$result = $this->login($username, $password);

			if ($result) {

				// Session start
				$this->createUserSession($result);
				Utility::redirect("index.php");

			} else {

				return 'Username/Password is wrong.';

			}

		}

	}


	public function getUserCount() {
		return $this->userCount();
	}


	public function getNewUser() {
		return $this->newUser();
	}
}
