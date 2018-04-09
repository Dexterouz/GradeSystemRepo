<?php
ob_start();
include_once 'DbConnection/dbconnect.php';
doDB(); 
// Declaring the error Reporting variable
$fnameErr = $lnameErr = $univtyErr = $deptErr = $regErr = $emailErr = $usnameErr = $passwordErr = $password2Err = "";
//Form variable
$fname = $lname = $university = $department = $regno = $email = $username = $password = $confpasswd = $errType = "";
$error=false;


if ($_SERVER['REQUEST_METHOD']=="POST") {

	//funcrion to validate user input
	function validate_input($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//first name validation
	if (empty($_POST['fname'])) {
		$fnameErr="First name is required";
		$error = false;
	}
	elseif(!preg_match("/^[a-zA-Z]*$/", $_POST['fname'])) {
		$fnameErr="Only letters and whitespace allow";
		$error=false;
	}
	elseif(strlen($_POST['fname']) < 3) {
		$fnameErr="First name must have atleast 3 characters";
		$error=false;
	}
	else{
		$fname = validate_input($_POST['fname']);
		$error = true;
	}

	// last name validation
	if (empty($_POST['lname'])) {
		$lnameErr="Last name required";
		$error=false;
	}
	elseif(!preg_match("/^[a-zA-Z]*$/", $_POST['lname'])) {
		$lnameErr="Only letters and whitespace allow";
		$error=false;
	}
	elseif(strlen($_POST['lname']) < 3) {
		$lnameErr="last name must be atleast 3 characters";
		$error=false;
	}
	else{
		$lname = validate_input($_POST['lname']);
		$error = true;
	}

	// university name validation
	if (empty($_POST['university'])) {
		$univtyErr="University name  is required";
		$error=false;
	}
	else{
		$university = validate_input($_POST['university']);
		$error = true;
	}

	//department name validatioo
	if (empty($_POST['department'])) {
		$deptErr="Department name is required";
		$error=false;
	}
	else{
		$department = validate_input($_POST['department']);
		$error = true;
	}

	//Reg no validation
	if (empty($_POST['regno'])) {
		$regErr="Registration number is required";
		$error=false;
	}
	else{
		$regno = validate_input($_POST['regno']);
		$error = true;
	}

	//user name validation
	if (empty($_POST['username'])) {
		$usnameErr="Username is required";
		$error=false;
	}
	elseif (strlen($_POST['username']) < 3) {
		$usnameErr = "Username must be atleast 3 characters";
		$error = false;
	}
	else{
		$username = validate_input($_POST['username']);
		$error = true;
	}

	//password validation
	if (empty($_POST['password'])) {
		$passwordErr="Password is required";
		$error=false;
	}
	elseif (strlen($_POST['password']) < 6) {
		$passwordErr="Password length must be atleast 6 characters";
		$error=false;
	}
	else{
		$password = validate_input($_POST['password']);
		$error = true;
	}

	//Comfirm password validation
	if (empty($_POST['confpasswd'])) {
		$password2Err = "Confirm password is required";
		$error = false;
	}
	elseif ($_POST['password'] != $_POST['confpasswd']) {
		$password2Err="Password do not match";
		$error=false;
	}
	else{
		$confpasswd = validate_input($_POST['confpasswd']);
		$error = true;
	}

	//Email validation
	if (empty($_POST['email'])) {
		$emailErr="Email is required";
		$error=false;
	}
	elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$emailErr="Invalid Email Format";
		$error=false;
	}
	else{
		$email_sql="SELECT email FROM user_acct WHERE email='".$_POST['email']."'";
		$email_res=mysqli_query($mysqli,$email_sql) or die(mysqli_error($mysqli));
		$count=mysqli_num_rows($email_res);
		if ($count!=0) {
			$emailErr="Provided email is already use";
			$error=false;
		}
		else{
			$email = validate_input($_POST['email']);
			$error = true;
		}
	}
}

if (isset($_POST['Submit'])) {
	
if ($error) {
		$acct_sql="INSERT INTO user_acct(first_name,last_name,university_name,department_name,reg_no,email,user_name,passwd) 
				VALUES('".$fname."','".$lname."','".$university."','".$department."',
						'".$regno."','".$email."','".$username."','".$password."'
				)";
		$acct_res=mysqli_query($mysqli,$acct_sql) OR die(mysqli_error($mysqli));
		
			$errMSG="Successfully Registered!";
			$errType = "success";
		}
		else{
			$errMSG="Fill up the empty field";
			$errType = "failure";
			}
}

		//close mysql connection
		mysqli_close($mysqli);
?>
<div class="container">
	<div class="main">
		<div class="form-container">
			<form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
				<div class="reg-title">
					<h2>Register</h2>
				</div>
				<?php if (isset($errMSG)) { ?>
					 <span class="<?php if(isset($errMSG)) { echo $errType; } ?>"><?php echo $errMSG; ?></span>
					 <?php } ?>
				<div class="reg-container">
				<label for="fname">First Name</label>
				<input type="text" name="fname" placeholder="Enter First Name" value="">
				<span class="error"><?php echo $fnameErr; ?></span>
			
		
				<label for="lname">Last Name</label>
				<input type="text" name="lname" placeholder="Enter Last Name" value="">
				<span class="error"><?php echo $lnameErr; ?></span>
			
		
				<label for="university">University</label>
				<input type="text" name="university" placeholder="Enter university name" value="">
				<span class="error"><?php echo $univtyErr; ?></span>
			
		
				<label for="department">Department</label>
				<input type="text" name="department" placeholder="Department" value="">
				<span class="error"><?php echo $deptErr; ?></span>
			
		
				<label for="regno">Reg No</label>
				<input type="text" name="regno" placeholder="Registration Number" value="">
				<span class="error"><?php echo $regErr; ?></span>
			
		
				<label for="email">Email</label>
				<input type="Email" name="email" placeholder="Email" value="">
				<span class="error"><?php echo $emailErr; ?></span>
			
		
				<label for="usname">User Name</label>
				<input type="text" name="username" placeholder="User Name" value="">
				<span class="error"><?php echo $usnameErr; ?></span>
			
		
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="password" value="">
				<span class="error"><?php echo $passwordErr; ?></span>
			
		
				<label for="confpasswd">Re-Enter Password</label>
				<input type="password" name="confpasswd" placeholder="Re-Enter password">
				<span class="error"><?php echo $password2Err; ?></span>
			
		
				<input type="submit" name="Submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
<?php ob_end_flush(); ?>