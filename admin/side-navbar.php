<!--------------SIDE NAV BAR------------------->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"  id="topbar" style="padding:0;background-image: linear-gradient(to top, #f84343 0%, #ffb102 100%);background-repeat: no-repeat;">
    <!------------WEARHOUSE BRAND IMG------------->
    <div class="row">
        <div class="col-3 text-center mb-3 p-4 w-100" style="background-image: linear-gradient(to top, #ffd3d3 0%, #f7c5ff 100%);background-repeat: no-repeat;">
            <img src="../images/logo2555.png" height="90px" class="ps-4">
        </div>
    </div>
    <!------------Admin img,name,online status------------------>
    <div class="ms-3 text-center">
        <img src="../images/adminimg12.jpg" height="120px" class="ms-2 rounded-circle" alt="adminimg">
        <div class="h6 ms-3 text-light mt-2 ">Administrator</div>
        <div class="ms-3 text-light" style="font-size:14px;"><?php echo $admin?></div>
    </div>
    <div class=" text-light text-center mt-2" style="font-size: 12px"><i class="fa fa-circle" style="font-size:12px;color:#30f330"></i> Online</div>
    <!--------------------nav section---------------------->
    <nav class="navbar mt-3 ms-3">
        <div class="container-fluid ms-3 mt-3">
            <div class="navbar-header w-100">
               <ul class="nav navbar-nav w-100">
                    <li class="pb-4">
                        <a href="./index2.php" class="h6 text-decoration-none waves-effect text-light waves-light"><i class="fa fa-briefcase"></i> Dashborard</a>
                    </li>  
                    <li class="pb-4">
                        <a href="./index2.php?register" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-edit"></i>Register New Admin</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?insert_product" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-edit"></i> Insert Products</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?view_product" class="h6 text-decoration-none waves-effect waves-light text-light" name="viewproduct"><i class="fa fa-group"></i> View Products</a>
                    </li> 
                    <li class="pb-4">
                        <a href="./index2.php?insert_categories" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-pencil" aria-hidden="true"></i> Insert Categories</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?view_categories" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-eye" aria-hidden="true"></i></i> View Categories</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?insert_brand" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-pencil" aria-hidden="true"></i> Insert Brands</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?view_brands" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-eye" aria-hidden="true"></i> View Brands</a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?admin_view_orders" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-newspaper-o" aria-hidden="true"></i> All orders </a>
                    </li>
                    <li class="pb-4">
                        <a href="./index2.php?all_users" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-users" aria-hidden="true"></i> Users List</a>
                    </li>
                    <li class="pb-4">
                        <a href="./admin_logout.php?logout" class="h6 text-decoration-none waves-effect waves-light text-light"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
