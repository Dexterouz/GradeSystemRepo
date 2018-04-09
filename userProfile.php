<?php 
include 'Pages/session.php';
$title="User Profile";
include 'Layout/_HEADER.php';
?>
<body>
 <div id="profile">
 	<b id="welcome">Welcome : <i style="color: red;"><?php echo ucfirst($login_session)." ".$f_name; ?></i>
 	</b>
 </div>
 </body>
<?
include 'Layout/_FOOTER.php';
 ?>