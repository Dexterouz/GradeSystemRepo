<?php 
session_start(); //starting session
if (session_destroy()) { //destroying all session
	header("Location: index.php"); //redirecting to index page 
}
 ?>