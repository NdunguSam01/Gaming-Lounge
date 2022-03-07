<?php 
include_once("AdminSession.php");

$page_title="Users Information";
 ?>
<html>
<head>
	<title ><?php echo $page_title;?></title>
	<style type="text/css">
	h1
	{
	padding-left: 480px;
	}
	table
	{
	background-color: none;
	width: 50%;
	border: 1px solid black;
	margin: 20px;
	border-collapse: collapse;
	}
	tr
	{
		border: 1px;
		padding: 10px;
	}
	tr:hover
	{
		bacground:#F5F5F5;
	}
	td
	{
		border: 1px solid black;
		padding: 5px;
	}
	th
	{
	border: 1px solid black;
	background-color: none;
	text-align: left;
	background-color: #4CAF50;
	color: white;
	}
	</style>
</head>
<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSRB3ggiPfHgv38dm3mgtT5SqNm5GWpHbv2sA&usqp=CAU">
	<h1><?php echo $page_title;?></h1>
	<a href="AdminPage.php">Home</a>

<table>
	<tr>
		<th>User ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone Number</th>
		<th>Username</th>
	</tr>
	<tr>
		
	</tr>
	<?php
		$conn=mysqli_connect('localhost','root','','gaming');


	 	$results_per_page=10;

	 	$sql="SELECT * FROM users";
	 	$result=mysqli_query($conn,$sql);
	 	$no_of_results=mysqli_num_rows($result);

	 $no_of_pages= ceil($no_of_results/$results_per_page);

	 	if (!isset($_GET['page'])) 
	 	{
	 		$page=1;
	 	}
	 	else
	 	{
	 		$page=$_GET['page'];
	 	}

	 	$this_page_first_result=($page-1)*$results_per_page; 

	 	$sql="SELECT * FROM users LIMIT ".$this_page_first_result. ",".$results_per_page;
	 	$result=mysqli_query($conn,$sql);
	 	
	 	if ($result->num_rows>0) 
	{
		while ($row=$result->fetch_assoc()) 
		{
			echo "<td>".$row["userID"]."</td>";
			echo "<td>".$row["fname"]."</td>";
			echo "<td>".$row["lname"]."</td>";
			echo "<td>".$row["phNo"]."</td>";
			echo "<td>".$row["userName"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "0 Results";	
	}

	
	for ($page=1;$page<=$no_of_pages;$page++) 
	{

  	echo '<a href="UsersInfo.php?page=' . $page . '">' . $page . '</a> ';
	}
	?>
</table>
</body>
</html>