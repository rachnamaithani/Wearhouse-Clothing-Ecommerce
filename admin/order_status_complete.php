<!--------------UPDATE USER STATUS------- COMPLETE ---------------->
<?php
   include('../config/connection.php');
   
    $oid=$_GET['oid'];
    $order_status="complete";

    $update_order_status="UPDATE `users_orders` SET `order_status`='$order_status' WHERE `order_id`='$oid'";
    $update_order_status_run=mysqli_query($conn,$update_order_status);

    if($update_order_status_run)
    {
        ?>
        <script>
             alert("order status updated successfully")
              window.location.href="index2.php?admin_view_orders";      
          </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("failed to update order status")
              window.location.href="index2.php?admin_view_orders";     
          </script>
        <?php
    }
?>