<?php

include('db.php');

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a>
			</li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM product_categories";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["p_cat_id"];
			$brand_name = $row["p_cat_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}


if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['cat_id'];
			$pro_brand = $row['p_cat_id'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_date = $row['date'];
			$pro_type = $row['type'];
			$pro_dis = $row['dis'];
			
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-heading'>$pro_date</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>";
								if ($pro_type == 'diss') {
									$pro_price1 = $pro_price*$pro_dis/100;
		
				                    echo "
								     <div class='panel-heading'><del>$.$pro_price </del>";
								     echo " -- "."
								     $.$pro_price1
								      </div>";
			                   }else{
				                 echo "<div class='panel-heading'>$.$pro_price.00
									
								 </div>";
				
		};
			echo "
								
							</div>
						</div>	
			";
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE cat_id = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE p_cat_id = '$id'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['cat_id'];
			$pro_brand = $row['p_cat_id'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_type = $row['type'];
			$pro_dis = $row['dis'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>";
								if ($pro_type == 'diss') {
									$pro_price1 = $pro_price*$pro_dis/100;
		
				                     echo "
								     <div class='panel-heading'><del>$.$pro_price </del>";
								     echo " -- "."
								     $.$pro_price1
								      </div>";
			                   }else{
				                 echo "<div class='panel-heading'>$.$pro_price.00
									
								 </div>";
				
		};
			echo "
								
							</div>
						</div>	
			";
				
		}
	
	

}




?>






