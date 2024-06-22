<!---------------delete products from cart ------------------->
<?php
     include('../config/connection.php');

       $prod_no=$_GET['pno'];
        
        $delete_cart_product_details="DELETE FROM `cart_details` WHERE `p_id`='$prod_no'";
        $delete_cart_product_run=mysqli_query($conn,$delete_cart_product_details);
        
    if($delete_cart_product_run){
      ?>
         <script>
            alert("product deleted successfully");
            window.location.href="cart_table.php";      
         </script>
      <?php
      } 

      if($delete_cart_product_run){
      ?>
      <script>
           alert("failed to delete product");
          window.location.href="cart_table.php";      
      </script>   
      <?php
      } 
      ?>