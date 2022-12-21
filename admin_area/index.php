<!-- connect file -->
<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
session_start();

if (empty($_SESSION['admin'])) {
  
    echo "<script>window.open('../index.php', '_self') </script>";
    exit(0);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
 
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Styling -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-image{
        width: 100px;
        object-fit: contain;
        }

        .user-image{
        width: 100px;
        object-fit: contain;
        }

        .prod_img{
            width: 50px;
            height: 40px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                       <li class="nav-item">
                            <a href="../index.php" class="nav-link text-white"><?php echo 'Home ' . $_SESSION['username']; ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2 text-primary">ADMIN DASHBOARD</h3>
        </div>
        <!-- Third Child -->
        <div class="row width">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/admin.jpg" alt="" class="admin-image"></a>
                    <p class="text-light text-center"><?php echo $_SESSION['username']; ?></p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="index.php?insert_product"class="nav-link text-light bg-info my-1 px-2">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 px-2">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 px-2">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1 px-2">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 px-2">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1 px-2">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 px-2">All Orders</a></button>
                    <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1 px-2">All Payment</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 px-2">List Users</a></button>
                    <button><a href="index.php?list_contact" class="nav-link text-light bg-info my-1 px-2">List Contacts</a></button>
                    <button><a href="../user_area/user_logout.php" class="nav-link text-light bg-info my-1 px-2">Logout</a></button>
                </div>
               
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
             if (isset($_GET['insert_product'])) {
                include('insert_product.php');
            }
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_payment'])) {
                include('list_payment.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }
            if (isset($_GET['list_contact'])) {
                include('list_contact.php');
            }
            if (isset($_GET['delete_contact'])) {
                include('delete_contact.php');
            }

            ?>
            
        </div>


        <!-- last child -->
        <!-- <div class="bg-info p-2 text-center footer">
            <p>All Right reserved C  - Design by Thales Solomon-2022</p>
        </div> -->

        <!-- <?php include('../includes/footer.php'); ?> -->


    </div>
    

<!-- Bootstap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>
</body>
</html>