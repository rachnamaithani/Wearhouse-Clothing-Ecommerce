<!---------------view all users section------------------->
<div class="m-5">

    <?php
      
      include('../config/connection.php');
    
      $select_all_users = "SELECT * FROM `users` ORDER BY `id` DESC ";
      $select_all_users_run = mysqli_query($conn,$select_all_users);

      $i=1;
      $users=mysqli_num_rows($select_all_users_run);

      if($users>0){

    ?>
  <div class="h1 m-5">ALL USERS LIST</div>
  <table class="table border ">
    <thead>
      <tr class="view_row">
        <th scope="col">S NO.</th>
        <th scope="col">User Name</th>
        <th scope="col">User Image</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Gender</th>   
        <th scope="col">State</th>   
        <th scope="col">City</th>      
      </tr>
    </thead>
     <tbody>

  <?php
      while($fetch_all_users=mysqli_fetch_assoc($select_all_users_run)){

          $username = $fetch_all_users['username'];
          $email = $fetch_all_users['email'];
          $phoneno = $fetch_all_users['phoneno'];
          $gender = $fetch_all_users['gender'];
          $img=$fetch_all_users['user_img'];
          $state=$fetch_all_users['state'];
          $city=$fetch_all_users['city'];
          
          echo "<tr class='view_row'>";
          echo "<td>$i</td>";
              echo "<td>$username</td>"; 
              echo "<td><img src='$img' alt='user-img' width='80px'></td>"; 
              echo "<td>$email</td>";
              echo "<td>$phoneno</td>";
              echo "<td>$gender</td>";
              echo "<td>$state</td>";
              echo "<td>$city</td>";
          echo "</tr>";
          $i++;
      }
    }
    else{
      echo "<h1>NO USER </h1>";
    }
    ?>
    </tbody>
  </table>
</div>