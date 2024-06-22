<!---------------view product section------------------->
<div class="m-4">
    <div class="h1 m-5">ALL PRODUCTS LIST</div>
    <table class="table border" style="background: linear-gradient(#d37aff, #f6f8ed);">
      <thead>
        <tr class="view_row">
          <th scope="col">S NO.</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Description</th>
          <!--------<th scope="col">Product Keywords</th>-------- giving problem of overflow ------------->
          <th scope="col">Product Category</th>
          <th scope="col">Product Brand</th>
          <th scope="col">Product Image 1</th>
          <th scope="col">Product Image 2</th>
          <th scope="col">Product Image 3</th>
          <th scope="col">Product Price</th>
          <th scope="col">Date</th>
          <th scope="col">Product Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include('../config/connection.php');
          $i=1;
          $select_all_products = "SELECT * FROM `products` ORDER BY `product_id` DESC";
          $select_all_products_run = mysqli_query($conn,$select_all_products);
          
          while($fetch_all_products=mysqli_fetch_assoc($select_all_products_run)){
            
             // $product_id = $fetch_all_products['product_id'];
              $product_name = $fetch_all_products['product_name'];
              $product_desc = $fetch_all_products['product_description'];
            // $product_keyword = $fetch_all_products['product_keyword'];
              $product_category = $fetch_all_products['product_category'];
              $product_brand = $fetch_all_products['product_brand'];
              $product_img1 = $fetch_all_products['product_image1'];
              $product_img2 = $fetch_all_products['product_image2'];
              $product_img3 = $fetch_all_products['product_image3'];
              $product_price = $fetch_all_products['product_price'];
              $product_date = $fetch_all_products['date'];
              $product_status = $fetch_all_products['status'];

              echo "<tr class='view_row'>";

                  echo "<td>$i</td>";
                  echo "<td>$product_name</td>";
                  echo "<td>$product_desc</td>";
                  //echo "<td>$product_keyword</td>";
                  echo "<td>$product_category</td>";
                  echo "<td>$product_brand</td>";
                  echo "<td><img src='$product_img1' alt='product_img' width='40px'></td>";
                  echo "<td><img src='$product_img2' alt='product_img' width='40px'></td>";
                  echo "<td><img src='$product_img3' alt='product_img' width='40px'></td>";
                  echo "<td>$product_price</td>";
                  echo "<td>$product_date</td>";
                  echo "<td>$product_status</td>";

              echo "</tr>";
              $i++;
          }
          ?>
      </tbody>
    </table>
</div>
