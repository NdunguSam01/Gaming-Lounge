<?php
$page_title="Cart";
$database_name = "gaming";
$con = mysqli_connect("localhost","root","",$database_name);

if (isset($_POST["add"]))
    {
        if (isset($_SESSION["cart"]))
        {
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id))
            {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["pname"],
                    'product_price' => $_POST["price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }

            else
            {
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else
        {
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["pname"],
                'product_price' => $_POST["price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title?></title>
	<link rel="stylesheet" type="text/css" href="Table.css">
</head>
<body>
	<form method="post" action="UserCart.php?action=add">
	<table> 
		<tr>
			<th width="15%">Image</th>
			<th width="10%">Product Name</th>
			<th width="10%">Product Price</th>
			<th width="10%">Quantity</th>
			<th width="7%">Add to Cart</th>
		</tr>

		<tr>
			
		</tr>

		<?php  
		$results_per_page=3;
		$con=mysqli_connect("localhost","root","","gaming");
		$query="SELECT * FROM products";
		$result=mysqli_query($con,$query);

		$no_of_results=mysqli_num_rows($result);
		$no_of_pages=ceil($no_of_results/$results_per_page);

		if (!isset($_GET['page'])) 
	 	{
	 		$page=1;
	 	}
	 	else
	 	{
	 		$page=$_GET['page'];
	 	}

	 	$this_page_first_result=($page-1)*$results_per_page; 

	 	$query="SELECT * FROM products LIMIT ".$this_page_first_result. ",".$results_per_page;
	 	$result=mysqli_query($con,$query);

	 	if ($result->num_rows>0) 
		{
			while ($row=$result->fetch_assoc()) 
			{
			echo "<td><img src='Images/".$row['image']."'></td>";
			echo "<td>".$row["pname"]."</td>";
			echo "<td>".$row["price"]."</td>";
			echo "<td> "?> <input type="text" name="quantity" class="form-control" value="1"></td>" <?php
			echo "<td> "?> <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"  value="Add to Cart"></td>" <?php
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

  	echo '<a href="UserCart.php?page=' . $page . '">' . $page . '</a> ';
	}

		?>
	</table>
<!--</form>-->
</body>
</html>