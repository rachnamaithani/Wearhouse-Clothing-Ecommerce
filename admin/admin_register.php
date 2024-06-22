<?php
    include('../config/connection.php');
      
    if(isset($_REQUEST['submit_btn'])){   
        
        //rand() is used to generate random number
        $random_num=rand(1000,9999);

        //fetching form data in variables
        $name = trim(mysqli_real_escape_string($conn,$_POST['admin_name']));
        $username =  trim(mysqli_real_escape_string($conn,($name.'_'.$random_num)));
        $email =  trim(mysqli_real_escape_string($conn,$_POST['admin_email']));
        $phoneno =  trim(mysqli_real_escape_string($conn,$_POST['admin_phone']));
        $gender =  trim(mysqli_real_escape_string($conn,$_POST['admin_gender']));
        $password = trim(md5(mysqli_real_escape_string($conn, $_POST['admin_password'])));

        //making sure that only unique email is entered by user 
        $select_email="SELECT `admin_email` from `admin` where `admin_email`='$email'";
        $select_email_query_run = mysqli_query($conn,$select_email);
        if(mysqli_num_rows($select_email_query_run) == 1){
            echo '<script type="text/javascript">';
            echo ' alert("please enter different email address!")'; 
            echo '</script>';
            header('location:admin_register.php');
        }

        //codition for required field so that required fields should not be save empty in db
        if(empty($username) || empty($email) || empty($phoneno) || empty($password)){      
            echo '<script type="text/javascript">';
            echo ' alert("please enter all the required fields!")'; 
            echo '</script>';
            header('location:admin_register.php');
        }
            
        //save new admin data in db
        $insert_user_data = "INSERT INTO `admin`(`admin_username`,`admin_name`,`admin_email`,`admin_phone`,`admin_gender`,`admin_password`) 
        VALUES ('$username','$name', '$email', '$phoneno','$gender','$password')";
        $run = mysqli_query($conn, $insert_user_data);                   

        if($run){
            echo '<script type="text/javascript">';
            echo ' alert("registered successfully")'; 
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo ' alert("failed to register ....try again")'; 
            echo '</script>';
        }
    }
?>

<!---------------Admin Registeration form------------------->
<div class="w-50 m-auto"   style="padding:0;background:#d2f9ffd1;">
    <div class="h1 m-4 p-2">Register New Admin</div>

    <!-----------------register form start------------------->
    <form method="post" class="ps-5 pe-5" enctype="multipart/form-user_data">

        <input type="text" class="form-control p-3 mb-4" name="admin_name" placeholder="Name">

        <input type="email" class="form-control p-3 mb-4" name="admin_email"  placeholder="Email">

        <input type="number" class="form-control p-3 mb-4" name="admin_phone" placeholder="Phone no" >

        <label for="gendertype" class="mb-4 text-dark">Gender:</label>
        <label for="gender" class="ms-3 text-dark">Male</label>
        <input type="radio" name="admin_gender" value="male" required>
        <label for="gender" class="ms-3 text-dark">Female</label>
        <input type="radio" name="admin_gender" value="female" required>
        <label for="gender" class="ms-3 text-dark">Others</label>
        <input type="radio"  name="admin_gender" value="other" required>
            
        <!---- <input type="file" class="form-control mb-4" name="admin_img" >    ------>
        <input type="password" class="form-control p-3 mb-4" name="admin_password" placeholder="Password" required>

        <!------------------submit btn-------------------->
        <button class="btn btn-success w-100 mb-4" type="submit" name="submit_btn">Submit form</button>
    </form>
</div>

