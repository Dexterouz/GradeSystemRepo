<?php
ob_start();

include 'DbConnection/dbconnect.php';

// starting session
session_start();

//calling the database connection function
doDB();
$password = "";
$username = "";
// declaring the error variable
$usnameErr = $passwordErr = $loginErr = "";

if (isset($_POST['login'])) {

	if (empty($_POST['username'])) {
	$usnameErr = "Please input your username";
}
	if(empty($_POST['password'])) {
	$passwordErr = "Please input your password";
}
else{
	//preventing mysqli injection
	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	//$username = $_POST['username'];
	//$password = $_POST['password'];

	//Query the database
	$login_sql = "SELECT * FROM user_acct WHERE user_name='".$username."' AND Passwd='".$password."'";
	$login_res = mysqli_query($mysqli,$login_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($login_res) == 1) {
		$_SESSION['login_user'] = $username;
		header("Location: userProfile.php");
	}
	else{
		$loginErr = "Username or Password is Invalid!";
	}
}
}
?>
	<div class="container">
		<div class="form-main">
			<h2>Login</h2>
			<?php if (isset($loginErr)) { ?>
				<span class="failure"><?php echo $loginErr; ?></span>
			<?php } ?>
		<form action="" method="post">
				<label for="username">User Name</label>
				<input type="text" name="username" id="username" placeholder="Enter Username">
				<span class="error"><?php echo $usnameErr; ?></span>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="Enter Password">
				<span class="error"><?php echo $passwordErr; ?></span><br>
				<span id="shwpsw">Show Password <input type="checkbox" onclick="showPassword()"></span>
				<br>
				<input id="input" type="submit" name="login" value="Login">
				<span class="span-right">Forgot <a href="forgotpassword.html">Password?</a></span>
        </form>
    	</div>
    </div>