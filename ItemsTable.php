<?php 
include_once("AdminSession.php");

$page_title="Available Items";
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
	width: 75%;
	border: 1px;
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
	color: black;
	}
	</style>
</head>
<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRgivTK7Gx3WTfTKCF2ed-f_XN6-2kxUa2Tqg&usqp=CAU">
	<h1><?php echo $page_title;?></h1>
	<a href="AdminPage.php">Home</a>
	<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href="AddItems.php">Add Item</a>

<table>
	<tr>
		<th width="15%" height="15%">Image</th>
		<!--<th width="8%">Product ID</th>-->
		<th width="15%">Product Description</th>
		<th width="10%">Product Price</th>
		<th width="10%">Added By</th>
		<th width="10%">Delete Item</th>
	</tr>
	<tr>
		
	</tr>
	<?php
		$conn=mysqli_connect('localhost','root','','gaming');


	 	$results_per_page=3;

	 	$sql="SELECT * FROM products";
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

	 	$sql="SELECT * FROM products LIMIT ".$this_page_first_result. ",".$results_per_page;
	 	$result=mysqli_query($conn,$sql);
	 	
	 	if ($result->num_rows>0) 
	{
		while ($row=$result->fetch_assoc()) 
		{
			echo "<td><img src='Images/".$row['image']."'></td>";
			//echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["pname"]."</td>";
			echo "<td>".$row["price"]."</td>";
			echo "<td>".$row["person"]."</td>";
			echo "<td><a href=deleteItems.php?id=".$row['id'].">Delete</a></td>";
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

  	echo '<a href="ItemsTable.php?page=' . $page . '">' . $page . '</a> ';
	}
	?>
</table>
</body>
</html>
