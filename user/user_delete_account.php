<?php
    session_start();
    include("../config/connection.php");

    $username=$_SESSION['username'];

    if(isset($_REQUEST['yes_delete'])){

            /*$fetch_user_id="SELECT `id` FROM `users` WHERE `username`='$username'";
            $fetch_user_id_query=mysqli_query($conn,$fetch_user_id);

            $fetch=mysqli_fetch_assoc($fetch_user_id_query);
            $user_id=$fetch=['id'];

            $delete_user_all_orders"DELETE FROM `users_orders` WHERE `user_id`='$user_id'";
            $delete_user_all_orders_query_run=mysqli_query($conn,$delete_user_all_orders);*/

            $delete_acc="DELETE FROM `users` WHERE `username`='$username'";
            $delete_acc_query_run=mysqli_query($conn,$delete_acc);

            if($delete_acc_query_run){
                session_unset();
                session_destroy();
                ?>
                <script>
                    alert("account deleted successfully");
                    window.location.href="index.php";      
                </script>
                <?php
            }
            else{
                echo '<script type="text/javascript">';              
                echo ' alert("failed to delete account .......try agian")'; 
                echo '</script>';
            }
        }

?>
<!----------DELETE USER ACCOUNT---------------->
<div class="row"  style="background-image: linear-gradient(-20deg, #6e45e2 0%, #88d3ce 100%);">
    <!-------------adding sidenavbar------------->
    <?php require("user_side_navbar.php");?>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 position-relative" style="padding:0;background-color:#d2f9ffd1;">
        <div id="menu" style="height:138px;background-image: linear-gradient(to top, #9fffe7 0%, #02ccff 100%);background-repeat: no-repeat;">
            <div class="w-25 float-end">
                <p class="pull-right me-4" style="font-size: 18px;padding-top:55px"><a href="index.php" class="text-dark text-decoration-none">Continue Shopping</a></p>
            </div>
        </div> 
        <div class="card position-absolute w-50 text-center m-4" style="left:20%;top: 35%;  background: linear-gradient(to right, #e15353, #ff9ab3);">
            <div class="card-body">
                <h4 class="card-title h1" >DELETE ACCOUNT</h4>
                <!-------------delete form------------->
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="confirm_delete" class="mt-3 h6">Do you want to delete your account?</label><br>
                            <button type="submit" class="btn btn-success mt-4 p-3 w-50 " name="yes_delete">YES, DELETE IT</button><br>
                           <button type="submit" class="btn btn-danger mt-4 p-3 w-50 " name="no_delete">NO</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
