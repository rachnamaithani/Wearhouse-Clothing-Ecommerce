<!------------USER LOGIN---------------->
<?php
    session_start();
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

    if(isset($_REQUEST['my_submit'])){
	
        $email=(mysqli_real_escape_string($conn,$_POST['email']));												
        $password=md5(mysqli_real_escape_string($conn,$_POST['password']));	

        $select= "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";
        $query_run = mysqli_query($conn, $select);
   
       $fetch = mysqli_fetch_array($query_run);

       //creating session variable(username)
       if($fetch){
           $_SESSION['username'] = $fetch['username'];														
       }
   
        if(mysqli_num_rows($query_run)==1)													
        {
            echo '<script type="text/javascript">';
            echo ' alert("login successfully!")'; 
            echo '</script>';
            header('location:index.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/style.css" rel="stylesheet">
    <title>Shop Now! Wearhouse</title>
</head>
<body class="header">
    <!--------------------header section-------------------->
    <header>
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
                    <a href="#" class="d-inline text-decoration-none pe-3 text-dark">About Us </a>
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
                            <i class="position-relative fa fa-shopping-cart me-3" aria-hidden="true" style="font-size:24px; color:black;">
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
                             <a href="#" class="d-inline"><i class="fa fa-user-o me-3" aria-hidden="true"  style="font-size:24px; color:black;"></i></a>
                             <div class="program_list" style="right:-40px;">
                                <div class="text-center " style="width: 10rem;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="register.php">Register</a></li>
                                    </ul>
                                </div>
                             </div>
                        </div>
                        <a href="#" class="d-inline"><i class="fa fa-heart-o  me-3" aria-hidden="true"  style="font-size:24px; color:black;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header> 
    <!------------main start ------------->
    <main>
        <!---------------section 1--------------> 
        <section>
            <div class="container py-2 text-dark">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-5" style="padding:0px;">
                        <div class="card " style="background-color:#ffbed8;">
                            <div class="card-body p-4">
                                <div class="mb-5 mt-2 text-center">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login Form</h2>
                                    <p class="text-dark-50 mb-5">Enter your email and password!</p>
                                </div>
                                <!--------------login form --------------------->
                                <form method="post">
                                    <div class="form-outline form-white mb-4">
                                        <label class="mb-3" for="Email">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="mb-3" for="Password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="my_submit">Login</button>
                                        <p class="mt-3">Don't have an account? <a href="register.php" class="h6 fw-bold">Sign up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>