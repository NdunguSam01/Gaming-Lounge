<?php  
session_start();

$con=mysqli_connect("localhost","root","","gaming");

if (isset($_POST['login'])) 
{
	$admin=$_POST['userName'];
	$password=$_POST['password'];

	$password=md5($password);
	$query="SELECT * FROM admin WHERE userName='$admin' AND password='$password'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);

		if ($row['userName']==$admin && $row['password']==$password) 
		{
			$_SESSION['admin']=$admin;
			$_SESSION['login_time_stamp']=time();
			header("Location:AdminPage.php");
		}
		else
		{
            $_SESSION["error"]="Wrong username/password combination";
            header("location:AdminLogin.php");
            array_push($errors, "wrong username/password combination");
        }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="General.css">
</head>
<body>
<div class="navigation">
    <div>
      <ul class="nav">
            <li><a class="special" href="MainPage.php">Home</a></li>
        <img src ="Login.webp" class="logo" alt="logos" width="200" height="200">
      </ul>
    </div>
  </div>

<div class ="header">
            <img src ="Admin2.webp" style="width: 100%" "height: 100%">	
        </div>	

	<!--<div class="nav">

				<li><a class="special" href="MainPage.php">Home</a></li>
				<img src ="Login.webp" class="logo" alt="logos" width="200" height="200">
	</div>

<div class ="header">
            <img src ="Admin2.webp" style="width: 100%" "height: 100%">	
        </div>-->	
	<div class="loginbox">
		<h1>ADMIN LOGIN</h1>
<form method="POST" action="AdminLogin.php">
		
			<p>ADMIN USERNAME:</p>
			<p><input type="text" name="userName" placeholder="Admin Username:" required></p>
		
			<p>PASSWORD:</p>
			<p><input type="password" name="password" placeholder="Password" required></p>
			<p>&nbsp;</p>
			<p><input type="submit" name="login" value="Login"></p>
			<a href="AdminReg.php">Don't have an account?</a>
</form>
</div>
</body>
</html>
