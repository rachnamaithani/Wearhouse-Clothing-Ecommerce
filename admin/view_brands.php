<!---------------view brands section------------------->
<div class="m-auto w-50 text-center">
    <div class="h1 m-5">ALL BRAND LIST</div>
    <table class="table border ">
      <thead>
        <tr class="view_row">
          <th scope="col">S NO.</th>
          <th scope="col">Brand Name</th>
        </tr>
      </thead>
      <tbody>

      <?php

        include('../config/connection.php');
        $i=1;
        $select_all_brands = "SELECT * FROM `brand` ORDER BY `brand_id` DESC ";
        $select_all_brands_run = mysqli_query($conn,$select_all_brands);
        
        while($fetch_all_brands=mysqli_fetch_assoc($select_all_brands_run)){
        
            $product_brands = $fetch_all_brands['brand_title'];

            echo "<tr class='view_row'>";
                echo "<td>$i</td>";
              
                echo "<td>$product_brands</td>";

            echo "</tr>";
            $i++;
        }
      ?>
      
      </tbody>
    </table>
</div>