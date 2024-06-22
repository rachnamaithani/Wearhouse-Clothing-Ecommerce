<!-------------EDIT USER PROFILE ---------------->
<?php
    session_start();
    include('../config/connection.php');

     $username=$_SESSION['username'];

     $select_user="SELECT * FROM `users` where `username`='$username'";
     $select_user_query_run=mysqli_query($conn,$select_user);

     $user_data=mysqli_fetch_array($select_user_query_run);
    
     //fetch user data from database in variables
     $username=$user_data['username'];
     $email=$user_data['email'];
     $gender=$user_data['gender'];
     $dateofbirth=$user_data['dateofbirth'];
     $phoneno=$user_data['phoneno'];
     $state=$user_data['state'];
     $city=$user_data['city'];
     $zipcode=$user_data['zipcode'];
     $address=$user_data['address'];
     $image=$user_data['user_img'];
     
    //submit=true then update user info fields
     if(isset($_REQUEST['submit'])){

        //$username= mysqli_real_escape_string($conn, $_POST['username']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);
        $dateofbirth= mysqli_real_escape_string($conn, $_POST['dateofbirth']);
        $phone_no= mysqli_real_escape_string($conn, $_POST['phone_no']);
        $gender= mysqli_real_escape_string($conn, $_POST['gender']);

        
        $filename=$_FILES['user_img']['name'];                                  //userimages/rohit.jfif
        $tempname=$_FILES['user_img']['tmp_name'];
        $tempname2 = explode(".",$filename);
        $newfile = rand(1,9999) . '.' .end($tempname2);
        $folder = "userimages/".$newfile;
        move_uploaded_file($tempname, $folder);
         $update_emp_img="UPDATE `users` SET `user_img`='$folder' WHERE `username`='$username'";
         $quuery_run1=mysqli_query($conn,$update_emp_img);

        $state= mysqli_real_escape_string($conn, $_POST['state']);
        $city= mysqli_real_escape_string($conn, $_POST['city']);
        $zipcode= mysqli_real_escape_string($conn, $_POST['zipcode']);
        $address= mysqli_real_escape_string($conn, $_POST['address']);
    
        $update_user_data="UPDATE `users` SET `email`='$email',`dateofbirth`='$dateofbirth',`phoneno`='$phone_no',`gender`='$gender',`zipcode`='$zipcode',`state`='$state',`city`='$city',`address`='$address' WHERE `username`='$username'";
        $update_user_data_query_run=mysqli_query($conn,$update_user_data);
        
        if($update_user_data_query_run){
            echo '<script type="text/javascript">';
            echo ' alert("data updated successfully")'; 
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';                                     
            echo ' alert("failed to update data")'; 
            echo '</script>';
        }
     }
?>

<div class="row"  style="background-image: linear-gradient(-20deg, #6e45e2 0%, #88d3ce 100%);">
     <!----------adding side bar----------------->
    <?php require("user_side_navbar.php");?>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding:0;background:#d2f9ffd1;">
        <div id="menu" style="height:138px;background-image: linear-gradient(to top, #9fffe7 0%, #02ccff 100%);background-repeat: no-repeat;">
            <div class="w-25 float-end">
                    <p class="pull-right me-4" style="font-size: 18px;padding-top:55px"><a href="index.php" class="text-dark text-decoration-none">Continue Shopping</a></p>
            </div>
        </div>
        <!-------------user information form start -------------->
        <form method="post" class="ps-5 pe-5 pt-5" enctype="multipart/form-user_data">
            <div class="form-row row mb-4">
                <h5>Edit Profile</h5>
                <div class="form-group col-md-4 ">
                    <!-----------default image to show if no image of user----------------->
                    <?php if($image == NULL){
                    $image = 'userimages/user_default.png'; 
                    }
                    ?>
                    <!--------user image update input field--------------->
                    <img src="<?php echo $image ?>" alt="user_img" class="mt-3 rounded" width="180px" height="180px"><br>
                    <label for="file" class="mt-3" >upload your image</label><br>
                    <input type="file" class="form-control w-75" name="user_img" >  
                </div>
                <div class="form-group col-md-8">
                    <label for="firstname" class="mt-3">Username</label>
                    <input type="text" class="form-control p-3" name="firstname" value="<?php echo $username?>" placeholder="First name" readonly>
                    <label for="inputEmail" class="mt-4">Email</label>
                    <input type="email" name="email" class="form-control p-3" value="<?php echo $email;?>" placeholder="Email">
                    <label for="phoneno">Phone Number</label>
                    <input type="number" class="form-control p-3" name="phone_no" value="<?php echo $phoneno?>" >
                </div>
            </div>
            <div class="form-row row mt-4 ">
                <div class="form-group col-md-4">
                    <label for="inputPassword" class="pt-5">Gender:</label>
                    <label for="gender" class="ms-5">Male</label>
                    <input type="radio" id="male" name="gender" <?php if ($gender=="male" ) echo "checked";?> value="male" required>
                    <label for="gender" class="ms-5">Female</label>
                    <input type="radio" id="female" name="gender" <?php if ($gender=="female" ) echo "checked";?> value="female" required>
                </div>
                <div class="form-group col-md-8">
                   <label for="inputdob" class="">Date of Birth</label>
                    <input type="date" name="dateofbirth" value="<?php echo $dateofbirth?>" class="form-control p-3">
                </div>
            </div>
            <div class="form-row row mt-4">
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select class="form-control p-3" name="state" selected="<?php echo $state?>">
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
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control p-3" name="city" value="<?php echo $city?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="zip">Zipcode</label>
                    <input type="number" class="form-control p-3" name="zipcode" value="<?php echo $zipcode?>" >
               </div>
            </div>
            <div class="form-row row mt-4">
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control p-3" name="address" value="<?php echo $address?>">
                </div>
            </div>
             <!----------submit form button----------->
            <button type="submit" class="btn btn-primary mb-4 mt-4 p-3 w-100" name="submit">Update</button>
        </form>
    </div>
</div>
    