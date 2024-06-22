<?php
include('../config/connection.php');

//search bar 
function show_search_keywords(){
    global $conn;

    //getting searchbar data in key variable
    $key=$_POST['searchbar'];

    $select_keyword_products="SELECT * FROM `products` WHERE `product_keyword` LIKE '%$key%'";
    $select_keyword_products_run=mysqli_query($conn,$select_keyword_products);

    $num_row=mysqli_num_rows($select_keyword_products_run);
    if($num_row==0){
        echo "<h2>NO RESULT MATCH. NO SUCH PRODUCT FOUND</h2>";
    }
    else{
        echo "<section class='section-1 p-5'>
            <div class='container'> 
            <div class='row'>";
            while($show_keyword_product=mysqli_fetch_assoc($select_keyword_products_run)){

                $prod_name=$show_keyword_product['product_name'];
                $prod_img=$show_keyword_product['product_image1'];
                $prod_price=$show_keyword_product['product_price'];
                $prod_id=$show_keyword_product['product_id'];

                //showing products which matches with data in search bar
                echo "<div class='col-3'>
                    <a href='view_product_details.php?id=$prod_id'>
                        <div class='card' style='width: 18rem;'>
                            <img class='card-img-top' src='$prod_img' alt='product_img' style='height:350px !important;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$prod_name</h5>
                                <p class='card-text'>₹$prod_price</p>
                            </div>
                        </div>
                    </a>
                </div>";
            }
        echo "</div>
            </div>
        </section>";    

    }   
}

//no. of items in cart of user------------> after user logged in 
function cart_total_products($user){
    global $conn;
    
    $show_product_number=" SELECT * FROM `cart_details` WHERE `username`='$user'";
    $show_product_number_run=mysqli_query($conn,$show_product_number);
    echo $no_of_products=mysqli_num_rows($show_product_number_run);               
}

//no. of items in cart---------> when no login logged in
function cart_total_products_guest(){
    global $conn;
    $user='';
    $show_product_number=" SELECT * FROM `cart_details` WHERE `username`='$user'";
    $show_product_number_run=mysqli_query($conn,$show_product_number);
        /*if(mysqli_num_rows($show_product_number_run)==0)
            echo "0";
        else*/
            echo $no_of_products=mysqli_num_rows($show_product_number_run);               
}

//show women_western_products name dropdown 
function get_women_western_products(){
    global $conn;
    $select_women_western_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'womenwestern%'";      
    $select_women_western_query_run=mysqli_query($conn,$select_women_western_query);

        while($row_data=mysqli_fetch_assoc($select_women_western_query_run)){
            
            $product_name=$row_data['category_name'];
            $product_title=$row_data['category_title'];
            
            echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";

        }                                         
}

//show women_ethnic_products name dropdown 
function get_women_ethnic_products(){
    global $conn;
    $select_women_western_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'womenethnic%'";
    $select_women_western_query_run=mysqli_query($conn,$select_women_western_query);

        while($row_data=mysqli_fetch_assoc($select_women_western_query_run)){

            $product_name=$row_data['category_name'];
            $product_title=$row_data['category_title'];

            echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";
         }
}

//show men's formal products name dropdown 
function get_formal_men_products()
{
    global $conn;
    $select_men_formal_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'menformal%'";
    $select_men_formal_query_run=mysqli_query($conn,$select_men_formal_query);

        while($row_data=mysqli_fetch_assoc($select_men_formal_query_run)){

            $product_name=$row_data['category_name'];
            $product_title=$row_data['category_title'];
    
             echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";
        }   
}

//show men's casual products name dropdown 
function get_casual_men_products(){
    global $conn;
    $select_men_casual_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'mencasual%'";
    $select_men_casual_query_run=mysqli_query($conn,$select_men_casual_query);

        while($row_data=mysqli_fetch_assoc($select_men_casual_query_run)){

            $product_name=$row_data['category_name'];
            $product_title=$row_data['category_title'];
                                                        
             echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";
        }
}

//show girls products name dropdown 
function kid_girl_products(){
    global $conn;
    $select_girl_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'girl%'";
    $select_girl_query_run=mysqli_query($conn,$select_girl_query);

            while($row_data=mysqli_fetch_assoc($select_girl_query_run)){

                $product_name=$row_data['category_name'];
                $product_title=$row_data['category_title'];
                                                        
                echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";
            }
}

//show boy products name dropdown
function kid_boy_products(){
    global $conn;
    $select_boy_query="SELECT * FROM `categories` WHERE `category_title` LIKE 'boy%'";
    $select_boy_query_run=mysqli_query($conn,$select_boy_query);

        while($row_data=mysqli_fetch_assoc($select_boy_query_run)){

            $product_name=$row_data['category_name'];
            $product_title=$row_data['category_title'];

            echo"<li><a href='index.php?category=$product_title' class='text-dark'>$product_name</a></li>";
         }
}

//show brands name dropdown
function get_brand(){
    global $conn;
    $select_brand_query="SELECT * FROM `brand`";
    $select_brand_query_run=mysqli_query($conn,$select_brand_query);

    while($row_data=mysqli_fetch_assoc($select_brand_query_run)){
        
    $brand_title=$row_data['brand_title'];
    
    echo"<li><a href='index.php?brand=$brand_title' class='brand text-dark'>$brand_title</a></li>";
}
}

//show product details (img,name,price) based on brand is selected
function show_specific_brand(){
    global $conn;
    
    $selected_brand=$_GET['brand'];
    
    $selected_brand_query="SELECT * FROM `products` WHERE `product_brand`='$selected_brand'";
    $show_selected_brand_query_run=mysqli_query($conn,$selected_brand_query);

    //if no product exist of that brand
    $num_row=mysqli_num_rows($show_selected_brand_query_run);
    if($num_row==0){
        echo "<h2>NO PRODUCT EXISTED FROM THIS BRAND RIGHT NOW</h2>";
    }

    else{
        echo "<section class='section-1 p-5'>
            <div class='container'> 
            <div class='row'>";
            while($show_brand=mysqli_fetch_assoc($show_selected_brand_query_run)){

                $prod_id=$show_brand['product_id'];
                $prod_brand=$show_brand['product_brand'];
                 $prod_name=$show_brand['product_name'];
                $prod_img=$show_brand['product_image1'];
                $prod_price=$show_brand['product_price'];
                $_SESSION['id']=$show_brand['product_id'];

                echo "<div class='col-3'>
                    <a href='view_product_details.php?id=$prod_id'>
                        <div class='card' style='width: 18rem;'>
                            <img class='card-img-top' src='$prod_img' alt='product_img' style='height:350px !important;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$prod_name</h5>
                                <p class='card-text'>₹$prod_price</p>
                            </div>
                        </div>
                    </a>
                </div>";
            }
        echo "</div>
            </div>
        </section>";    

    }
}

//show products details(img,name,price) based on specific category is selected
function show_specific_category()
{
    global $conn;

    $selected_category=$_GET['category'];

    $selected_category_query="SELECT * FROM `products` WHERE `product_category`='$selected_category'";
    $show_selected_category_query_run=mysqli_query($conn,$selected_category_query);

    $num_row=mysqli_num_rows($show_selected_category_query_run);
    if($num_row==0){
        echo "<h2>NO PRODUCT EXISTED FROM THIS CATEGORY RIGHT NOW</h2>";
    }

    else{
        echo "<section class='section-1 p-5'>
            <div class='container'> 
            <div class='row'>";
            while($show_brand=mysqli_fetch_assoc($show_selected_category_query_run)){

                $prod_id=$show_brand['product_id'];
                $prod_category=$show_brand['product_category'];
                $prod_name=$show_brand['product_name'];
                $prod_img=$show_brand['product_image1'];
                $prod_price=$show_brand['product_price'];
                $_SESSION['id']=$show_brand['product_id'];
                
                echo "<div class='col-3'>
                    <a href='view_product_details.php?id=$prod_id'>
                        <div class='card' style='width: 18rem;'>
                            <img class='card-img-top' src='$prod_img' alt='product_img' style='height:350px !important;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$prod_name</h5>
                                <p class='card-text'>₹$prod_price</p>
                            </div>
                        </div>
                    </a>
                </div>";
            }
        echo "</div>
            </div>
        </section>";   
}
}

//add to cart
function specific_product_details($id,$user,$price){
    global $conn;
    if(isset($_GET['addtocart'])){

        // echo $_GET['addtocart'];

        //only add product to cart when product's size and product's quantity is selected
         if(isset($_GET['psize']) && isset($_GET['quantity'])) {

             $size=$_GET['psize'];
             $quantity=$_GET['quantity'];
             $total_amount=$quantity*$price;
             $insert_product_to_cart="INSERT INTO `cart_details` (`product_id`,`username`,`size`,`quantity`,`total_amount`) VALUES ('$id','$user','$size','$quantity','$total_amount')";
             $insert_product_to_cart_run=mysqli_query($conn,$insert_product_to_cart);

             if($insert_product_to_cart_run){

             echo "<script> alert('product added to cart'); </script>";
             echo "window.location.href=My-page.php?id=".$id;   
             
              }
              else{
                 echo '<script type="text/javascript">';
                 echo ' alert("failed to add product to cart")'; 
                 echo '</script>';  
                 
              }
         }
     }
}

//update quantity and size of user products
function updateproduct($product_price, $p_id){
    global $conn;
    
    //update the quantity and size of that product whose p_id is given and update_details is true 
    if(isset($_GET['update_details']) && $_GET['update_prod_id']==$p_id){                                       /* $_GET['update_prod_id']==$prod_id-----------> use this condition so that this if condition only be true once not throughout the loop*/

        $pro_size=$_GET['prod_size'];
        $pro_quantity=$_GET['prod_quantity'];
        $pro_price=$product_price*$pro_quantity;
        $pro_id=$_GET['update_prod_id'];

        $update_cart_product_details="UPDATE `cart_details` SET `size`='$pro_size' , `quantity`='$pro_quantity' , `total_amount`='$pro_price' WHERE `p_id`='$p_id'";
        $update_cart_product_details_run=mysqli_query($conn,$update_cart_product_details);
        
        if($update_cart_product_details_run){
                 
            echo '<script type="text/javascript">';
            echo ' alert("product updated successfully")'; 
            //echo 'window.location.href="cart_table.php"';
            echo '</script>';                        
         }
         else{
            echo '<script type="text/javascript">';
            echo ' alert("failed to update product details")'; 
            echo '</script>';  
            
         }
    }
 
}

//delete  products from cart by user
function deleteproduct($product_id){
    global $conn;

    if(isset($_GET['delete_product']) && $_GET['update_prod_id']==$product_id){          /* $_GET['update_prod_id']==$product_id-----------> use this condition so that this if condition only be true once not throughout the loop*/

         $prod_id=$_GET['update_prod_id'];

        $delete_cart_product_details="DELETE FROM `cart_details` WHERE `product_id`='$prod_id'";
        $delete_cart_product_run=mysqli_query($conn,$delete_cart_product_details);
        
        if($delete_cart_product_run){
                    
                echo '<script type="text/javascript">';
                echo ' alert("product deleted successfully")'; 
                //echo 'window.location.href="cart_table.php"';
                echo '</script>';   
            }
            else{
                echo '<script type="text/javascript">';
                echo ' alert("failed to delete product")'; 
                echo '</script>';  
            }
            //header('location:cart_table.php'); 

    }
}
//LATEST WOMEN PRODUCTS ADDED TO WEBSITE
function getwomentlatest(){
    global $conn;
    $fetch_latest="SELECT * FROM `products` WHERE `product_category` LIKE 'women%' ORDER BY `product_id` DESC LIMIT 2";
    $fecth_latest_run=mysqli_query($conn,$fetch_latest);
    
    while($fetch=mysqli_fetch_assoc($fecth_latest_run)){
    
        $img=$fetch['product_image1'];
        $name=$fetch['product_name'];
        $price=$fetch['product_price'];
        $id=$fetch['product_id'];

    echo "<div class='col-3 text-center'>";
        echo"<a href='../user/view_product_details.php?id=$id'>";
            echo "<img src='$img' height='450px' width='100%'>";
            echo "<p class=' h5 mt-3'>$name</p>";
            echo "<h6>₹$price</h6>";
        echo "</a>";
    echo "</div>";
    }
}

//LATEST MEN'S PRODUCTS ADDED TO WEBSITE
function getmenlatest(){
    global $conn;
    $fetch_latest="SELECT * FROM `products` WHERE `product_category` LIKE 'men%' ORDER BY `product_id` DESC LIMIT 2";
    $fecth_latest_run=mysqli_query($conn,$fetch_latest);
    
    while($fetch=mysqli_fetch_assoc($fecth_latest_run)){
    
        $img=$fetch['product_image1'];
        $name=$fetch['product_name'];
        $price=$fetch['product_price'];
        $id=$fetch['product_id'];

    echo "<div class='col-3 text-center'>";
        echo"<a href='../user/view_product_details.php?id=$id'>";
            echo "<img src='$img' height='450px' width='100%'>";
            echo "<p class='h5 mt-3 '>$name</p>";
            echo "<h6>₹$price</h6>";
        echo "</a>";
    echo "</div>";
    }
}
?>
