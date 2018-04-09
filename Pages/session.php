<?php 
include 'DbConnection/dbconnect.php';
//calling the database connection function
doDB();

//starting session
session_start();
$f_name="";
//storing session
$user_check = $_SESSION['login_user'];

//query to fetch information of user
$ses_sql = "SELECT user_name, first_name FROM user_acct WHERE user_name='$user_check'";
$ses_res = mysqli_query($mysqli,$ses_sql) or die(mysqli_error($mysqli));

while ($row = mysqli_fetch_array($ses_res)) {
	$login_session = $row['user_name'];
	$f_name = $row['first_name'];
}

if (!isset($login_session)) {
	//close mysql connection
	mysqli_close($mysqli);

	//redirect to index page
	header("Location: index.php");
}
 ?>