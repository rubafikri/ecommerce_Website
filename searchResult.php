<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ecom_store";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_POST['search'])) {
	header('location:index.php');
	# code...
}
$key = $_POST['search'];
$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$key%'";



$run_query = mysqli_query($con,$sql);
	while($row=$run_query->fetch_assoc()){
			$pro_id    = $row['product_id'];
			
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			echo "<table><tr><td>".$pro_title."</td>";
			
				
		}

		
				
 ?>