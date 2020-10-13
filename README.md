<h1 align="center">znix.cc WebPanel W.I.P</h1>
<p align="center">Web Panel for your CS:GO cheat.</p>

> I tried to make it secure as possible but if you find any security issue please write in the 'issues' tab.

### Overview
###### Technologies
* OOP PHP
* HTML5
* Bootstrap
###### RDBMS
* PDO
* Prepared Statements

### Features
1. Auth
	* Login
	* Register (Invite only)
	
### Functions `(List of functions and methods which you should know, to modify)`
* In SessionController
	* logged - `Checks if user is logged in, if not redirects to login page.` 
	* notLogged - `Checks if user is **not** logged in, if logged in, redirects to index page.`
	* banned - `Checks if user is banned.`
* In UtilityController
	* redirect - `Redirects to paramter provided.` *Requires 1 parameter.*
	* head - `Calls include/head.inc.php in the page. Pass page title into this.` *Requires 1 parameter.*
	* navbar - `Calls include/navbar.inc.php in the page.
	* footer - `Calls include/footer.inc.php in the page.
	
> Change DB info in core/Database.php
> Change Site info in core/Config.php
