<?php
    session_start();
    include("../config/connection.php");

    //saving username in username variable
    $username=$_SESSION['username'];

    if(isset($_REQUEST['submit_btn'])){

        $current_password=trim(md5(mysqli_real_escape_string($conn,$_POST['current_password'])));
        $new_password=trim(md5(mysqli_real_escape_string($conn,$_POST['new_password'])));
        $confirm_password=trim(md5(mysqli_real_escape_string($conn,$_POST['confirm_password'])));
        
        $select_current_password="SELECT `password` FROM `users` where `username`='$username'";
        $select_current_password_run_query=mysqli_query($conn,$select_current_password);

        $fetch_password=mysqli_fetch_assoc($select_current_password_run_query);

        //checking current password matches with previous password
        if($current_password==$fetch_password['password']){

        //checking new password matches with confirm password
            if($new_password==$confirm_password){

                //update query to update user password
                $update_password="UPDATE `users` SET `password`='$new_password' where `username`='$username'";
                $update_password_query_run=mysqli_query($conn,$update_password);

                if( $update_password_query_run){
                    echo '<script type="text/javascript">';
                    echo ' alert("password changes successfully")'; 
                    echo '</script>';
                }
                else{
                    echo '<script type="text/javascript">';              
                    echo ' alert("failed to update password .......try agian")'; 
                    echo '</script>';
                }

                }
            else{
                echo '<script type="text/javascript">';              
                echo ' alert("password doesn\'nt matches!")'; 
                echo '</script>';
            }
        }
        else{
                echo '<script type="text/javascript">';              
                echo ' alert("password doesn\'nt matches!")'; 
                echo '</script>';
        }
    }

?>
    
<div class="row"  style="background-image: linear-gradient(-20deg, #6e45e2 0%, #88d3ce 100%);">
    <?php require("user_side_navbar.php");?>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 position-relative" style="padding:0;background-color:#d2f9ffd1;">
        <div id="menu" style="height:138px;background-image: linear-gradient(to top, #9fffe7 0%, #02ccff 100%);background-repeat: no-repeat;">
            <div class="w-25 float-end">
                <p class="pull-right me-4" style="font-size: 18px;padding-top:55px"><a href="index.php" class="text-dark text-decoration-none">Continue Shopping</a></p>
            </div>
        </div> 
        <div class="card position-absolute w-50 m-4" style="left:5%;top: 20%;  background: linear-gradient(to right, #cecdff, #ffcbd8);">
            <div class="card-body">
                <h4 class="card-title" >Change Password</h4>
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="current_pass" class="mt-3">Current Password</label>
                            <input type="password" class="form-control p-3" name="current_password">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="new_pass" class="mt-3">New password</label>
                            <input type="password" class="form-control p-3" name="new_password" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="confirm_pass" class="mt-3">Confirm password</label>
                            <input type="password" class="form-control p-3" name="confirm_password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 p-3 " name="submit_btn">Update password</button>
                </form>
            </div>
        </div> 
    </div>
</div>
