<!-------view specific brand products ----------->
<?php
    $selected_brand=$_GET['brand'];
    
    $selected_brand_query="SELECT * FROM `products` WHERE `product_brand`='$selected_brand'";
    $show_selected_brand_query_run=mysqli_query($conn,$selected_brand_query);
    
    $num_row=mysqli_num_rows($show_selected_brand_query_run);
    if($num_row==0){
        echo "<h2>NO PRODUCT EXISTED FROM THIS BRAND RIGHT NOW</h2>";
    }
    else{
        echo "<section class='section-1 p-5'>
            <div class='container'> 
            <div class='row'>";
            while($show_brand=mysqli_fetch_assoc($show_selected_brand_query_run)){

                $prod_brand=$show_brand['product_brand'];
                $prod_name=$show_brand['product_name'];
                $prod_img=$show_brand['product_image1'];
                $prod_price=$show_brand['product_price'];

                echo "<div class='col-3'>
                    <a href='#'>
                        <div class='card' style='width: 18rem;'>
                            <img class='card-img-top' src='../$prod_img' alt='product_img' style='height:350px !important;'>
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

/*$show_selected_brand_product="SELECT * FROM `products`";
$show_selected_brand_product_run=mysqli_query($conn,$show_selected_brand_product);


echo "<section class='section-1 p-5'>
        <div class='container'> 
        <div class='row'>";

        while($show_brand=mysqli_fetch_assoc($show_selected_brand_product_run)){

            $prod_brand=$show_brand['product_brand'];
            $prod_name=$show_brand['product_name'];
            $prod_img=$show_brand['product_image1'];
            $prod_price=$show_brand['product_price'];
            
            if($prod_brand==$brand_title)
            {
            echo "<div class='col-3'>
                <a href='#'>
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
        }
    echo "</div>
        </div>
    </section>";
?>*/

?>