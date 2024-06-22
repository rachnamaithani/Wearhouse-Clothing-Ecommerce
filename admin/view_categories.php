<!---------------view category section------------------->
<div class="m-auto w-50 text-center">
    <div class="h1 m-5">ALL CATEGORY LIST</div>
    <table class="table border ">
      <thead>
        <tr class="view_row">
          <th scope="col">S NO.</th>
          <th scope="col">Category Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('../config/connection.php');
        
        $select_all_category = "SELECT * FROM `categories` ORDER BY `category_id` DESC";
        $select_all_category_run = mysqli_query($conn,$select_all_category);
        $i=1;
        while($fetch_all_products=mysqli_fetch_assoc($select_all_category_run)){
            
          //$product_id = $fetch_all_products['category_id'];
            $product_category = str_replace('_',' ',$fetch_all_products['category_title']);

            echo "<tr class='view_row'>";
                echo "<td>$i</td>";
              
                echo "<td>$product_category</td>";

            echo "</tr>";
            $i++;
        }
        ?>
      </tbody>
    </table>
</div>
