<h2 align="center">This repo is W.I.P, this is no where near to the final product.</h2>
<h1 align="center">znix.cc WebPanel</h1>
<p align="center">Web Panel for your CS:GO cheat.</p>

> Contribution is greatly appriciated. Make a pull request or message me on discord znix#1337 (don't add me just message me).


### Overview
<p align="center">
  <img src="https://i.imgur.com/VB2ial8.png" />
</p>

###### TECHNOLOGIES
* OOP PHP
* HTML5
* Bootstrap
###### RDBMS
* PDO
* Prepared Statements
###### SECURITY
* SQL injection proof
* XSS proof
* User does not interact with DB directly. All requests are handled by Controllers before sending data to Models.

---

### Features
1. Auth
	* Login
	* Register (Invite only)
2 Admin Panel
	* Generate invite code
  	* Ban/unban user
	* Make user admin/non-admin
  	* Activate/deactivate sub
  	* Reset HWID
	
---

### Functions 
###### List of functions and methods which you should know, to modify
* In SessionController
	* isLogged - `Returns true if user is logged, else false.` 
	* isAdmin - `Returns true if user is admin, else false.`
	* isBanned - `Checks if user is banned.`
* In UtilityController
	* redirect - `Redirects to paramter provided.` *Requires 1 parameter.*
	* head - `Calls include/head.inc.php in the page. Pass page title into this.` *Requires 1 parameter.*
	* navbar - `Calls include/navbar.inc.php in the page.`
	* footer - `Calls include/footer.inc.php in the page.`
	* display - `Sanitzes the parameter with htmlspecialchars.` *Requires 1 parameter.*

---

> Change DB info in core/Database.php <br>
> Change Site info in core/Config.php

---

### Credits
* Awesome OOP tutorials: https://www.youtube.com/playlist?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh
* Reference MVC model: https://github.com/Darynazar/login-register-script-mvc
