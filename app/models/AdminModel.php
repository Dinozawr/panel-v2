<?php

// Extends to class Database
// Only Protected methods
// Only interats with 'Users/Cheat/Invites' tables

// ** Every block should be wrapped in Session::isAdmin(); check **

require_once SITE_ROOT . '/app/core/Database.php';

class Admin extends Database {
	
	// Get array of all users 
	// - includes hashed passwords too.
	protected function UserArray() {

		if (Session::isAdmin()) {

			$this->prepare('SELECT * FROM `users`');
			$this->statement->execute();

			$result = $this->statement->fetchAll();
			return $result;

		}

	}
	

	// Get array of all invite codes
	protected function invCodeArray() {

		if (Session::isAdmin()) {

			$this->prepare('SELECT * FROM `invites`');
			$this->statement->execute();

			$result = $this->statement->fetchAll();
			return $result;

		}

	}
	

	// Create invite code
	protected function invCodeGen($code, $createdBy) {

		if (Session::isAdmin()) {
			
			$this->prepare('INSERT INTO `invites` (`code`, `createdBy`) VALUES (?, ?)');
			$this->statement->execute([$code, $createdBy]);
			
		}

	}


	// Resets HWID
	protected function HWID($uid) {
		
		if (Session::isAdmin()) {

			$this->prepare('UPDATE `users` SET `hwid` = NULL WHERE `uid` = ?');
			$this->statement->execute([$uid]);

		}

	}


	// Set user active / inactive
	protected function active($uid) {
		
		if (Session::isAdmin()) {

			$this->prepare('SELECT `active` FROM `users` WHERE `uid` = ?');
			$this->statement->execute([$uid]);
			$result = $this->statement->fetch();

			if ($result->active == 0) {

				$this->prepare('UPDATE `users` SET `active` = 1 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			} else {
	
				$this->prepare('UPDATE `users` SET `active` = 0 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			}
			
		}

	}


	// Set user ban / unban
	protected function banned($uid) {
		
		if (Session::isAdmin()) {

			$this->prepare('SELECT `banned` FROM `users` WHERE `uid` = ?');
			$this->statement->execute([$uid]);
			$result = $this->statement->fetch();

			if ($result->banned == 0) {

				$this->prepare('UPDATE `users` SET `banned` = 1 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			} else {
	
				$this->prepare('UPDATE `users` SET `banned` = 0 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			}
			
		}

	}


	// Set user admin / non admin
	protected function administrator($uid) {
		
		if (Session::isAdmin()) {

			$this->prepare('SELECT `admin` FROM `users` WHERE `uid` = ?');
			$this->statement->execute([$uid]);
			$result = $this->statement->fetch();

			if ($result->admin == 0) {

				$this->prepare('UPDATE `users` SET `admin` = 1 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			} else {
	
				$this->prepare('UPDATE `users` SET `admin` = 0 WHERE `uid` = ?');
				$this->statement->execute([$uid]);
	
			}
			
		}

	}

}