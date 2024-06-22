<?php
    session_start();

    include("../config/connection.php");

    $username=$_SESSION['username'];

    $select_user_id="SELECT `id` FROM `users` WHERE `username`='$username'";
    $select_user_id_query_run=mysqli_query($conn,$select_user_id);

    $fetch_details=mysqli_fetch_assoc($select_user_id_query_run);
    $id=$fetch_details['id'];

 ?>

<!-------------VIEW USERS ORDERS ------------------>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            th{
                background-color:#6585ff !important;
                border: 0.1px solid black !important;
            }
            td:nth-child(odd){
                background-color: #b7a9ff !important;
            }   
        </style>
    </head>   
    <body>
        <div class="row " style="background-image: linear-gradient(to top, #b224ef 0%, #7579ff 100%);">
            <!---------------added user side nav bar------------------>
            <?php require("user_side_navbar.php");?>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background-color:#d2f9ffd1;">
                <div id="menu" style="height:138px;background-image: linear-gradient(to top, #9fffe7 0%, #02ccff 100%);background-repeat: no-repeat;">
                    <div class="w-25 float-end">
                            <p class="pull-right me-4" style="font-size: 18 px;padding-top:55px"><a href="index.php" class="text-dark text-decoration-none">Continue Shopping</a></p>
                    </div>
                </div> 
                <h1 class="mainheading text-center mt-4">ALL ORDERS</h1>
                <?php
                    $select_user_orders="SELECT * FROM `users_orders` WHERE `user_id`='$id'";
                    $select_user_order_query_run=mysqli_query($conn,$select_user_orders);

                    $num_rows=mysqli_num_rows($select_user_order_query_run);
                        
                    if($num_rows>0){
                ?>
                <hr>
                <div class="p-4">
                    <table class="table">
                        <thead>
                            <tr >
                                <th scope="col">S NO.</th>
                                <th scope="col" colspan="3" >Products Name</th>
                                <th scope="col">Total Products</th>
                                <th scope="col">Amount Due</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Payment Mode</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $i=1;

                                //query to fetch specific user order 
                                while($data=mysqli_fetch_assoc($select_user_order_query_run)){

                                $prod_ids=$data['products_ids'];
                                $ids=explode(" ",$prod_ids);

                                $prod_sizes=$data['products_sizes'];
                                $sizes=explode(" ",$prod_sizes);
                                

                                $prod_quantities=$data['products_quantities'];
                                $quants=explode(" ",$prod_quantities);
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td>
                                    <?php 

                                        //get the number of products
                                        $num = count($ids);

                                        //iterate through each product count
                                        for ($i = 0; $i < $num; $i++){
                                            
                                        $select_product="SELECT * FROM `products` WHERE `product_id`='$ids[$i]'";
                                        $select_product_run=mysqli_query($conn,$select_product);

                                        $fetch_products=mysqli_fetch_assoc($select_product_run);

                                        $product_name=$fetch_products['product_name'];
                                        $product_img=$fetch_products['product_image1'];

                                        echo "<div class='mb-2 ms-2'>";
                                        echo "<h6>$product_name</h6>";
                                        echo "<span class='d-flex '>";
                                                echo "<img src='$product_img' alt='pro_img' width='40px' height='50px' class='rounded'>";
                                                    echo "<span  class='ms-5 '>";
                                                        echo "<p style='font-size:11px;font-weight:600;'>Size: $sizes[$i]</p>";
                                                        echo "<p style='font-size:11px;font-weight:600;'>Qty: $quants[$i]</p>";
                                                echo "</span>";
                                            echo "</span>";
                                        echo "</div>";
                                    }                        
                                    ?>
                                </td>
                                <td style=" background-color: white !important;"></td>
                                <td></td>
                                <td><?php echo $data['total_products'];?></td>
                                <td><?php echo $data['amount_due'];?></td>
                                <td><?php echo $data['invoice_number'];?></td>
                                <td><?php echo $data['order_date'];?></td>
                                <td><?php echo $data['payment_mode'];?></td>
                                <td><?php echo $data['order_status'];?></td>
                            </tr>
                            <?php
                            }
                        }
                        else {
                            echo '<h4 class="text-center pt-5">NO ORDER PLACED TILL NOW</h4>';
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>     
<!-------foreach($ids as $i){
                                        $select_product="SELECT * FROM `products` WHERE `product_id`='$i'";
                                        $select_product_run=mysqli_query($conn,$select_product);

                                        $fetch_products=mysqli_fetch_assoc($select_product_run);

                                        $product_name=$fetch_products['product_name'];
                                        $product_img=$fetch_products['product_image1'];
                                        
                                        echo "<p>$product_name</p>";
                                        echo "<img src='images/$product_img' alt='pro_img'>";
                                    }      ---->