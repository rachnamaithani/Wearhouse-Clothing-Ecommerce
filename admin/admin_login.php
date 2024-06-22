<?php

    session_start();
    include('../config/connection.php');

    //login button is set true then execute this
    if(isset($_REQUEST['my_submit'])){
	
        $email=(mysqli_real_escape_string($conn,$_POST['admin_email']));												
        $password=md5(mysqli_real_escape_string($conn,$_POST['admin_password']));

       $select= "SELECT * FROM `admin` WHERE `admin_email` = '$email' AND `admin_password` = '$password' ";
   
       $query_run = mysqli_query($conn, $select);
   
       $fetch = mysqli_fetch_array($query_run);

       //creating the session variable ---->admin_username
       if($fetch){
           $_SESSION['admin_username'] = $fetch['admin_username'];														
       }
   
        if(mysqli_num_rows($query_run)==1)													
        {
            echo '<script type="text/javascript">';
            echo ' alert("login successfully!")'; 
            echo '</script>';
            header('location:index2.php');
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("username or password is incorrect!")'; 
            echo '</script>';
        }
       
    }    	
?>


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
    <title>Admin Login</title>
</head>
<body style="background-image:url(../images/backgroundimg.png);position-relative">
    <div class="container w-75 position-absolute" style="left:20%;top:20%;">
        <div class="row">
        <!------------demo image-------------------->
            <div class="col-5" style="padding:0px;">
                <img src="../images/adminimg5.jfif" width="500px" style="border-radius:60px 0px 0px 60px;">
            </div>
            <div class="col-5" style="padding:0px;box-shadow: 10px 10px 30px #d8dcd5 ;background-color:#c4ddff;border-radius:0px 60px 60px 0px;">
                <div class="text-center mt-5">
                    <h2 class="fw-bold mb-2 text-uppercase ">Admin Login</h2>
                    <p class="text-dark-50 mb-5">Enter your email and password!</p>
                </div>
                <!--------------------login form ------------------------>
                <form method="post" class="ms-5 ps-5">  
                    <div class="form-outline form-white mb-5">
                <!------------enter username input field------------------>
                        <input type="text" name="admin_email" class="form-control form-control-lg w-75" placeholder="Email">
                    </div>
                    <div class="form-outline form-white mb-5">
                <!------------enter password input field------------------>
                        <input type="password" name="admin_password" class="form-control form-control-lg w-75" placeholder="password">
                    </div>
                    <div class="ms-5 ps-3">
                <!---------------log in button------------------------->
                        <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="my_submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>