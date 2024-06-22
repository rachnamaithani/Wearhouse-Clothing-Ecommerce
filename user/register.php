<!-------------------REGISTER USER FORM --------------------
1)phone no valid and only 10 no. enter 
2)empty fiels show error and non empty field show entered data --->
<?php
    include('../config/connection.php');
    include('../allfunctions/commonfunction.php');

    if(isset($_REQUEST['submit_btn'])){   
        
        //rand() is to generate random number
        $random_num=rand(1000,9999);

        //fetch form data
        $user = trim(mysqli_real_escape_string($conn,$_POST['username']));
        $username =  trim(mysqli_real_escape_string($conn,($user.'_'.$random_num)));
        $email =  trim(mysqli_real_escape_string($conn,$_POST['email']));

        $filename=$_FILES['user_file']['name'];
        $tempname=$_FILES['user_file']['tmp_name'];
        $tempname2 = explode(".",$filename);
        $newfile = $user. '.' .end($tempname2);
        $folder = "../userimages/".$newfile;
        //$f1="userimages/$newfile";
        move_uploaded_file($tempname, $folder);

        $dateofbirth = trim(mysqli_real_escape_string($conn, $_POST['dateofbirth']));
        $phoneno =  trim(mysqli_real_escape_string($conn,$_POST['phoneno']));

        $gender =  trim(mysqli_real_escape_string($conn,$_POST['gender']));
        $zipcode =  trim(mysqli_real_escape_string($conn,$_POST['zipcode']));
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $state =  trim(mysqli_real_escape_string($conn,$_POST['state']));
        $city =  trim(mysqli_real_escape_string($conn,$_POST['city']));
        $password = trim(md5(mysqli_real_escape_string($conn, $_POST['password'])));
        $confirm_password = trim(md5(mysqli_real_escape_string($conn, $_POST['confirm_password'])));

        //making sure that only unique email is entered by user 
        $select_email="SELECT `email` from `users` where `email`='$email'";
        $select_email_query_run = mysqli_query($conn,$select_email);

        if(mysqli_num_rows($select_email_query_run) == 1){
            echo '<script type="text/javascript">';
            echo ' alert("please enter different email address!")'; 
            echo '</script>';
            header( "refresh:5;url=location:register.php" );
        }
            //codition for required field so that required fields should not be save empty in db
            if(empty($username) || empty($email) || empty($phoneno)  || empty($address) || empty($password) ||   empty($gender)){      
                    echo '<script type="text/javascript">';
                    echo ' alert("please enter all the required fields!")'; 
                    echo '</script>';
                    header('refresh:5;url=location:register.php');
            }

            // to ensure password matches with confirm_password field 
            else if ($password==$confirm_password) {  

                //insert user information in db
                $insert_user_data = "INSERT INTO `users`(`username`,`email`,`dateofbirth`,`phoneno`,`user_img`,`gender`,`state`,`city`,`zipcode`,`address`,`password`) 
                VALUES ('$username', '$email','$dateofbirth', '$phoneno','$folder','$gender','$state','$city','$zipcode','$address','$password')";
                
                $run = mysqli_query($conn, $insert_user_data);                    // run insert query

                if($run){  
                    ?>
                    <script>
                        alert("registered successfully"); 
                        header('refresh:10;url=location:login.php');    
                    </script>
    <?php
                }
                else{
                    echo '<script type="text/javascript">';
                    echo ' alert("failed to register ....try again")'; 
                    echo '</script>';
                }
            }
            else{
                echo " password doesn't match!";
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
                                     <?php  cart_total_products_guest(); ?>
                                </span>
                            </i>
                        </a>
                         <!---------------User login------------->
                        <div class="main_menu_list d-inline position-relative">
                             <a href="#" class="d-inline"><i class="fa fa-user-o me-3" aria-hidden="true"  style="font-size:24px; color:black;"></i></a>
                             <div class="program_list" style="right:-40px;">
                                <div class="text-center " style="width: 10rem;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="login.php">login</a></li>
                                    </ul>
                                </div>
                             </div>
                        </div>
                        <!-----------------Saved for later items ------------------>
                        <a href="#" class="d-inline"><i class="fa fa-heart-o  me-3" aria-hidden="true"  style="font-size:24px; color:black;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header> 
    <!-----------main start----------->
    <main>
        <div class="container-fluid ">
            <div class="row mt-4">
                <!-----------register title-------------->
                <div class="col-md-8 m-auto">
                    <div class="card mb-5">
                        <div class="card-header  position-relative">
                            <img src="../images/registerbg.jfif"  width="100%" height="200px" alt="register_img">
                            <div class="d-inline-block w-50 position-absolute" style="top:30%;left:45%;">
                                <h2>Register Now!</h2>
                                <h6>We would love to be in touch with you</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title mb-5 mt-3 ms-5"><i>Required Field are followed by *</i></h6>
                            <!-----------register form ---------------->
                            <form method="post" class="ps-5 pe-5" enctype="multipart/form-data">
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-12 ">
                                        <label for="firstname">Name:*</label>
                                        <input type="text" class="form-control p-3" name="username" placeholder="First name">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-12">
                                            <label for="email">Email:*</label>
                                            <input type="email" class="form-control p-3" name="email"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Profile Image</label>
                                        <input class="form-control" type="file" name="user_file">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputdob">Date Of Birth:</label>
                                        <input type="date" class="form-control p-3" name="dateofbirth">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="phoneno">Phone Number:*</label>
                                        <input type="number" class="form-control p-3" name="phoneno" placeholder="999 888 7777" maxLength="10" patter="[0-9]{10}" >
                                    </div>
                                    <div class="form-group col-md-6 ps-5">
                                        <label for="gendertype" class="mt-5">Gender:</label>
                                        <label for="gender" class="ms-3">Male</label>
                                        <input type="radio" id="male" name="gender" value="male" required>
                                        <label for="gender" class="ms-3">Female</label>
                                        <input type="radio" id="female" name="gender" value="female" required>
                                        <label for="gender" class="ms-3">Others</label>
                                        <input type="radio" id="others" name="gender" value="others" required>
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="State">State:</label>
                                        <select class="form-control p-3" name="state">
                                            <option value="" selected>select your state</option>
                                            <option value="maharastra">Maharastra</option>
                                            <option value="haryana">Haryana</option>
                                            <option value="punjab">Punjab</option>
                                            <option value="himachal pradesh">Himachal Pradesh</option>
                                            <option value="assam">Assam</option>
                                            <option vale="uttarpradesh">uttar pradesh</option>
                                            <option value="j&k">Jammu and Kashmir</option>
                                            <option value="madhya pradesh">Madhya Pradesh</option>
                                            <option value="odisha">Odisha</option>
                                            <option value="bihar">Bihar</option>
                                            <option value="west bengal">West Bengal</option>
                                            <option value="gurajat">Gurajat</option>
                                            <option vaue="rajasthan">Rajasthan</option>
                                            <option vaue="rajasthan">Uttarakhand</option>
                                            <option value="bihar">Madhya Pradesh</option>
                                            <option value="west bengal">Telengana</option>
                                            <option value="gurajat">Karnataka</option>
                                            <option vaue="rajasthan">Kerala</option>
                                            <option vaue="rajasthan">Goa</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">City:</label>
                                        <select class="form-control p-3" name="city">
                                            <option value="" selected>select your city</option>
                                            <option value="Dehradun">Dehradun</option>
                                            <option value="Nainital">Nainital</option>
                                            <option value="Almora">Almora</option>
                                            <option value="Haridwar">Haridwar</option>
                                            <option value="rishikesh">rishikesh</option>
                                            <option vale="roorkee">roorkee</option>
                                            <option value="rudrapur">rudrapur</option>
                                            <option value="joshimath">joshimath</option>
                                            <option value="ramnagar">ramnagar</option>
                                            <option value="srinagar">srinagar</option>
                                            <option value="pauri">pauri</option>
                                            <option value="chakrata">chakrata</option>
                                            <option vaue="kashipur">kashipur</option>
                                            <option vaue="uttarkashi">uttarkashi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="zipcode" class="form-label">Zipcode:</label>
                                        <input type="text" class="form-control p-3" name="zipcode" maxLength="6">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group ">
                                        <label for="permenent_address">Address:*</label>
                                        <input type="text" class="form-control p-3" name="address">
                                    </div>
                                </div>
                                <div class="form-row row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password:*</label>
                                        <input type="password" class="form-control p-3" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="confirm_password">Confirm Password:*</label>
                                        <input type="password" class="form-control p-3" name="confirm_password"  placeholder="Password">
                                    </div>
                                </div>
                                <!-------------submit btn----------------->
                                <div class="col-12">
                                    <button class="btn btn-success w-100" type="submit" name="submit_btn">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>