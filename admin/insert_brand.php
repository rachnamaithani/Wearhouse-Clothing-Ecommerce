<?php
include('../config/connection.php');

if(isset($_POST['insert_brand'])){

    $brand_title=$_POST['brand_title'];
    
    //select data from database
    $select_brand_query="SELECT * FROM  `brand` where `brand_title`='$brand_title'";
    $select_brand_query_run=mysqli_query($conn,$select_brand_query);

    $total_number_of_same_brands=mysqli_num_rows($select_brand_query_run);

    if($total_number_of_same_brands!=0){

        echo '<script type="text/javascript">';
        echo ' alert("brand is already present")'; 
        echo '</script>';
    }
    else{
    //insert brand in a database 
    $insert_brand_query="INSERT INTO `brand` (`brand_title`) VALUE ('$brand_title')";
    $insert_brand_query_run=mysqli_query($conn,$insert_brand_query);

        if($insert_brand_query_run)
        {
            echo '<script type="text/javascript">';
            echo ' alert("brand added successfully")'; 
            echo '</script>';
        }
    }
}

?>

<!---------------insert brand section------------------->
<div class="card position-absolute w-50 m-5" style="background: linear-gradient(#d37aff, #f6f8ed);">
    <div class="card-body">
        <!-------insert form----------->
        <form method="post">
            <h2 class="card-title mb-5 mt-3">Insert Brand</h2>
            <div class="form-row row d-flex justify-content-center">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control p-3 mb-4" name="brand_title"  placeholder="enter a new brand">
                </div>
            </div>
            <button type="submit" class="btn btn-primary p-3 w-50 mb-3" name="insert_brand">Insert brand</button>
        </form>
    </div>
</div>