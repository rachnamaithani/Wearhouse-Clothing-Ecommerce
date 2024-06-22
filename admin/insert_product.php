<?php

    include('../config/connection.php');

    $select_categories = "SELECT * FROM `categories` ";
    $select_categories_query_run = mysqli_query($conn,$select_categories);

    $select_brand = "SELECT * FROM `brand` ";
    $select_brand_query_run = mysqli_query($conn,$select_brand);

    if(isset($_REQUEST['product_submit_btn'])){

        //fetching form data and saving in variables
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_keyword = $_POST['product_keyword'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];  

        $filename1 = $_FILES['product_image1']['name'];               //save in db
        $tempname1 = $_FILES['product_image1']['tmp_name'];        //save in product image folder
        $folder1 = "../product_Images/".$filename1;

        $filename2 = $_FILES['product_image2']['name'];               //save in db
        $tempname2 = $_FILES['product_image2']['tmp_name'];        //save in product image folder
        $folder2 = "../product_Images/".$filename2;
    
        $filename3= $_FILES['product_image3']['name'];               //save in db
        $tempname3 = $_FILES['product_image3']['tmp_name'];        //save in product image folder
        $folder3 = "../product_Images/".$filename3;
    
        $product_price = $_POST['product_price'];
        $product_status="true";

        //checking for field empty
        if($product_name=='' or  $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand==''
        or $folder1=='' or $folder2=='' or $folder3=='' or $product_price =='' or $product_status =='')
        {
            echo '<script type="text/javascript">';
            echo ' alert("Please insert all the fields")'; 
            echo '</script>';
        }

        //if no field is empty then insert product in db
        else{
            move_uploaded_file($tempname1, $folder1);
            move_uploaded_file($tempname2, $folder2);
            move_uploaded_file($tempname3, $folder3);

            $insert_product = "INSERT INTO `products`(`product_name`,`product_description`,`product_keyword`,`product_category`,`product_brand`,`product_image1`,`product_image2`,`product_image3`,`product_price`,`status`) 
            VALUES ('$product_name', '$product_description','$product_keyword','$product_category','$product_brand','$folder1','$folder2','$folder3','$product_price','$product_status')";

            echo $insert_product_query_run = mysqli_query($conn, $insert_product);

            if($insert_product_query_run)
            { 
                ?>
                <script>
                     alert("product inserted successfully")
                      window.location.href="index2.php?insert_product";      
                  </script>
                <?php
            }
            else{
                echo "failed to insert data";
            }
        }
    }
?>
<!---------------insert product section------------------->
<div class="card position-absolute w-75 m-3" style="background: linear-gradient(#d37aff, #f6f8ed);">
    <div class="card-body"> 
    <!-----------insert product form--------------->
    <form method="post" enctype="multipart/form-data"> 
        <h1 class = "mt-3">INSERT A PRODUCT</h1>
            <table cellspacing="8" cellpadding="8" class="mt-5 text-center" width="900px">
                <tr>
                    <td><label for="product_name" class="fw-bold">PRODUCT NAME:</label></td>
                    <td><input type="text" name="product_name" class="form-control" placeholder="Enter product name" required></td>
                </tr>
                <tr>
                    <td><label for="desc" class="fw-bold">PRODUCT DESCRIPTION:</label></td>
                    <td><input type="text" name="product_description" class="form-control" placeholder="Enter product description" required></td>
                </tr>
                <tr>
                    <td><label for="keyword" class="fw-bold">PRODUCT KEYWORDS:</label></td>
                    <td><input type="text" name="product_keyword" class="form-control" placeholder="Enter product related words" required></td>
                </tr>
                <tr>
                    <td><label for="category" class="fw-bold">SELECT A CATEGORY:</label></td>
                    <td><select class="form-select " name="product_category" aria-label="Default select example">
                            <option selected>select a category</option>
                                <?php   
                                //fetching categories from db
                                while($row=mysqli_fetch_assoc($select_categories_query_run)){
                                    $category=$row['category_title'];
                                    echo "<option value='$category'>$category</option>";
                                    }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="brand" class="fw-bold">SELECT A BRAND:</label></td>
                    <td><select class="form-select" name="product_brand" aria-label="Default select example">
                        <option selected>select a brand</option>
                            <?php   
                                //fetching brands from db
                                while($row=mysqli_fetch_assoc($select_brand_query_run)){
                                    $brand = $row['brand_title'];
                                    echo "<option value='$brand'>$brand</option>";
                                    }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="image1" class="fw-bold">PRODUCT IMAGE 1:</label></td>
                    <td><input type="file" class="form-control" name="product_image1" ></td>
                </tr>
                <tr>
                    <td><label for="image2" class="fw-bold">PRODUCT IMAGE 2:</label></td>
                    <td><input type="file" class="form-control" name="product_image2"></td>
                </tr>
                <tr>
                    <td><label for="image3" class="fw-bold">PRODUCT IMAGE 3:</label></td>
                    <td><input type="file" class="form-control" name="product_image3"></td>
                </tr>
                <tr>
                    <td><label for="product_price" class="fw-bold">PRODUCT PRICE:</label></td>
                    <td><input type="number" name="product_price"  class="form-control" placeholder="Enter product price" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="reset" class="btn btn-primary" name="reset_btn">Reset</button>
                        <button type="submig" class="btn btn-success" name="product_submit_btn">INSERT PRODUCT </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>