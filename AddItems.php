<?php
include_once("AdminSession.php");
$db=mysqli_connect("localhost","root","","gaming");
$msg="";

if (isset($_POST['upload'])) 
{
	$image=$_FILES['image']['name'];
	$pname=mysqli_real_escape_string($db,$_POST['description']);
	$price=mysqli_real_escape_string($db,$_POST['price']);

	$target="Images/".basename($image);

	$sql="INSERT INTO products (pname,image,price) VALUES ('$pname','$image','$price')";

	mysqli_query($db,$sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
	{
		$msg="Menu upload successful";
		header("Location:ItemsTable.php");
	}
	else
	{
		$msg="Upload failed";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>New Item</title>
	<link rel="stylesheet" type="text/css" href="Add.css">
</head>
<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSvcftdRUFw0N1sXA3_ATmLU8-EsQ8h8nXg0w&usqp=CAU">
	<div id="content">
		<form method="post" action="AddItems.php" enctype="multipart/form-data">
			<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name="description" cols="40" rows="4" placeholder="Description"></textarea>
		</div>
		<div>
			<textarea name="price" placeholder="Item Price"></textarea>
		</div>
		<div>
			<input type="submit" name="upload" value="Upload item">
		</div>
		<br><br>
		<a href="ItemsTable.php">BACK</a><br><br>
		</form>
	</div>

</body>
</html>