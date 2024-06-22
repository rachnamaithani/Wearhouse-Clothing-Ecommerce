<?php
    session_start();
    include('../config/connection.php');

    $username=$_SESSION['username'];
    	
?>

<!----CHECK OUT PAGE ----------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <link href="../css/style.css" rel="stylesheet">
    <title>Shop Now! Wearhouse</title>
</head>
<body class="header">
    <!--------------------header section-------------------->
    <header >
        <div class="container-fluid">
            <div class="row">
                 <!-----------------top banner--------------------->
                <div class="col bg-dark text-center text-white pt-2">
                    <p style="font-size:12px;">BUY 2 and GET 30% OFF | USE CODE: FESTIVE10</p>
                </div>
            </div>
                <!-------------about us & contact us section----------->
            <div class="row p-2">
                <div class="col-6">
                    <a href="#" class="d-inline text-decoration-none pe-3 text-dark">Home</a>
                    <a href="#" class="d-inline text-decoration-none pe-3 text-dark">About Us </a>
                    <a href="#" class="d-inline text-decoration-none text-dark">Contact Us</a>
                </div>
                <div class="col-6 mb-3 d-inline text-end">
                    <a href="index.php" ><i class="fa fa-facebook me-2" style = "color:black"></i></a>
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
                <div class="col-6 text-center ">
                     <h1>CHECKOUT</h1>
                </div>
                <div class="col-3 text-center pt-3 ">
                     <a href="cart_table.php"><h6 class="text-end me-4"><i class="fa fa-mail-reply me-2" style="font-size:20px"></i>back to cart</h6></a>
                </div>
            </div>
        </div>
    </header>
    <!-------------main start ------------------->
    <main class="mt-2">
        <div class="container w-75">
            <div class="row" style="background-image:url('../images/backgroundimg22.jfif');background-repeat:no-repeat;">
                <div class="col-6" >
                    <div class="pt-4 ps-3">
                        <h6><?php echo $username ?>,pay</h6>
                        <?php

                        /* query for calculating total amount to pay*/
                        $user_p="SELECT * FROM `cart_details` WHERE `username`='$username'";
                        $user_p_run=mysqli_query($conn,$user_p);  

                        $subtotal=0;
                        while($fetch_p=mysqli_fetch_assoc($user_p_run)){

                           $p_amt=$fetch_p['total_amount'];

                           //calculating subtotal amount of all products to pay
                           $price=array($p_amt);
                           $total_amt=array_sum($price);
                           $subtotal+=$total_amt;
                        }
                            //adding gst to subtotal amount
                            $total_products_price=$subtotal+50;
                            echo "<p class='h3'>₹ $total_products_price</p>";
                         ?>
                    </div>    
                    <div style="overflow-y: scroll; max-height:400px;scrollbar-width: none !important;">

                    <!--------------Table of User selected products for buying ------------->
                        <table class="table">
                            <tbody>
                                <?php
                                
                                /* query for showing product in the cart and total bill including GST and shipping charges*/
                                $user_products="SELECT * FROM `cart_details` WHERE `username`='$username'";
                                $user_products_run=mysqli_query($conn,$user_products);  

                                $i=0;
                                while($fetch_product=mysqli_fetch_assoc($user_products_run)){

                                    $p_size=$fetch_product['size'];
                                    $p_quantity=$fetch_product['quantity'];
                                    $p_total_amt=$fetch_product['total_amount'];
                                    $p_id=$fetch_product['product_id'];

                                    $product_ids[$i]=$p_id;
                                    $product_sizes[$i]=$p_size;
                                    $product_quantities[$i]=$p_quantity;
                                    
                                    $product_data="SELECT * FROM `products` WHERE `product_id`='$p_id'";
                                    $product_data_run=mysqli_query($conn,$product_data);

                                    while($fetch_product_data=mysqli_fetch_assoc($product_data_run)){

                                        $p_name = $fetch_product_data['product_name'];  
                                        $p_img = $fetch_product_data['product_image1'];   
                                ?>
                            <tr>
                                <td class="text-center">
                                    <img src="<?php echo $p_img ?>" height="70px" class="border border-2 rounded ">
                                </td>
                                <td>
                                    <span>
                                        <h5><?php echo $p_name ?></h5>
                                        <p style="font-size:11px;font-weight:600;">Size: <?php echo $p_size ?></p>
                                        <p style="font-size:11px;font-weight:600;margin-top:-10px;">Qty: <?php echo $p_quantity ?></p>
                                    </span>
                                </td>
                                <td> ₹ <?php echo $p_total_amt ?></td>
                            </tr>
                                        <?php
                                        }
                                    $i++;

                                }
                                // store ids of all user products in one variable by converting into string
                                // store sizes of all user products in one variable by converting into string
                                // store quantities of all  user products in one variable by converting into string
                                $pro_ids=implode(" ",$product_ids);
                                $pro_sizes=implode(" ",$product_sizes);
                                $pro_quantities=implode(" ",$product_quantities);
                                ?>
                            <tr>
                                <td></td>
                                <td>
                                    <p>Subtotal : </p>
                                    <p>GST :</p>
                                    <p>Shipping :</p>
                                </td>
                                <td>
                                    <p>₹ 5000</p>
                                    <p>₹ 50</p>
                                    <p>FREE</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p class="h5">TOTAL :
                                </td>
                                <td>
                                    <?php
                                        echo "<p class='h5'>₹ $total_products_price </p>";
                                        ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php

                /*query to fetch user details like username, address , phoneno , email, payment mode ,state, city, zipcode---*/
                    $select_user_data="SELECT * FROM `users` WHERE `username`='$username'";
                    $select_user_data_run=mysqli_query($conn,$select_user_data);

                    $fetch_user_data=mysqli_fetch_assoc($select_user_data_run);

                ?>
                <div class="col-6 pt-3 pb-3">
                     <div class="form-group row mt-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"  value="<?php echo $fetch_user_data['username']; ?>" readonly >
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" value="<?php echo $fetch_user_data['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="phoneno" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" value="<?php echo $fetch_user_data['phoneno']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="address" class="col-sm-3">Address</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" readonly><?php echo $fetch_user_data['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="state" class="col-sm-1 col-form-label" style="padding:0px">State</label>
                        <div class="col-sm-3">
                             <input type="text" class="form-control" readonly value="<?php echo $fetch_user_data['state']; ?>">
                        </div>
                        <label for="city" class="col-sm-1 col-form-label" style="padding:0px">City</label>
                        <div class="col-sm-3">
                             <input type="text" class="form-control" readonly value="<?php echo $fetch_user_data['city']; ?>">
                        </div>
                        <label for="zip" class="col-sm-1 col-form-label" style="padding:0px">Zipcode</label>
                        <div class="col-sm-3">
                             <input type="text" class="form-control" readonly value="<?php echo $fetch_user_data['zipcode']; ?>">
                        </div>
                    </div>
                    <form method="get">
                        <div class="form-group mt-3">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Payment Method</legend>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentmode" value="online" disabled>
                                        <label class="form-check-label" for="mode"> Online </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentmode" value="offline">
                                        <label  for="mode"> Offline</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addressverify[]" value="true" required>
                                        <label  for="add">Billing address is same as shipping.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100 btn-lg" name="placeorder">Place Order</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    
                    /*insert order details to order_details table in db*/
                        if(isset($_GET['placeorder']) ){

                            if(isset($_GET['paymentmode'])){
                                
                            $userid = $fetch_user_data['id'];

                            $invoiceno = mt_rand(10000,99999);

                            $user_products = "SELECT * FROM `cart_details` WHERE `username`='$username'";
                            $user_products_run = mysqli_query($conn,$user_products);  

                            $countproducts = mysqli_num_rows($user_products_run);
                            
                            $payment_mode = $_GET['paymentmode'];

                            if($payment_mode =='offline'){
                                    $status = "pending";
                                }
                            else{
                                $status = "approved";
                            } 
                            
                            date_default_timezone_set('Asia/Calcutta'); 
                            $time = date('H:i:s');
                            $date = date('d-m-Y');
                            $timing=$date." ".$time;

                            //insert products to users_orders table in db
                             $order_place = "INSERT INTO `users_orders` (`user_id`,`products_ids`,`products_sizes`,`products_quantities`,`amount_due`,`invoice_number`,`total_products`,`order_date`,`payment_mode`,`order_status`) 
                            VALUES ('$userid','$pro_ids','$pro_sizes','$pro_quantities','$total_products_price','$invoiceno','$countproducts','$timing','$payment_mode','$status')";

                            $order_place_run=mysqli_query($conn,$order_place);

                            /*if($payment_mode =='offline'){
                        
                            $order_pending = "INSERT INTO `orders_pending` (`user_id`,`invoice_number`,`product_id`,`product_quantity`,`order_status`) 
                            VALUES ('$userid','$invoiceno','$pro_ids','$countproducts','$status')";

                                $order_pending_run=mysqli_query($conn,$order_pending);

                            }*/

                            //if products are added to users_orders table then delete this order products from cart table
                            if($order_place_run){
                            
                                $delete_cart_data="DELETE FROM `cart_details` WHERE `username`='$username'";
                                $delete_cart_data_run=mysqli_query($conn,$delete_cart_data);

                            }
                            
                            if($order_place_run ){
                            
                                ?>
                                <script>
                                      alert("order placed successfully");
                                      window.location.href="index.php";      
                                  </script>
                                <?php
                            }
                        }
                        else{
                            echo "please select the payment option";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
