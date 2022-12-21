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
    <title>Cart Details</title>
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
    <style>
        .cart_image{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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
                    </ul>
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
        <!-- <div class="bg-light mb-5">
            <h3 class="text-center text-warning">Thales Store</h3>
            <p class="text-center bg-warning text-secondary">We sell all kinds of products delivery world wide</p>
        </div> -->
        <div class="mb-5 mt-5">
            <h3 class="text-center text-warning">Products in your Cart!</h3>
        
        </div>


        <!-- four child-table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                            $ip = getIPAddress();
                            $total_price = 0;
                            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                            $result_cart = mysqli_query($con, $cart_query);
                            $result_rows = mysqli_num_rows($result_cart);
                            if ($result_rows > 0) {
                                echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>";
                            while ($row = mysqli_fetch_array($result_cart)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = number_format($row_product_price['product_price'], 2);
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values; 
                        ?>
                        <tr>
                            <th><?php echo $product_title; ?></th>
                            <th> <img src="./admin_area/product_images/<?php echo $product_image1; ?>" 
                                alt="" class="cart_image"> </th>
                            <th><input type="text" name="qty" class="form-input w-50"></th>

                            <?php 
                            $ip = getIPAddress();
                            if (isset($_POST['update_cart'])) {
                                $quantities = $_POST['qty'];
                                $update_cart = "UPDATE `cart_details` SET quantity = '$quantities' 
                                WHERE ip_address='$ip'";
                                $result_product_qty = mysqli_query($con, $update_cart);
                                $total_price = $total_price * $quantities;
                            }
                            
                            ?>
                            <th>&#8358;<?php echo $price_table;?></th>
                            <th><input type="checkbox" name="removeitem[]" value="<?php 
                            echo $product_id; ?>"></th>
                            <th>
                                <!-- <button class="bg-info  p-2 border-0">Update</button> -->
                                <input type="submit" value="Update Cart" class="bg-info  
                                p-2 border-0" name="update_cart">
                            </th>
                            <th>
                                <!-- <button class="bg-danger  p-2 border-0 ">Remove</button> -->
                                <input type="submit" value="Remove Cart" class="bg-danger  
                                p-2 border-0" name="remove_cart">
                            </th>
                            
                        </tr>
                        <?php     }
                                } 
                            }else {
                                echo "<h2 class = 'text-danger text-center'> Cart is Empty</h2>";
                            }
                        ?>
                    </tbody>
                </table>

                <!-- subtotal -->
                <div class="d-flex mb-5">
                <?php
                            $ip = getIPAddress();
                            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                            $result_cart = mysqli_query($con, $cart_query);
                            $result_rows = mysqli_num_rows($result_cart);
                            if ($result_rows > 0) {
                                echo "<h4 class='p-3'>Subtotal: <strong class='text-info'>&#8358;$total_price </strong></h4>
                                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                                <button class='bg-secondary  px-3 py-4 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";

                             }else {
                                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                             }

                             if (isset($_POST['continue_shopping'])) {
                                echo "<script> window.open('index.php', '_self') </script>";
                             }

                             ?>
                </div>
            </div>
        </div>
        </form>

        <!-- function to remove item -->
        <?php
        function removeCartItem(){
            global $con;
            if (isset($_POST['remove_cart'])) {
               foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
                $result_delete_query = mysqli_query($con, $delete_query);
                if ($result_delete_query) {
                   echo "<script>window.open('index.php', '_self')</script>";
                }
               }
            }

        }

        $remove_item = removeCartItem();

        ?>

        <!-- last child -->
       <!-- include footer -->
       <!-- <?php include('./includes/footer.php'); ?> -->
  </div>
    
<!-- Bootstap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
</body>
</html>