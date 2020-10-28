<?php

// Extends to class Database
// Only Protected methods
// Only interats with 'users' table

require_once SITE_ROOT . '/app/core/Database.php';

class Users extends Database {

	// Check if username exists
	protected function usernameCheck($username) {
		
		$this->prepare('SELECT * FROM `users` WHERE `username` = ?');
		$this->statement->execute([$username]);

		if ($this->statement->rowCount() > 0) {

			return true;

		} else {

			return false; 

		}

	}

	// Check if invite code is valid
	protected function invCodeCheck($invCode) {

		$this->prepare('SELECT * FROM `invites` WHERE `code` = ? AND `used` = 0');
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
		$this->prepare('SELECT * FROM `users` WHERE `username` = ?');
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

		// Get inviter's username
		$this->prepare('SELECT `createdBy` FROM `invites` WHERE `code` = ?');
		$this->statement->execute([$invCode]);
		$row = $this->statement->fetch();

		// Sending the query - Register user
		$this->prepare('INSERT INTO `users` (`username`, `password`, `invitedBy`) VALUES (?, ?, ?)');

		// If user registered
		if ($this->statement->execute([$username, $hashedPassword, $row->createdBy])) {

			// Set invite code to used
			$this->prepare('UPDATE `invites` SET `used` = 1 WHERE `code` = ?');
			$this->statement->execute([$invCode]);
			return true;

		} else {

			return false;

		}

	}


	protected function UpdatePass($currentPassword, $hashedPassword, $username) {

		

		$this->prepare('SELECT * FROM `users` WHERE `username` = ?');
		$this->statement->execute([$username]);
		$row = $this->statement->fetch();

		// Fetch current password from database
		$currentHashedPassword = $row->password;

		if (password_verify($currentPassword, $currentHashedPassword)) {

			$this->prepare('UPDATE `users` SET `password` = ? WHERE `username` = ?');
			$this->statement->execute([$hashedPassword, $username]);
			return true;

		} else {

			return false;

		}

	}


	// Get number of users
	protected function userCount() {
		
		$this->prepare('SELECT * FROM `users`');
		$this->statement->execute();
		$result = $this->statement->rowCount();
		return $result;

	}


	// Get number of users
	protected function bannedUserCount() {
		
		$this->prepare('SELECT * FROM `users` WHERE `banned` =  1');
		$this->statement->execute();
		$result = $this->statement->rowCount();
		return $result;

	}

	
	// Get number of users
	protected function activeUserCount() {
		
		$this->prepare('SELECT * FROM `users` WHERE `active` = 1');
		$this->statement->execute();
		$result = $this->statement->rowCount();
		return $result;

	}


	// Get name of latest
	protected function newUser() {
		
		$this->prepare('SELECT `username` FROM `users` WHERE `uid` = (SELECT MAX(`uid`) FROM `users`)');
		$this->statement->execute();
		$result = $this->statement->fetch();
		return $result->username;

	}

}