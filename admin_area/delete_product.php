<?php

if (isset($_GET['delete_product'])) {
   $delete_id = $_GET['delete_product'];
   $delete_product = "DELETE FROM `products` WHERE product_id = $delete_id";
   $result = mysqli_query($con, $delete_product);
   if ($result) {
    echo "<script>alert('Product Deleted successfully')</script>";
    echo "<script>window.open('./index.php?view_products', '_self')</script>";
   }

}

?>
