<?php
    session_start();
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

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

<!-----HOME PAGE------------>
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
                    <a href="#" class="d-inline text-decoration-none pe-3 text-dark">Home</a>
                    <a href="aboutus.php" class="d-inline text-decoration-none pe-3 text-dark">About Us </a>
                    <a href="contactus.php" class="d-inline text-decoration-none text-dark">Contact Us</a>
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
                                        echo "<h6 class='position-absolute text-center' style='right:10px;'>$username</h6>";
                                    echo "</a>";
                                }

                                  //if user is not logged in
                                else{
                                    echo "<a href='#' class='d-inline'>";
                                    echo "<i class='fa fa-user-o me-5' aria-hidden='true'  style='font-size:24px; color:black;'></i>";
                                }
                             ?>

                            <!---------------User login and logout------------->
                            <div class="program_list rounded" style="right:0px;top:22px;">
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
            <!---------------nav bar container----------------------->
		<div class="container-fluid navndbanner">
			<div class="container-fluid navbar-container">
				<nav class="ps-5 pt-3 pb-2 navbar navbar-expand-lg">
		        <!-------------------nav bar link name----------------------------->
					<div class="ms-5">
						<ul class="ms-5 navbar-nav">
						    <li class="nav-item me-3 active main_menu_list">
							    <a class="nav-link" href="#">
                                    <span class="text-dark me-1">WOMEN</span>
                                    <i class="fa fa-angle-down " style="font-size:22px"></i>
                                </a>
		                         <!----------------------------sub nav list----------------------->
								<div class="container bg-white program_list border-top border-danger border-3" style="width: 340px;">
									<div class="row ">
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
                            <!-----------MENS'S PRODUCTS------------->
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link name----------------------------->
                                <a class="nav-link " href="#">
                                    <span class="text-dark me-1">MEN </span>
                                    <i class="fa fa-angle-down" style="font-size:22px"></i>
                                </a>
                                    <!----------------------------sub nav list----------------------->
                                <div class="container bg-white  program_list border-top border-danger border-3"  style="width: 310px;">
                                    <div class="row bg-white m-2">
                                        <div class="col-5 navcol">
                                            <div class="h6 text-dark ms-4 mt-4">formal</div>
                                            <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of men's formal product category's name 
                                                    get_formal_men_products();
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-7 navcol">
                                            <div class="h6 text-dark ms-4 mt-4">Casual</div>	
                                            <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of men's casual product category's name 
                                                    get_casual_men_products();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!------------------KIDS PRODUCTS --------------------->
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link name----------------------------->
                                <a class="nav-link " href="#"><span class="text-dark me-1">KID </span><i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                <!----------------------------sub nav list----------------------->
                                <div class="container bg-white program_list border-top border-danger border-3"  style="width: 370px;">
                                    <div class="row bg-white m-2">
                                        <div class="col navcol">
                                            <div class="text-dark mt-4 ms-4">Girl</div>
                                            <ul class="text-dark">
                                                <?php 
                                                    //dropdown list of girl child products category's name 
                                                    kid_girl_products();
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col navcol">
                                            <div class="text-dark mt-4 ms-4">Boy</div>	
                                            <ul class="bg-white text-dark">
                                                <?php 
                                                    //dropdown list of boy child products category's name
                                                    kid_boy_products();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item me-3 main_menu_list">
                                <!-------------------nav bar link  brand name----------------------------->
                                <a class="nav-link text-dark" href="#">BRAND<i class="fa fa-angle-down" style="font-size:22px"></i></a>
                                <!----------------------------sub nav list----------------------->
                                <div class="container bg-white program_list border-top border-danger border-3"  style="width: 230px;">
                                    <div class="row bg-white m-1">
                                        <div class="col-12 navcol">
                                            <ul class="text-dark" >
                                                <!--------------fetching and displaying brand name from database------------------->
                                                <?php
                                                    //dropdown list of brands name
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
    <!----------main start ---------------->
    <main>
        <?php

        //if specific brand is set then show that brand products
        if(isset($_GET['brand'])){
            show_specific_brand();
        }
        
        //if specific category is set then show that category products
        elseif(isset($_GET['category'])){
            show_specific_category();
        }

        //if searchbtn is true then show search keyword related products
        elseif(isset($_REQUEST['searchbtn'])){
            show_search_keywords();
        }
    
        else{
        ?>
        <!----------------------------section-1 ----------men, women, kids offers banner slider---------------------------->
        <section class="section-1">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/banner12.jpg" height="500px" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="../images/banner17.jpeg" height="500px" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="../images/banner155.jpeg" height="500px" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="../images/banner166.jpeg" height="500px" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="../images/banner144.jpeg" height="500px" width="100%">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        </section>
        <!----------------------------section-2 ---------categories section---------------------------->
        <section class="section-2">
        <div class="container mt-5">
            <div class="row">
                <!--------category title----------->
                <div class="col-md-12 mb-4 text-center">
                    <h1 class="mt-2">CATEGORIES</h1>
                </div>
            </div>
            <div class="row slider2" style="height:170px;">
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=womenwestern_top"><img src="../images/top11.webp" width="150px" height="150px" class=" category-img"></a><br>
                        tops
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=womenwestern_jeans"><img src="../images/womenjeans11.webp" width="150px" height="150px" class="category-img"></a><br>
                        women jeans
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=womenethnic_kurti"><img src="../images/ladykurti11.webp" width="150px" height="150px" class="category-img"></a><br>
                        kurti
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=womenethnic_skirt"><img src="../images/skirt11.webp" width="150px" height="150px" class="category-img"></a><br>
                        skirt
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=womenethnic_saree"><img src="../images/saree11.webp" width="150px" height="150px" class="category-img"></a><br>
                        saree
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=menformal_shirt"><img src="../images/menshirt21.jfif" width="150px" height="150px" class="category-img"></a><br>
                        Shirts
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=menformal_trouser"><img src="../images/menpant32.jpg" width="150px" height="150px" class="category-img"></a><br>
                        Trouser
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=mencasual_jeans"><img src="../images/menjeans11.jpg" width="150px" height="150px" class="category-img"></a><br>
                       men Jeans
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=girl_frock"><img src="../images/girlfrock1.jpg" width="150px" height="150px" class="category-img"></a><br>
                        girl Frock
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=girl_top"><img src="../images/girltop1.webp" width="150px" height="150px" class="category-img"></a><br>
                        girl Tops
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=girl_lehenga_choli"><img src="../images/girlethnic1.jpg" width="150px" height="150px" class="category-img"></a><br>
                       girl Lehenga Choli
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="mt-3 d-inline-block img-container text-center">
                        <a href="index.php?category=girl_jeans"><img src="../images/girljeans1.webp" width="150px" height="150px" class="category-img"></a><br>
                        girl Jeans
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=boy_jeans"><img src="../images/boyset13.jpg" width="150px" height="150px" class="category-img"></a><br>
                        boy Jenas
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="mt-3 d-inline-block img-container text-center">
                        <a href="index.php?category=boy_shirt"><img src="../images/boy12.jpg" width="150px" height="150px" class="category-img"></a><br>
                        boy Shirt
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="mt-3 d-inline-block img-container text-center">
                        <a href="index.php?category=boy_tshirt"><img src="../images/boytshirt2.jpg" width="150px" height="150px" class="category-img"></a><br>
                        boy Tees
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-inline-block img-container text-center">
                        <a href="index.php?category=boy_kurta_pajama"><img src="../images/boykurtapajama1.jpg" width="150px" height="150px" class="category-img"></a><br>
                        kurta Pajama
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!----------------------------section-3 ----------new Arrival slider section ---------------------------->
        <section class="section-3">
        <div class="container-fluid p-4 mt-5">
            <div class="row"> 
                <div class="col-md-12  mb-4 text-center">
                    <h1>New Arrival</h1>
                </div>
            </div>
            <div class="row">
                <?php
                 getwomentlatest();
                 getmenlatest();
                 ?>
            </div>
        </div>
        </section>
        <!----------------------------section-4 ----------Trending section slider---------------------------->
        <section class="section-4">
        <div class="container-fluid p-4">
            <div class="row"> 
                <div class="col-md-12  mb-4 text-center">
                    <h1>Trending</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-3 text-center">
                    <a href="view_product_details.php?id=40">
                    <img src="../images/bluemenshirt1.jpg" height="450px" width="100%">
                    <p class="h5 mt-3">Dasto Check Shirt</p>
                    <h6>₹500</h6>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="view_product_details.php?id=62">
                    <img src="../images/boy11.jpg" height="450px" width="100%">
                    <p class="h5 mt-3">Boys Bear Printed Casual Shirt with Pant</p>
                    <h6>₹599</h6>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="view_product_details.php?id=34">
                    <img src="../images/top31.webp" height="450px" width="100%">
                    <p class="h5 mt-3">Facny Ribbon Shirt</p>
                    <h6>₹500</h6>
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="view_product_details.php?id=13">
                        <img src="../images/ladykurti31.webp" height="450px" width="100%">
                       <p>LadyRock Badhani Kurta</p>
                       <h6><br>₹1,300</h6>
                    </a>
                </div>
            </div>
        </div>
        </section>
        <!----------------------------section-5 ----------Testimonials section ---------------------------->
        <section class="section-5">
        <div class="container-fluid p-4">
            <div class="row"> 
                <div class="col-md-12  mb-4 text-center">
                    <h1>What our customers say</h1>
                </div>
            </div>
            <div class="row p-4 slider1" style="height:400px;">
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light ">
                        <div class="photo_container">
							<span><img src="../images/authorimg1.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Mitali Shah</span>
							<span class="user-location">Ahemdabad, Gujarat</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star-half-o" style="color:#f7be27;"></i>
                            </div>
						</div>
                        <div class="card-body card_content_box">
                            <p class="card-text card_para">Wonderful fitting &amp; lovely fabric of NoorKurti Set! Thank you so much. This is my first purchase but definitely not the last!.</p>
                        </div>
                      </div>
                </div>
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light  ">
                        <div class="photo_container">
							<span><img src="../images/authorimg3.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Sachin maheswari</span>
							<span class="user-location">Pune, Maharastra</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                            </div>
						</div>
                        <div class="card-body card_content_box">
                          <p class="card-text card_para">Hey, I ordered Red Chanderi kurta for my friends engagement! It is really very Beautiful!.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light ">
                        <div class="photo_container ">
							<span><img src="../images/authorimg2.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Kanchan rajput</span>
							<span class="user-location">Kanpur, Uttarpradesh</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i>
                                <i class="fa fa-star-half-o" style="color:#f7be27;"></i>
                            </div>
						</div>
                        <div class="card-body card_content_box">
                          <p class="card-text card_para">I ordered saree for my mother-in-law and she loved its fabric and gold jari work . Thank you wearshop for making this diwali special for my mother-in-law. Surely will purchase more cloths.</p>
                        </div>
                    </div>                    
                </div>
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light  ">
                        <div class="photo_container">
							<span><img src="../images/authorimg6.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Rachna Maithani</span>
							<span class="user-location">Pune, Maharastra</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star-half-o" style="color:#f7be27;"></i>
                            </div>
						</div>
                        <div class="card-body card_content_box">
                          <p class="card-text card_para">I have bought frock and lehenga set for my niece from wearhouse. love the quality and price of both. definitely gonna buy something for me also </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light  ">
                        <div class="photo_container">
							<span><img src="../images/authorimg5.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Anshul Rai</span>
							<span class="user-location">Patna, Bihar</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                            </div>
						</div>
                        <div class="card-body card_content_box">
                          <p class="card-text card_para">thank you wearhouse for such a good services of jeans.quality is so good .</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 m-3">
                    <div class="card card_container p-3 border border-light">
                        <div class="photo_container">
							<span><img src="../images/authorimg4.jpg" alt="user_image" height="60px" class="user_photo"><span>
							<span class="user_name">Mohd Faraz</span>
							<span class="user-location">Dehradun, Uttarakhand</span>
                            <div class="review-star" style="padding-left: 65px;">
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                                <i class="fa fa-star" style="color:#f7be27;"></i> 
                            </div>
						</div>
                        <div class="card-body card_content_box">
                          <p class="card-text card_para">I have recieved my dress in 3 days after placing order and quality of product is very nice.delivery service is very fast. love the product. thank you wearhouse </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!----------------------------section-6-----------------Brands section----------------------->
        <section class="section-6">
        <div class="container mt-3 ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>BRANDS</h1>
                </div>
            </div>
            <div class="row p-2 slider" style="height:170px;">
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-13.jfif" width="150px" height="150px" class=" category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-14.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-15.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-16.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-17.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-18.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-21.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-22.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-inline-block img-container text-center">
                            <a href="#"><img src="../images/brand-23.jfif" width="150px" height="150px" class="category-img"></a><br>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            </section>
            <!--------------------------------Trust banner ----------------------------->
            <section class="section-7">
                <div class="container-fluid">
                    <div class="row">
                        <img src="../images/trustbanner.webp" alt="trustbanner" height="180px">
                    </div>
                </div>
            </section>
    </main>
    <!--------------ending of main section-------------------->

    <!----------------footer section start--------------------->
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
                    <a href="aboutus.php"><p class="ps-4">About Us</p></a>
                    <a href="contactus.php"><p class="ps-4">Contact Us</p></a>
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
    <!-----------------------slick slider js ------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //slider of brand section-6
        $('.slider').slick({
        dots: false,
        infinite: true,
        speed: 400,
        slidesToShow: 6,
        autoplay: true,
        arrows:false,
        autoplaySpeed: 2500,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
        });
        //slider of testimonials section-5
        $('.slider1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        draggable: true,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
        });
        //slider of categories section in circle section-2
        $('.slider2').slick({
        dots: false,
        infinite: true,
        speed: 700,
        slidesToShow: 8,
        arrows:false,
        draggable: true,
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
        });
    </script>
</body>
</html>