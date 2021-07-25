<?php 

    session_start();
    include("controller/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('view/login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruba Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("view/dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("modle/insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("modle/view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                      echo" 
                        $(function() {
                         $(document).on('click','.delbutton',function(){
                         var element = $(this);
                         var del_id = element.attr('delete_product');
                         var info = 'id=' + del_id;
                        if(confirm('Are you sure you want to delete this Record?'')){
                          $.ajax({
                        type: 'GET',
                        url: 'modle/delete_product.php',
                        data: info,
                        success: function(){  } 
                        });
                      }
                       return false;
                });
                });
            ";
                        
                        include("modle/delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("modle/edit_product.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("modle/insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("modle/view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("modle/delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("modle/edit_p_cat.php");
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("modle/insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("modle/view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("modle/edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                echo" 
                        $(function() {
                         $(document).on('click','.delbutton',function(){
                         var element = $(this);
                         var del_id = element.attr('delete_cat');
                         var info = 'id=' + del_id;
                        if(confirm('Are you sure you want to delete this Record?')){
                          $.ajax({
                        type: 'GET',
                        url: 'modle/delete_cat.php',
                        data: info,
                        success: function(){  } 
                        });
                      }
                       return false;
                });
                });
            ";
                                
                        include("modle/delete_cat.php");
                        
                
                        
                }  if(isset($_GET['view_users'])){
                        
                        include("modle/view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("modle/delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("modle/insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("modle/user_profile.php");
                        
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>