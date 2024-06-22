<!----------USER SIDE NAV BAR------------------>
<?php

    //fetch user data 
    $select_user="SELECT * FROM `users` where `username`='$username'";
    $select_user_query_run=mysqli_query($conn,$select_user);
    $user_data=mysqli_fetch_array($select_user_query_run);

    //save user img in image variable
    $image=$user_data['user_img'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
        ul li:hover{
                background-color: #34a8ff;
            }
            body{
                overflow-x: hidden;
            }
        </style>    
    </head>   
    <body> 
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"  id="topbar" style="padding:0;height:46.1rem;background-image: linear-gradient(to top, #80ffb5  0%, #17bfc9 100%);background-repeat: no-repeat;">
            <div class="row">
                <!----------user image-------------->
                <div class="col-3 text-center mb-3 p-4 w-100" style="background-image: linear-gradient(to top, #ffd3d3 0%, #f7c5ff 100%);background-repeat: no-repeat;">
                    <img src="../images/logo2555.png" height="90px" class="ps-4">
                </div>
            </div>
            <!-------------username, online status--------------->
            <div class="ms-3 text-center">
                <img src="<?php echo $image ?>" height="120px" class="ms-2 rounded-circle" alt="adminimg">
                <div class="h5 ms-3 text-light"><?php echo $username ?></div>
            </div>
            <div class=" text-light text-center" style="font-size: 14px"><i class="fa fa-circle ms-3" style="font-size:8px;color:#30f330"></i> Online</div>
                <!---------nav bar------------>
                <nav class="navbar mt-3 ms-3">
                    <div class="container-fluid ms-3 mt-3">
                        <div class="navbar-header w-100">
                            <ul class="nav navbar-nav w-100">
                                <li class="pb-4">
                                    <a href="userprofile.php" class="h6 text-decoration-none waves-effect text-light waves-light"><i class="fa fa-briefcase"></i> Dashborard</a>
                                </li>  
                                <li class="pb-4">
                                    <a href="./edituserprofile.php?edituserprofile" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-edit"></i> Edit Profile</a>
                                </li>
                                <li class="pb-4">
                                    <a href="user_password_change.php?updatepassword" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="material-icons"></i> Update Password</a>
                                </li>
                                <li class="pb-4">
                                    <a href="./view_orders.php?view_orders" class="h6 text-decoration-none waves-effect waves-light text-light" name="viewproduct"><i class="material-icons"></i> My Orders</a>
                                </li> 
                                <li class="pb-4">
                                    <a href="./user_delete_account.php?delete_acc" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-eye" aria-hidden="true"></i></i> Delete Account</a>
                                </li>
                                <li class="pb-4">
                                    <a href="./userlogout.php" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-pencil" aria-hidden="true"></i> Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
<!------</div>----------->
    </body>
</html>

