<?php   
    session_start();
    include('../config/connection.php');

     $username=$_SESSION['username'];
?>

<!----------USER DASHBOARD------------>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
    <!---- <script>
            body{
                overflow: hidden;
            }
        </script>--------->
    </head>   
    <body>
        <!--------------SECTION 1--------------->
        <section>
            <div class="row">
                <!------------adding user side bar-------------->
                <?php require("user_side_navbar.php");?>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#ffd5ebd1;">
                    <div id="menu" style="height:138px;background-image: linear-gradient(to top, #9fffe7 0%, #02ccff 100%);background-repeat: no-repeat;">
                        <div class="pe-4 float-end">
                            <!-----------user image , name----------------->
                                <p class="" style="font-size: 20px;padding-top:60px"> <a href="#" class="text-dark text-decoration-none"><?php echo $username ?></a></p>
                        </div>
                    </div> 
                    <div class="text-center">
                        <div style="color:#679b5a;">
                            <!------------insert category page ----------------------->
                            <?php
                                if(isset($_GET['edituserprofile'])){
                                    include('edituserprofile.php');
                                }

                                //view orders page
                                else if(isset($_GET['view_orders'])){
                                    include('view_orders.php');
                                }

                                //update password page
                                else if(isset($_GET['updatepassword'])){
                                    include('user_password_change.php');
                                }

                                //delete account page
                                else if(isset($_GET['delete_acc'])){
                                    include('delete_account.php');
                                }   

                                // if no page is nav item is clicked then show this default
                                else{
                                    echo"<div style='font-size:100px;'>WELCOME TO USER PROFILE</div>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html> 