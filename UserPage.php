<?php
//include_once("Sessions.php");
//$name=$_SESSION['user'];

if(isset($_SESSION["user"]))
{
    if(time()-$_SESSION["login_time_stamp"] >600) 
    {
    	echo '<script>alert("Session expired. Please log in again")</script>';
        session_unset();
        session_destroy();
        header("Location:UserLogin.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>USER HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="General.css">
</head>
<body>
	<div class="nav">
        <li><a href="UserLogOut.php">Log Out</a></li>
        <li><a class= "special" href="Cart.php">Items</a></li>
		<img src ="Login.webp" class="logo" alt="logos" width="200" height="200">
        <h1>WELCOME TO KIKWETU GAMING LOUNGE <?php echo $name; ?></h1>
       	<p><B>FOR THE LOVE OF THE GAME</B></p>

	
</div>
<div class ="header">
            <img src ="User2.webp" style="width: 100%" "height: 100%">	
        </div>	


</body>
</html>