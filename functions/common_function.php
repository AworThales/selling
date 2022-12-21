<?php
// Connection file
// include('./includes/connect.php');

// displaying products
function getProducts()
{
    global $con;
    if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
    $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,6";
    $result_query = mysqli_query($con, $select_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id']; 
        $product_image1 = $row['product_image1'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'><i class='fas fa-cart-plus'></i> Add to card</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
            </div>
        </div>
    </div>";
    }
    }
    }
}


// get all products
function getAllProducts()
{
    global $con;
    if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
    $select_query = "SELECT * FROM `products` ORDER BY RAND()";
    $result_query = mysqli_query($con, $select_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
            </div>
        </div>
    </div>";
    }
    }
    }
}

// get unique categories
function getUniqueCategories()
{
    global $con;
    // condition to check if isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
    $select_query = "SELECT * FROM `products` WHERE category_id = $category_id ";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
        echo "<h2 class = 'text-center text-danger'>No Stock for this category, Please check back later</h2>";
    }
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
            </div>
        </div>
    </div>";
    }
    }
    
}


// get unique Brands
function getUniquebrands()
{
    global $con;
    // condition to check if isset or not
    if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id ";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
        echo "<h2 class = 'text-center text-danger'>This Brand is not Avalable for service Now, Please Try Again Later</h2>";
    }
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
            </div>
        </div>
    </div>";
    }
    }
    
}



// displaying Brands in sidebar
function getBrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data = mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title']; 

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";
    }
   
    
}

// Displaying categories in sidebar 
function getCategories()
{
    global $con;
    $select_cats = "SELECT * FROM categories";
    $result_cats = mysqli_query($con, $select_cats);
    // $row_data = mysqli_fetch_assoc($result_cats);
    // echo $row_data['category_title'];

    while ($row_data = mysqli_fetch_assoc($result_cats)) {
        $cat_title = $row_data['category_title'];
        $cat_id = $row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?category=$cat_id' class='nav-link text-light'>$cat_title</a>
    </li>";
    }
}

// searching products function.
function searchProduct()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
    $search_query = "SELECT * FROM `products` WHERE product_keywords like 
    '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    // $row = mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
       echo "<h2 class = 'text-center text-danger'>No result match, No result found on this category!</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
            </div>
        </div>
    </div>";
    }
}
}


// View Details function
function viewDetails()
{
    global $con;
    if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = number_format($row['product_price'], 2);
        
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: &#8358;$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
        </div>
    </div>
    <div class='col-md-8'>
                        <!-- related card or images -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related products</h4>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>
                    </div>";
    }
    }
    }
}
}


// Get Ip Address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



// // cart function

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' 
        AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
            echo "<script>alert('This Item Has Already Been Added In Your Cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
    }else{
        $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
        VALUES($get_product_id, '$ip', 0)";
        $result_query = mysqli_query($con, $insert_query);
        echo "<script>alert('Item Added to Your Cart')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }

    }
}

// function to get cart item number
function numCartItem(){
    // if this add to cart is active then count the numbers of rows
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    // if this add to cart is not active then count also the numbers of rows
    else{
        global $con;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;

    }


    // Total Price Function
    function totalCartPrice(){
        global $con;
        $ip = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result = mysqli_query($con, $cart_query);
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
            while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = array($row_product_price['product_price']);
                $product_values = array_sum($product_price);
                $total_price += $product_values;
            }
        }
        echo $total_price;
    }

    // get user order details
    function get_user_order_details(){
        global $con;
        $username = $_SESSION['username'];
        $get_details = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result_details = mysqli_query($con, $get_details);
        while ($row_details = mysqli_fetch_array($result_details)) {
            $user_id = $row_details['user_id'];
            if (!isset($_GET['edit_account'])) {
                if (!isset($_GET['my_orders'])) {
                    if (!isset($_GET['delete_account'])) {
                        $get_oders = "SELECT * FROM `user_orders` WHERE user_id = $user_id 
                        AND order_status = 'pending'";
                        $result_orders = mysqli_query($con, $get_oders);
                        $count_orders_rows = mysqli_num_rows($result_orders);
                        if ($count_orders_rows > 0) {
                            echo "<h3 class='text-center text-success mt-5'mb-2>You Have 
                            <span class='text-danger'>$count_orders_rows</span> Pending Oders</h3>
                            <p class='text-center'><a href='profile.php?my_orders' 
                            class='text-dark'>ORDER DETAILS</a></p>";
                        }else {
                            echo "<h3 class='text-center text-success mt-5'mb-2>You have <span 
                            class='text-danger'> 0 </span> pending orders</h3>
                            <p class='text-center'><a href='../index.php' 
                            class='text-dark'>EXPLORE PRODUCTS</a></p>";
                        }
                
        }
    }
    }
        }
       

    }
?>