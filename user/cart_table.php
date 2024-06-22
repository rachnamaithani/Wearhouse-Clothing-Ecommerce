<?php
    session_start();
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

    //if logout button is click then end the session and redirect to index.php
    if(isset($_REQUEST['logout_btn'])){
        session_unset();
        session_destroy();
?>
    <script>
        alert("logout successfully");
        window.location.href="index.php";      
    </script>

    <?php
    } 
    ?>

<!-----CART TABLE CONTAINING ALL PRODUCTS OF USER ADDED TO CART------------>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="../css/style.css" rel="stylesheet">   
    <title>Cart Products</title>
</head>
<body>
    <!--------------------header section-------------------->
    <header class="header">
        <div class="container-fluid">
            <!-----------------top banner--------------------->
            <div class="row">
                <div class="col bg-dark text-center text-white pt-2">
                    <p>BUY 2 and GET 30% OFF | USE CODE: FESTIVE10</p>
                </div>
            </div>
            <!-------------about us & contact us section----------->
            <div class="row p-2">
                <div class="col-6">
                    <a href="index.php" class="d-inline text-decoration-none pe-3 text-dark">Home</a>
                    <a href="#" class="d-inline text-decoration-none pe-3 text-dark">About Us </a>
                    <a href="#" class="d-inline text-decoration-none text-dark">Contact Us</a>
                </div>
                <div class="col-6 mb-3 d-inline text-end">
                    <a href="#" ><i class="fa fa-facebook me-2" style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-twitter me-2"  style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-instagram me-2"  style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-youtube me-2" style = "color:black"></i></a>		
                </div>
            </div>
        </div>
        <!--------------brand logo ,search btn and login icon ----------------->
        <div class="container-fluid">
            <div class="row">
                <!-----------brand logo Wearhouse------------>
                <div class="col-3">
                     <img src="../images/logo2555.png" height="90px" class="ps-5 ms-3">
                </div>
                <!----------search bar ------------------>
                <div class="col-6"> 
                    <form method="post">
                        <div class="input-group mt-3">
                        <input type="text" class="form-control rounded " name="searchbar" placeholder="Search">
                        <button type="submit" class="btn btn-outline-success"  name="searchbtn" >search</button>
                        </div>
                    </form>
                </div>
                <!----------------cart icon----------redirect to cart table ------------>
                <div class="col-3 text-end">
                    <div class="mt-3">
                        <a href="cart_table" class="d-inline">
                            <i class="position-relative fa fa-shopping-cart me-5" aria-hidden="true" style="font-size:24px; color:black;">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:9px;">
                               
                               <?php  
                                //if user has logged in
                                if(isset($_SESSION['username'])){
                                    $user=$_SESSION['username'];
                                    cart_total_products($user);
                                }
                                //if user has not logged in
                                else{
                                    cart_total_products_guest();   
                                }
                                 ?>
                                </span>
                            </i>
                        </a>
                        <!--------------------User Login , User Logout ,User Profile ------------------------->
                        <div class="main_menu_list d-inline position-relative">

                            <?php 

                            //if user is logged in then on click redirect to user dashboard page
                                if(isset($_SESSION['username'])){
                                    echo "<a href='userprofile.php' class='d-inline'>";
                                        echo "<i class='fa fa-user-o me-5' aria-hidden='true'  style='font-size:24px; color:black;'></i>";

                                        //displaying username 
                                        $username=$_SESSION['username'];
                                        echo "<h6 class='position-absolute text-center' style='right:15px;'>$username</h6>";
                                    echo "</a>";
                                }

                            //if user is not logged in 
                                else{
                                    echo "<a href='#' class='d-inline'>";
                                    echo "<i class='fa fa-user-o me-5' aria-hidden='true'  style='font-size:24px; color:black;'></i>";
                                }
                             ?>
                            
                            <!---------------User login and logout------------->
                            <div class="program_list rounded" style="right:0px;top:28px;">
                                <div class="text-center " style="width: 7rem;">

                                    <?php 

                                        //if user is logged in then show logout btn
                                        if(isset($_SESSION['username'])){
                                        echo '<ul class="list-group list-group-flush">';
                                        echo '<li class="list-group-item">
                                            <form method="get">
                                                <input type="submit" name="logout_btn" value="Logout" style="background-color:white;border-bottom:none!important;">
                                            </form>
                                                </li>';
                                        echo '</ul>';
                                        }

                                        //else show both login and logout btn
                                        else{
                                            echo '<ul class="list-group list-group-flush">';
                                                echo '<li class="list-group-item"><a href="login.php">login</a></li>';
                                                echo '<li class="list-group-item"><a href="register.php">Register</a></li>';
                                            echo '</ul>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-----------------Saved for later items ------------------>
                        <a href="#" class="d-inline">
                            <i class="fa fa-heart-o  me-5" aria-hidden="true"  style="font-size:24px; color:black;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!---------------nav bar container------------------->
		<div class="container-fluid navndbanner">
			<div class="container-fluid navbar-container">
				<nav class="ps-5 pt-3 pb-2 navbar navbar-expand-lg">
		            <!-------------------nav bar link name------------------>
					<div class="ms-5 collapse navbar-collapse " id="navbarNav">
						<ul class="ms-5 navbar-nav">
                         <!--------------WOMEN PRODUCTS----------->
                            <li class="nav-item me-3 active main_menu_list">
                                <a class="nav-link" href="#"><span class="text-dark me-1">WOMEN</span><i class="fa fa-angle-down " style="font-size:22px"></i></a>
                                    <!--------------sub nav list------------------->
                                    <div class="container bg-white program_list border-top border-danger border-3" style="width: 340px;">
                                        <div class="row">
                                            <div class="col-5 navcol">
                                                <div class="h6 text-dark mt-4 ms-4"><h6>Western</h6></div>
                                                    <ul class="text-dark">	
                                                        <?php 
                                                            //dropdown list of women western product category's name 
                                                            get_women_western_products();
                                                        ?>
                                                    </ul>
                                            </div>
                                            <div class="col-7 text-right navcol">
                                                <div class="h6 text-dark mt-4 ms-4"><h6>Ethnic</h6></div>	
                                                    <ul class="text-dark">
                                                    <?php 
                                                    //dropdown list of women ethnic product category's name 
                                                        get_women_ethnic_products();
                                                    ?>
                                                    </ul>
                                            </div>	
                                        </div>
                                    </div>
                            </li>
                            <!-----------MENS'S PRODUCTS------------->
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link name----------------------------->
                                <a class="nav-link " href="#"><span class="text-dark me-1">MEN </span><i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                    <!----------------------------sub nav list----------------------->
                                    <div class="container bg-white  program_list border-top border-danger border-3"  style="width: 310px;">
                                        <div class="row bg-white">
                                            <div class="col-5 navcol">
                                                <div class="h6 text-dark ms-4 mt-4">formal</div>
                                                <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of men's formal product category's name 
                                                    get_formal_men_products();
                                                ?>
                                                </ul>
                                            </div>
                                            <div class="col-7 navcol">
                                                <div class="h6 text-dark ms-4 mt-4">Casual</div>	
                                                <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of men's casual product category's name 
                                                    get_casual_men_products();
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                            <!------------------KIDS PRODUCTS --------------------->
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link name---------------------->
                                <a class="nav-link " href="#"><span class="text-dark me-1">KID </span><i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                <!----------------------------sub nav list----------------------->
                                <div class="container bg-white program_list border-top border-danger border-3"  style="width: 370px;">
                                    <div class="row bg-white">
                                        <div class="col navcol">
                                            <div class="text-dark mt-4 ms-4">Girl</div>
                                            <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of girl child products category's name 
                                                    kid_girl_products();
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col navcol">
                                            <div class="text-dark mt-4 ms-4">Boy</div>	
                                            <ul class="bg-white text-dark">
                                                <?php 
                                                    //dropdown list of boy child products category's name 
                                                    kid_boy_products();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-------------BRANDS PRODUCTS----------------->
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link  brand name----------------------------->
                                <a class="nav-link " href="#">BRAND<i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                <!----------------------------sub nav list----------------------->
                                <div class="container bg-white program_list border-top border-danger border-3"  style="width: 230px;">
                                    <div class="row bg-white">
                                        <div class="col-12 navcol">
                                            <ul class="text-dark" >
                                                <?php
                                                //dropdown list of brands name
                                                    get_brand();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
					    </ul>
				    </div>
			    </nav>
		    </div>
	    </div>
    </header>
    <!----------header end----------------------->

    <!----------------main starts ------------------------->
    <main>
        <section class="show-cart-data m-auto w-75">
            <div class="text-end h5 mt-5">
                <a href="index.php">< Continue Shopping</a>
            </div>
            <h2 class="text-center my-5">CART PRODUCT DETAILS</h2>

            <?php

            if(isset($_SESSION['username'])){

                $user=$_SESSION['username'];  

                $select_cart_data="SELECT * FROM `cart_details` WHERE `username`='$user'";
                $select_cart_data_run=mysqli_query($conn,$select_cart_data);

                $result_count=mysqli_num_rows($select_cart_data_run);

                //if cart contain items then show items
                if($result_count>0){
                    $i=1;
                    $total_products_price=0;
            ?>
            
            <table class="table table-hover table-bordered my-5" >
                <thead>
                    <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                                
                    <?php       

                    while($fetch_cart_data=mysqli_fetch_assoc($select_cart_data_run)){

                    echo "<tr>";

                        $product_id= $fetch_cart_data['product_id'];
                        $p_id= $fetch_cart_data['p_id'];
                        $product_size=$fetch_cart_data['size'];
                        $product_quantity=$fetch_cart_data['quantity'];

                        $select_product_data="SELECT * FROM `products` WHERE `product_id`='$product_id'";
                        $select_product_data_run=mysqli_query($conn,$select_product_data);

                        while($row=mysqli_fetch_assoc($select_product_data_run)){

                            $product_name=$row['product_name'];
                            $product_price=$row['product_price'];
                            $product_image=$row['product_image1'];
                            $total_price=$product_price*$product_quantity;

                            echo "<th scope='row'>$i</th>";
                            echo "<td>$product_name</td>";
                            echo "<td><img src='$product_image' alt='product_img' width='50px'></td>";

                            echo "<form method='get'>";
                                echo "<td><input type='text' name='prod_size'  class='form-control' value='$product_size'></td>";
                                echo "<td>
                                        <input type='number' name='prod_quantity'  class='form-control' value='$product_quantity'>
                                        <input type='hidden' value='$p_id' name='update_prod_id' >
                                    </td>";
                                echo "<td><input type='text' name='prod_price'  class='form-control' value='$total_price' readonly></td>";

                                    //update and delete btn
                                    echo "<td><input type='submit' name='update_details' class='form-control btn btn-primary' value='Update'></td>";
                                    //echo "<td><input type='submit' name='delete_product' class='form-control btn btn-danger' value='Delete'></td>";
                            echo "</form>";

                            //update quantity or size of product function call
                            updateproduct($product_price,$p_id);

                            //delete product from cart function call
                           // deleteproduct($product_id);

                                //echo  "<td><a class='btn btn-primary mb-2' href ='update_product_details.php'>UPDATE</a></td>";
                                echo "<td><a class='btn btn-success mb-2' href ='delete_product_details.php?pno=$p_id'>DELETE</a></td>";
                                //echo "</form>";

                    echo "</tr>";
                                        
                             $i=$i+1;
                            $price_array=array($total_price);
                            $subtotal=array_sum($price_array);
                            $total_products_price+=$subtotal;
                        }
                    }
                } 
                    //if cart is empty
                else{
                        echo "<h3 class='text-center text-danger'>CART IS EMPTY</h3>";
                    }

                    echo "</tbody>";
                echo "</table>";

                //if cart contain one or more item then only show subtotal amount and checkout button
                if($result_count>0){
                    echo "<div class='d-flex align-items-center mb-5'>";
                        echo "<h3> Subtotal:<strong class='text-info me-5'>$total_products_price</strong></h3>";
                        echo "<a href='checkout.php?total_amt=$total_products_price' class='btn btn-success w-25 btn-lg'>Checkout</a>";
                    echo "</div>";
                }
            }
            else{
                echo "<h3 class='text-center text-danger'>CART IS EMPTY</h3>";
            }
            ?>
        </section>
    </main>
    </body>
</html>