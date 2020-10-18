<?php

// Extends to class Database
// Only Protected methods
// Only interats with 'users' table

require_once SITE_ROOT . '/app/core/Database.php';

class Users extends Database {

	// Check if username exists
	protected function usernameCheck($username) {
		
		$this->prepare('SELECT * FROM users WHERE username = ?');
		$this->statement->execute([$username]);

		if ($this->statement->rowCount() > 0) {

			return true;

		} else {

			return false; 

		}

	}

	// Check if invite code is valid
	protected function invCodeCheck($invCode) {

		$this->prepare('SELECT * FROM invites WHERE code = ? AND used = 0');
		$this->statement->execute([$invCode]);

		if ($this->statement->rowCount() > 0) {

			return true;

		} else {

			return false; 

		}

	}


	// Login - Sends data to DB
	protected function login($username, $password) {
		
		// fetch username
		$this->prepare('SELECT * FROM users WHERE username = ?');
		$this->statement->execute([$username]);
		$row = $this->statement->fetch();
		
		// If username is correct
		if ($row) {

			$hashedPassword = $row->password;

			// If password is correct
			if (password_verify($password, $hashedPassword)) {

				return $row;

			} else {

				return false;

			}

		}

	}


	// Register - Sends data to DB
	protected function register($username, $hashedPassword, $invCode) {

		// Sending the query - Register user
		$this->prepare('INSERT INTO users (username, password) VALUES (?, ?)');

		// If user registered
		if ($this->statement->execute([$username, $hashedPassword])) {

			// Setting invite code to used
			$this->prepare('UPDATE invites SET used = 1 WHERE code = ?');
			$this->statement->execute([$invCode]);
			return true;

		} else {

			return false;

		}

	}


	// Get number of users
	protected function userCount() {
		
		$this->prepare('SELECT * FROM users');
		$this->statement->execute();
		$result = $this->statement->rowCount();
		return $result;

	}


	// Get name of latest
	protected function newUser() {
		
		$this->prepare('SELECT `username` FROM `users` WHERE id = (SELECT MAX(id) FROM `users`)');
		$this->statement->execute();
		$result = $this->statement->fetch();
		return $result->username;

	}

}