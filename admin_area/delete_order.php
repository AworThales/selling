<?php
if (isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];
    $delete_order = "DELETE FROM user_orders WHERE order_id =$delete_id";
    $result = mysqli_query($con, $delete_order);
    if ($result) {
       echo "<script>alert('Order Deleted Successfully')</script>";
       echo "<script>window.open('index.php?list_orders', '_self')</script>";
    }
}
?>