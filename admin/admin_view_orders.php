<!--------------view all orders of users--------------->
<?php
    include('../config/connection.php');
?>
    <div>
        <h1 class="mainheading text-center mt-4">ALL ORDERS</h1>
        <hr>
        <div class="p-4">
            <!----------view product table start here--------------->
            <table class="table">
                <thead>
                    <tr class="view_row">
                        <th scope="col">S NO.</th>
                        <th scope="col" colspan="3" >Products Name</th>
                        <th scope="col">Total Products</th>
                        <th scope="col">Amount Due</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Payment Decision</th>
                        <th scope="col">Payment Status</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php

                        //fetching users orders information (product id, product size, product quantities)
                        $j=1;
                        $select_user_orders="SELECT * FROM `users_orders` ORDER BY `order_id` DESC";
                        $select_user_order_query_run=mysqli_query($conn,$select_user_orders);

                        while($data=mysqli_fetch_assoc($select_user_order_query_run)){  

                            $prod_ids=$data['products_ids'];
                            $ids=explode(" ",$prod_ids);

                            $prod_sizes=$data['products_sizes'];
                            $sizes=explode(" ",$prod_sizes);
                                                
                            $prod_quantities=$data['products_quantities'];
                            $quants=explode(" ",$prod_quantities);
                            $order_id=$data['order_id'];

                    ?>
                    <tr class="view_row">
                        <td><?php echo $j++;?></td>
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

                                    //show product name, img, size and quantities
                                    echo "<div class='m-2'>";
                                        echo "<h6 class='text-start'>$product_name</h6>";
                                        echo "<span class='d-flex '>";
                                                echo "<img src='$product_img' alt='pro_img' width='40px' height='40px' class='rounded'>";
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
                        <td style="border:1px solid black;"><?php echo $data['payment_mode'];?></td>

                        <!----------admin take decision of order complete or pending-------------->
                        <td class="text-center">
                            <a href="order_status_pending.php?oid=<?php echo $order_id;?>" class="btn btn-warning m-3">pending</a>
                            <a href="order_status_complete.php?oid=<?php echo $order_id;?>" class="btn btn-success">complete</a>
                        </td>
                           
                        <?php
                            $status=$data['order_status'];
                            echo "<td> $status</td>";
                            echo "</tr>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>