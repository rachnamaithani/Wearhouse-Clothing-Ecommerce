<?php
include('../config/connection.php');

if(isset($_REQUEST['insert_cat'])){

    $category_name=$_POST['category_name'];
    $category_name_underscore = strtolower(str_replace(' ', '_', $category_name));

    $category=$_POST['category'];
    $category_title=$category.'_'.$category_name_underscore;
    //select specific category data from database
    $select_category_query="SELECT * FROM  `categories` where `category_title`='$category_title'";
    $select_category_query_run=mysqli_query($conn,$select_category_query);

    $total_number_of_same_categories=mysqli_num_rows($select_category_query_run);

    if($total_number_of_same_categories>0){

        echo '<script type="text/javascript">';
        echo ' alert("category  is already present")'; 
        echo '</script>';
    }
    else{
    //insert category in a database 
    $insert_category_query="INSERT INTO `categories` (`category_title`,`category_name`) VALUE ('$category_title','$category_name')";
    $insert_category_query_run=mysqli_query($conn,$insert_category_query);
        if($insert_category_query_run)
        {
            echo '<script type="text/javascript">';
            echo ' alert("category added successfully")'; 
            echo '</script>';
        }
    }
}

?>

<!---------------insert category section------------------->
<div class="card position-absolute w-50 m-5" style="background: linear-gradient(#d37aff, #f6f8ed);">
    <div class="card-body">
        <form method="post">
            <h2 class="card-title mb-5 mt-3">Insert Category</h2>
            <div class="form-row row d-flex justify-content-center">
            <div class="form-group col-md-10 d-flex">
                <label for="category" class="h6 pt-2">Choose a category : &nbsp;</label>
                    <select name="category" class="form-control w-75 mb-4">
                        <option value="male">male</option>
                        <option value="female">female</option>
                        <option value="girl">girl</option>
                        <option value="boy">boy</option>
                    </select>
                </div>
                <div class="form-group col-md-10">
                    <input type="text" class="form-control p-3 mb-4" name="category_name"  placeholder="enter a category name">
                </div>
            </div>
            <button type="submit" class="btn btn-primary p-3 w-50 mb-4" name="insert_cat">Insert Category</button>
        </form>
    </div>
</div>