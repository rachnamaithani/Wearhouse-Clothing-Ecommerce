<!--------------ADMIN DASHBOARD---------------->
<?php
    session_start();
    include('../config/connection.php');

    //if logout button is click then end the session and redirect to admin_login.php
    if(!isset($_SESSION['admin_username'])){
        ?>
        <script>
              alert("login first");
              window.location.href="admin_login.php";      
          </script>
        <?php
    }

    //count no. of products
    $select_products="SELECT * FROM `products`";
    $select_products_run=mysqli_query($conn,$select_products);
    $product_count=mysqli_num_rows($select_products_run);

    //count no. of categories
    $select_category="SELECT * FROM `categories`";
    $select_category_run=mysqli_query($conn,$select_category);
    $category_count=mysqli_num_rows($select_category_run);

    //count no. of brands
    $select_brands="SELECT * FROM `brand`";
    $select_brands_run=mysqli_query($conn,$select_brands);
    $brands_count=mysqli_num_rows($select_brands_run);

    //count no. of order placed
    $select_orders="SELECT * FROM `users_orders`";
    $select_orders_run=mysqli_query($conn,$select_orders);
    $orders_count=mysqli_num_rows($select_orders_run);

    //count no. of users
    $select_users="SELECT * FROM `users`";
    $select_users_run=mysqli_query($conn,$select_users);
    $users_count=mysqli_num_rows($select_users_run);

    $admin=$_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
    <style>
        body{
            overflow-x:hidden;
        }
        /*view_products.php table */
        .view_row{
            border:1px solid black;
        }
        th{
            background-color:#6585ff !important;
            border: 0.1px solid black !important;
        }
        .view_row td:nth-child(odd){
            background-color: #b7a9ff !important;
        }   
    </style>
</head>   
<body>
    <!-----------section 1----------->
    <section class="h-100">
        <div class="row h-100">
            <!---------------adding side navbar---------------->
            <?php require("side-navbar.php");?>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding-left:0px;background:#ffd5ebd1;">
                <div id="menu" style="height:138px;background-image: linear-gradient(to top, #ff9f9f 0%, #ffb102 100%);background-repeat: no-repeat;">
                    <div class="text-end pe-4">
                        <p  style="font-size: 24px;padding-top:48px"><?php echo $admin?> <a href="#" class="text-dark"> <i class="fa fa-sort-desc" aria-hidden="true"></i> </a></p>
                    </div>
                </div> 
                <div class="text-center">
                    <div style="color:#679b5a;">
                    <!------------insert category page ----------------------->
                        <?php
                        if(isset($_GET['insert_categories'])){
                            include('insert_categories.php');
                        }
                        else if(isset($_GET['register'])){
                            include('admin_register.php');
                        }
                        else if(isset($_GET['insert_brand'])){
                            include('insert_brand.php');
                        }
                        else if(isset($_GET['insert_product'])){
                            include('insert_product.php');
                        }
                        else if(isset($_GET['view_product'])){
                            include('view_products.php');
                        }
                        else if(isset($_GET['view_categories'])){
                            include('view_categories.php');
                        }
                        else if(isset($_GET['view_brands'])){
                            include('view_brands.php');
                        }
                        else if(isset($_GET['admin_view_orders'])){
                            include('admin_view_orders.php');
                        }
                        else if(isset($_GET['all_users'])){
                            include('view_all_users.php');
                        }

                    // if no page is clicked then show default page
                        else{
                            ?>
                            <div class="container-fluid">
                                <div class="row m-3">
                                    <!-------Total Product, redirection to product view table ------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/products22.jfif" class="rounded-circle"  width="100px" >
                                                <p class="h1 pt-2"><?php echo $product_count ?></p>
                                                <h3>Products</h3>
                                                <a href="./index2.php?view_product"><button class="btn m-2" style="font-weight:500;">View Products  <i class="fa fa-angle-double-right" style="font-size:20px"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                     <!-------Total Category, redirection to category view table ------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/category11.jfif" class="rounded-circle"  width="110px" >
                                                <p class="h1 pt-2"><?php echo $category_count ?></p>
                                                <h3>Categories</h3>
                                                <a href="./index2.php?view_categories"><button class="btn m-2" style="font-weight:500;">View Categories  <i class="fa fa-angle-double-right" style="font-size:20px"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                     <!-------Total Brands, redirection to brand view table ------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/brand23.png" class="rounded-circle"  width="100px" >
                                                <p class="h1 pt-2"><?php echo $brands_count ?></p>
                                                <h3>Brands</h3>
                                                <a href="./index2.php?view_brands"><button class="btn m-2" style="font-weight:500;">View Brands  <i class="fa fa-angle-double-right" style="font-size:20px"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                     <!-------Total orders, redirection to orders view table ------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/cartimg2.jfif" class="rounded-circle"  width="100px"  >
                                                <p class="h1 pt-2"><?php echo $orders_count ?></p>
                                                <h3>Orders</h3>
                                                <a href="./index2.php?admin_view_orders"><button class="btn m-2" style="font-weight:500;">View Orders  <i class="fa fa-angle-double-right" style="font-size:20px"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-----------Total users, redirection to users table------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/viewusers.jfif" class="rounded-circle"  width="100px" >
                                                <p class="h1 pt-2"><?php echo $users_count?></p>
                                                <h3>Users</h3>
                                                <a href="./index2.php?all_users"><button class="btn m-2" style="font-weight:500;">View Users <i class="fa fa-angle-double-right" style="font-size:20px"></i> </button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-----------Total data analysis------------------->
                                    <div class="col-3 m-2">
                                        <div class="card text-center shadow p-2 bg-warning">
                                            <div class="card-body text-center">
                                                <img src="../images/analysis.jfif" class="rounded-circle" width="100px" >
                                                <h3>Analysis</h3>
                                                <p class="h1 pt-2" style="font-weight:500;">View</p>
                                                <button class="btn m-2" style="font-weight:500;">Analysis  <i class="fa fa-angle-double-right" style="font-size:20px"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                              }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>