<?php
    session_start();
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

    //save user message ,name, email
    if(isset($_POST['msg_submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $msg=$_POST['content'];
        
        $insert_msg="INSERT INTO `contactus` (`name`,`email`,`msg`) VALUES ('$name','$email','$msg')";
        $insert_msg_run=mysqli_query($conn,$insert_msg);

        if($insert_msg_run){
            echo '<script type="text/javascript">';
            echo ' alert("your message sent successfully!")'; 
            echo '</script>';
            header('refresh:5;location:contactus.php');
        }
    }

    //if logout button is clicked then end the session and redirect to index.php
    if(isset($_REQUEST['logout_btn'])){
        session_unset();
        session_destroy();
        ?>
        <script>
              alert("logout successfully");
              window.location.href="index.php";      
          </script>
        <?php
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
    <title>Wearhouse: Contact Us</title>
</head>
<body>
    <!--------------------header section-------------------->
    <header class="header" style="height:210px;">
        <div class="container-fluid">
            <!-----------------top banner--------------------->
            <div class="row">
                <div class="col bg-dark text-center text-white pt-2">
                    <p>BUY 2 and GET 30% OFF | USE CODE: FESTIVE10</p>
                </div>
            </div>
            <!-------------about us & contact us section----------->
            <div class="row p-2">
                <div class="col-6">
                    <a href="index.php" class="d-inline text-decoration-none pe-3 text-dark">Home</a>
                    <a href="aboutus.php" class="d-inline text-decoration-none pe-3 text-dark">About Us </a>
                    <a href="#" class="d-inline text-decoration-none text-dark">Contact Us</a>
                </div>
                <div class="col-6 mb-3 d-inline text-end">
                    <a href="index.php" ><i class="fa fa-facebook me-2" style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-twitter me-2"  style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-instagram me-2"  style = "color:black"></i></a>
                    <a href="#" ><i class="fa fa-youtube me-2" style = "color:black"></i></a>		
                </div>
            </div>
        </div>
        <!--------------brand logo ,search btn and login icon ----------------->
        <div class="container-fluid">
            <div class="row">
                <!-----------brand logo Wearhouse------------>
                <div class="col-3">
                     <img src="../images/logo2555.png" height="90px" class="ps-5 ms-3">
                </div>
                <!----------search bar ------------------>
                <div class="col-6"> 
                    <form method="post">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control rounded " name="searchbar" placeholder="Search">
                            <button type="submit" class="btn btn-outline-success"  name="searchbtn" >search</button>
                        </div>
                    </form>
                </div>
                <!----------------cart icon----------redirect to cart table ------------>
                <div class="col-3 text-end">
                    <div class="mt-3">
                        <a href="cart_table.php" class="d-inline">
                            <i class="position-relative fa fa-shopping-cart me-5" aria-hidden="true" style="font-size:24px; color:black;">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:9px;">
                                
                                <?php  

                                    //if user has logged in
                                    if(isset($_SESSION['username'])){
                                        $user=$_SESSION['username'];
                                        cart_total_products($user);
                                    }
                                    //if user has not logged in
                                    else{
                                        cart_total_products_guest();   
                                    }
                                 ?>
                                </span>
                            </i>
                        </a>
                        <!--------------------User Login , User Logout ,User Profile ------------------------->
                        <div class="main_menu_list d-inline position-relative">
                            
                            <?php 

                            //if user is logged in then on click redirect to user dashboard page
                                if(isset($_SESSION['username'])){

                                    echo "<a href='userprofile.php' class='d-inline'>";
                                        echo "<i class='fa fa-user-o me-5' aria-hidden='true'  style='font-size:24px; color:black;'></i>";
                                        
                                         //displaying username 
                                        $username=$_SESSION['username'];
                                        echo "<h6 class='position-absolute text-center' style='right:15px;'>$username</h6>";
                                    echo "</a>";
                                }

                                  //if user is not logged in
                                else{
                                    echo "<a href='#' class='d-inline'>";
                                    echo "<i class='fa fa-user-o me-5' aria-hidden='true'  style='font-size:24px; color:black;'></i>";
                                }
                             ?>

                            <!---------------User login and logout------------->
                            <div class="program_list rounded" style="right:0px;top:28px;">
                                <div class="text-center " style="width: 7rem;">
                                    <?php 

                                        //if user is logged in then show logout btn
                                        if(isset($_SESSION['username'])){
                                        echo "<ul class='list-group list-group-flush'>";
                                        echo "<li class='list-group-item'>";
                                                echo "<form method='get'>";
                                                    echo "<input type='submit' name='logout_btn' value='Logout' style='background-color:white;border-bottom:none!important;'></input>";
                                                echo "</form>";
                                        echo "</li>";
                                        echo "</ul>";
                                        }

                                        //else show both login and logout btn
                                        else{
                                            echo "<ul class='list-group list-group-flush'>";
                                        echo "<li class='list-group-item'><a href='login.php'>login</a></li>";
                                        echo "<li class='list-group-item'><a href='register.php'>Register</a></li>";
                                        echo "</ul>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-----------------Saved for later items ------------------>
                        <a href="#" class="d-inline"><i class="fa fa-heart-o  me-5" aria-hidden="true"  style="font-size:24px; color:black;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!------------feedback form-------------------------->
        <div class="container-fluid" id="contactus" >
            <div class="row text-center pt-3">
                <h1 class="mb-3">Get in Touch</h1> 
                <p> Inspired By Feedback, Driven to Delight.</p>
            </div>
            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-4">
                    <img src="../images/contactusimg1.jfif" alt="" width="450px">
                </div>
                <div class="col-4">
                    <form method="post">
                        <div class="form-outline form-white mb-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm">
                        </div>
                        <div class="form-outline form-white mb-4">
                            <label for="Email">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm">
                        </div>
                        <div class="form-outline form-white mb-4">
                            <label for="msg">Message</label>
                            <textarea rows="5" cols="65" name="content" required></textarea>
                        </div>
                        <div>
                            <button class="btn btn-outline-dark btn-success text-light btn-sm px-5" type="submit" name="msg_submit">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>