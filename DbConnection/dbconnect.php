<?php 
function doDB(){
	global $mysqli;
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'dexterous');
define('DBNAME', 'gradesystem');

$mysqli=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n",mysqli_connect_error());
	exit();
}
}
 ?>