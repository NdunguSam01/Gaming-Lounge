<?php
include_once("AdminSession.php");
$admin=$_SESSION['admin'];

if(isset($_SESSION["admin"]))
{
    if(time()-$_SESSION["login_time_stamp"] >600) 
    {
    	echo '<script>alert("Session expired. Please log in again")</script>';
        session_unset();
        session_destroy();
        header("Location:AdminLogin.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="General.css">
</head>
<body>
	<div class="nav">
		<li><a href="AdminLogOut.php">Log Out</a></li>
		<li><a href="ViewUsers.php">Users</a></li>	
		<li><a class="special "href="ItemsTable.php">Items</a></li>
		<img src ="Login.webp" class="logo" alt="logos" width="200" height="200">
        <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKIKWETU GAMING LOUNGE <?php echo $admin; ?></h1>
        <p><B>FOR THE LOVE OF THE GAME</B></p>
		
</div>
</div>
<div class ="header">
            <img src ="AdminReg.webp" style="width: 100%" "height: 100%">	
        </div>	


</body>
</html>
