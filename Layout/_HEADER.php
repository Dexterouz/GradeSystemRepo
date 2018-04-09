<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<script type="text/javascript" src="Script/script.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicons.ico">
	<title><?php echo $title; ?> | Online Grade Web App</title>
</head>
<body>
<header class="mainheader">
	<div class="img-container">
		<a href="index.php"><img src="logo3.png" class="img" alt="calculator logo" title="Calculator"></a>
	</div>
	<nav>
		<ul>
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="">Newsletter</a></li>
			<li><a href="inputGrade.php" target="_blank">Blog</a></li>
			<li class="right"><a href="Register.php">Register</a></li>
			<li class="right"><!--<a href="login.php">Login</a></li>--><?php if (basename($_SERVER['PHP_SELF'])=='userProfile.php') {
				echo "<a href=\"Logout.php\">Logout</a></li>";
			} 
			else{
				echo "<a href=\"Login.php\">Login</a></li>";

			}

				?>
		</ul>
	</nav>
</header>