<!-- connect file -->
<?php
include('includes/connect.php'); 
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellingPoint</title>
    <!-- Bootstrap css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
 
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup class="text-danger"><?php numCartItem(); ?></sup></i></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:<span class="text-danger"> NGN <?php totalCartPrice(); ?></span></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" name="search_data" 
                        placeholder="Search" aria-label="Search">
                        <input type="submit" value="Search" name="search_data_product" 
                        class="btn btn-outline-light">
                    </form>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php cart(); ?>


        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            
            <ul class="navbar-nav me-auto">
                <?php
                     if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                     }else {
                         echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                        </li>";
                     }
     

                if (!isset($_SESSION['username'])) {
                   echo "<li class='nav-item'>
                   <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                   </li>";
                }else {
                    echo "<li class='nav-item'>
                   <a class='nav-link text-danger' href='./user_area/user_logout.php'>Logout</a>
                   </li>";
                }

                ?>
            </ul>
        </nav>

        <!-- third Child -->
        <div class="bg-light">
            <h3 class="text-center text-warning">Thales Store</h3>
            <p class="text-center bg-warning text-secondary">We sell all kinds of products delivery world wide</p>
        </div>


        <!-- Fourth Child -->
        <div class="row width px-3">
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">
                    <!-- fetching Products -->
                    <?php 
                        searchProduct();
                        getUniqueCategories();
                        getUniquebrands();
                    ?>
                </div>
                 <!-- ROW END -->
            </div>
            <!-- COL END -->
            <div class="col-md-2 bg-secondary p-0">
                <!-- Sidenav -->
                <!-- Brand to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brand</h4></a>
                    </li>

                    <?php
                        getBrands();
                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php
                        getCategories();
                    ?>

                </ul>
            </div>
        </div>

        <!-- last child -->
       <!-- include footer -->
       <?php include('./includes/footer.php'); ?>
  </div>
    
<!-- Bootstap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
</body>
</html>