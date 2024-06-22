<!---------VIEW PRODUCT DETAILS --------------->
<?php
    session_start();
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

    //$_GET['id'] is giving error after submitting form so me save id in session variable
    $id=$_GET['id'];
    $_SESSION['id'] = $id;
    $pid=$_SESSION['id'];
    $show_select_product_details="SELECT * FROM `products` WHERE `product_id`= '$pid'";
    $show_select_product_details_run=mysqli_query($conn, $show_select_product_details);

    $fetch_product_data=mysqli_fetch_array($show_select_product_details_run);

    $_SESSION['pro_id']=$fetch_product_data['product_id'];
    $_SESSION['pro_price']=$fetch_product_data['product_price'];

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
        <title>view product</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!--------------------header section-------------------->
        <header class="header">
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
                        <a href="#" ><i class="fa fa-facebook me-2" style = "color:black"></i></a>
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
                                            echo '<ul class="list-group list-group-flush">';
                                            echo '<li class="list-group-item">
                                                <form method="get">
                                                    <input type="submit" name="logout_btn" value="Logout" style="background-color:white;border-bottom:none!important;">
                                                </form>
                                                    </li>';
                                            echo '</ul>';
                                            }

                                            //else show both login and logout btn
                                            else{
                                                echo '<ul class="list-group list-group-flush">';
                                                    echo '<li class="list-group-item"><a href="login.php">login</a></li>';
                                                    echo '<li class="list-group-item"><a href="register.php">Register</a></li>';
                                                echo '</ul>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="d-inline">
                                <i class="fa fa-heart-o  me-5" aria-hidden="true"  style="font-size:24px; color:black;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------nav bar container----------------------->
            <div class="container-fluid navndbanner">
                <div class="container-fluid navbar-container">
                    <nav class="ps-5 pt-3 pb-2 navbar navbar-expand-lg">
                        <!-------------------nav bar link name----------------------------->
                        <div class="ms-5 collapse navbar-collapse " id="navbarNav">
                            <ul class="ms-5 navbar-nav">
                                <li class="nav-item me-3 active main_menu_list">
                                    <a class="nav-link" href="#"><span class="text-dark me-1">WOMEN</span><i class="fa fa-angle-down " style="font-size:22px"></i></a>
                                    <!----------------------------sub nav list----------------------->
                                    <div class="container bg-white program_list border-top border-danger border-3" style="width: 340px;">
                                        <div class="row">
                                            <div class="col-5 navcol">
                                                <div class="h6 text-dark mt-4 ms-4"><h6>Western</h6></div>
                                                <ul class="text-dark">	
                                                    <?php 
                                                        //dropdown list of women western product category's name 
                                                        get_women_western_products();
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-7 text-right navcol">
                                                <div class="h6 text-dark mt-4 ms-4"><h6>Ethnic</h6></div>	
                                                <ul class="text-dark">
                                                    <?php 
                                                        //dropdown list of women ethnic product category's name 
                                                        get_women_ethnic_products();
                                                    ?>
                                                </ul>
                                            </div>	
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item me-3 main_menu_list">
                                    <!-------------------nav bar link name----------------------------->
                                    <a class="nav-link " href="#"><span class="text-dark me-1">MEN </span><i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                    <!----------------------------sub nav list----------------------->
                                    <div class="container bg-white  program_list border-top border-danger border-3"  style="width: 310px;">
                                        <div class="row bg-white">
                                            <div class="col-5 navcol">
                                                <div class="h6 text-dark ms-4 mt-4">formal</div>
                                                <ul class="text-dark">
                                                    <?php 
                                                        get_formal_men_products();
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-7 navcol">
                                                <div class="h6 text-dark ms-4 mt-4">Casual</div>	
                                                <ul class="text-dark">
                                                    <?php 
                                                        get_casual_men_products();
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item me-3 main_menu_list">
                                    <!-------------------nav bar link name----------------------------->
                                    <a class="nav-link " href="#"><span class="text-dark me-1">KID </span><i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                    <!----------------------------sub nav list----------------------->
                                    <div class="container bg-white program_list border-top border-danger border-3"  style="width: 370px;">
                                        <div class="row bg-white">
                                            <div class="col navcol">
                                                <div class="text-dark mt-4 ms-4">Girl</div>
                                                <ul class="text-dark">
                                                    <?php 
                                                        kid_girl_products();
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col navcol">
                                                <div class="text-dark mt-4 ms-4">Boy</div>	
                                                <ul class="bg-white text-dark">
                                                    <?php 
                                                        kid_boy_products();
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item me-3 main_menu_list">
                                    <!-------------------nav bar link  brand name----------------------------->
                                    <a class="nav-link " href="#">BRAND<i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                    <!----------------------------sub nav list----------------------->
                                    <div class="container bg-white program_list border-top border-danger border-3"  style="width: 230px;">
                                        <div class="row bg-white">
                                            <div class="col-12 navcol">
                                                <ul class="text-dark" >
                                                <!--------------fetching and displaying brand name from database------------------->
                                                    <?php
                                                    get_brand();
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!----------header end----------------------->

        <!----------------main starts------------------------->
        <main>
            <section>
                <div class="container-fluid flex-box d-flex">
                    <div class="row w-100">
                        <!--------------------product image gallery------------------------>
                        <div class="col-2 mt-4" style="width:125px;">
                            <div class="small-img mb-2 ms-3">
                                <img src="<?php echo $fetch_product_data['product_image1'] ?>" onclick="showImg(this.src);">                                         <!--------can use tab of bootstrap also to view different image on click---------->
                            </div>
                            <div class="small-img mb-2 ms-3">
                                <img src="<?php echo $fetch_product_data['product_image2'] ?>"  onclick="showImg(this.src);">
                            </div>
                            <div class="small-img ms-3">
                                <img src="<?php echo $fetch_product_data['product_image3'] ?>"  onclick="showImg(this.src);">
                            </div>
                        </div>
                        <!----------------------zoom image ------------------------>
                        <div class="col-5 mt-4 big-img" style="width:450px;">
                            <img src="<?php echo $fetch_product_data['product_image1'] ?>" >
                        </div>

                        <!----------------------product details (name,size,price,description)------------------------------->
                        <div class="col-5 mt-4 ms-5 product-info"> <!-------------style="overflow-y: scroll; max-height:550px;"------>
                            
                            <div class="url mb-3">Home > Product > <?php echo $fetch_product_data['product_name']?> </div>
                            <div class="h3 productname my-3"> <?php echo $fetch_product_data['product_name'] ?> </div>

                            <div class="price" style="font-size:20px;font-weight: 500;">₹<?php echo $fetch_product_data['product_price'] ?></div>
                            <div class="mb-4" style="font-size:12px; font-weight: 500;">Tax included.</div>
                            <!----------------sizes------------------>
                            <div class="d-flex align-items-center my-5">
                                <label class="h6" for="text">Sizes:</label>
                                <!--------FORM -------------->
                                <form method="get" class="d-flex">
                                    <input type="radio" class="btn-check" name="psize" value="S" id="option1" autocomplete="off">
                                    <label class="btn productsize" for="option1">S</label>

                                    <input type="radio" class="btn-check" name="psize"  value="M" id="option2" autocomplete="off">
                                    <label class="btn productsize" for="option2">M</label>

                                    <input type="radio" class="btn-check" name="psize"  value="L" id="option3" autocomplete="off">
                                    <label class="btn productsize" for="option3">L</label>

                                    <input type="radio" class="btn-check" name="psize"  value="XL" id="option4" autocomplete="off">
                                    <label class="btn productsize" for="option4">XL</label>

                                    <input type="radio" class="btn-check" name="psize"  value="XXL" id="option5" autocomplete="off">
                                    <label class="btn productsize" for="option5">XXL</label>
                                    
                                    <input type="radio" class="btn-check" name="psize"  value="3XL" id="option6" autocomplete="off">
                                    <label class="btn productsize" for="option6">3XL</label>
                                    
                                    <input type="radio" class="btn-check" name="psize"  value="4XL" id="option7" autocomplete="off">
                                    <label class="btn productsize" for="option7">4XL</label>
                            </div>
                            <!---------------quantity----------------->
                            <div class="quantity d-flex align-items-center mb-5  ">
                                <p class="h6 ">Quantity: &nbsp;</p>
                                <input class="form-control text-center h6" name="quantity" type="number" min="1" max="5" value="1">
                            </div>
                            <div class="d-flex justify-content-center mb-5">
                                <img src="../images/freeshipping.svg" alt="trustimg" height="60px">
                                <img src="../images/topquality.svg" alt="trustimg" height="60px">
                                <img src="../images/verifiedstore.svg" alt="trustimg" height="60px">
                            </div>
                            <!--------PRODUCT DESCRIPTION----------->
                            <div class="description">
                                <h6> Description:-</h6>
                                <p><?php echo $fetch_product_data['product_description']?></p>
                            </div>  
                            <!----------------------add to cart and place order buttons---------------->
                            <input type='hidden' name="id" value="<?php echo $fetch_product_data['product_id'] ?>">
                            <div class="btn-box">
                                <button type="submit" class="btn border btn-warning w-100 mb-4" name="addtocart"> Add to Cart</button>
                                <button type="submit" class="buy-btn btn border btn-success w-100 mb-4" name="buyitnow">Buy It Now</button>
                            </div>
                            </form>
                        
                        <?php

                            //PRODUCT IS ADDED TO CART ONLY IF THE USER IS LOGGED IN
                            $proid = $_SESSION['pro_id'];
                            $proprice= $_SESSION['pro_price'];

                            if(isset($_GET['addtocart'])){
                                
                                if(isset($_SESSION['username'])){

                                    if(!isset($_GET['psize'])){

                                        echo '<script type="text/javascript">';
                                        echo ' alert("select your size")'; 
                                        echo '</script>'; 
                                    }
                                    else{
                                        $username=$_SESSION['username'];
                                        specific_product_details($proid,$username,$proprice);
                                        }
                                }
                                else{
                                    echo '<script type="text/javascript">';
                                    echo ' alert(" first login")'; 
                                    echo '</script>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-----------------footer------------------->
        <footer class="header mt-5 pt-5">
            <div class="container">
                <div class="row position-relative">
                    <div class="col-3">
                        <p style="font-size: 40px;" class="fw-bold">Shop Non-Stop <br><span class="h1" style="font-size: 60px;">On</span></p><img src="../images/logo2555.png" height="80px" width="200px" class="foot-brand">
                        <p class="mt-5 h6">Subscribe to get special offers and once-in-a-lifetime deals.</p>
                        <form method="post">
                            <input type="email" name="user-email" class="foot-email w-100 mt-3 " placeholder=" enter your email">
                        </form>
                    </div>
                    <div class="col-2 p-5 foot-text">
                        <a href="#"><p class="ps-4">About Us</p></a>
                        <a href="#"><p class="ps-4">Contact Us</p></a>
                        <a href="#"><p class="ps-4">Blog</p></a>
                        <a href="#"><p class="ps-4"> Terms of Service</p></a>
                        <a href="#"><p class="ps-4"> Refund policy</p></a>
                        <a href="#"><p class="ps-4">Get in touch!</p></a>
                    </div>
                    <div class="col-3 p-5 foot-text">
                        <a href="#"><p> Shipping and Delivery Policy</p></a>
                        <a href="#"><p>Exchange and Refund Policy</p></a>
                        <a href="#"><p>FAQs</p></a>
                        <a href="#"><p>Privacy Policy</p></a>
                        <a href="#"><p>Term of Services</p></a>
                    </div>
                    <div class="col-4 p-5 foot-text">
                        <h4>Contact Us</h4>
                        <a href="#"><p>gano near GalaxyStar Private Limited,</p>
                        <p>CIN: U74900K94DDMSDFS2263</p>
                        <p>06-105-B, 06-102, (138 TBypass) Hanuman Gali,Clothing Store No. 78/9,Prince Chowk,Ghantaghar,Dehradun, India</p>
                    <p>E-mail address: query@meesho.com</p></a>
                    </div>
                </div>
                <div class="row text-center"> <p>© 2021-2023 wearstore.com</p></div>
            </div>
        </footer>
        <script>
            let bigImg = document.querySelector('.big-img img');
            function showImg(pic){
                bigImg.src=pic;
            }
        </script>
    </body>
</html>