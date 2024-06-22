<!--------------UPDATE PRODUCT DETAILS------------------>
<?php

     include('../config/connection.php');

     echo $pro_no = $_GET['update_prod_id'];
     echo $pro_size = $_GET['prod_size'];
     echo $pro_quantity = $_GET['prod_quantity'];
     echo $pro_price = $_GET['prod_price'];
     $total_price = (int)$pro_price*(int)$pro_quantity;

      echo $update_cart_product_details = "UPDATE `cart_details` SET `size`='$pro_size' , `quantity`='$pro_quantity' , `total_amount`='$total_price' WHERE `product_id`='$pro_no'";
      $update_cart_product_details_run = mysqli_query($conn,$update_cart_product_details);
      
      if($update_cart_product_details_run){
               
          echo '<script type="text/javascript">';
          echo ' alert("product updated successfully")'; 
         // echo 'window.location.href="cart_table.php"';
          echo '</script>';                        
       }
       else{
          echo '<script type="text/javascript">';
          echo ' alert("failed to update product details")'; 
          echo '</script>';  
          
       }
       
          //header('location:cart_table.php '); 
?> 