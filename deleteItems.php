<?php
$conn=mysqli_connect('localhost','root','','gaming');
$sql="DELETE  FROM products WHERE id='$_GET[id]' ";

if (mysqli_query($conn,$sql))
{
	echo '<script>alert("Product has been Removed...!")</script>';
    echo '<script>window.location="ItemsTable.php"</script>';
}
else
{
	echo "Not Deleted";
	header("refresh:1; url=ItemsTable.php");
}
?>