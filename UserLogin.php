<?php  
session_start();

$con=mysqli_connect("localhost","root","","gaming");

if (isset($_POST['submit'])) 
{
	$userName=$_POST['userName'];
	$password=$_POST['password'];

	$password=md5($password);
	$query="SELECT * FROM users WHERE userName='$userName' AND password='$password'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);

		if ($row['userName']==$userName && $row['password']==$password) 
		{
			$_SESSION['user']=$userName;
			$_SESSION['login_time_stamp']=time();
			header("Location:UserPage.php");
		}
		else
		{
            $_SESSION["error"]="Wrong username/password combination";
            header("location:UserLogin.php");
            array_push($errors, "wrong username/password combination");
        }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
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
            <img src ="UserPage.webp" style="width: 100%" "height: 100%">	
        </div>	
	<div class="loginbox">
		<h1>User Login</h1>
<form method="POST" action="UserLogin.php">
		
			<p>Username:</p>
			<p><input type="text" name="userName" placeholder="Username:" required></p>
		
			<p>Password:</p>
			<p><input type="password" name="password" placeholder="Password" required></p>
			<p>&nbsp;</p>
			<p><input type="submit" name="submit" value="Login"></p>
			<center><a href="UserReg.php">Don't have an account?</a></center>
</form>
</div>
</body>
</html>

