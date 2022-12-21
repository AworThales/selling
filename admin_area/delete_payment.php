<?php
if (isset($_GET['delete_payment'])) {
    $del_id = $_GET['delete_payment'];
    $delete_paymt = "DELETE FROM user_payments WHERE order_id =$del_id";
    $result = mysqli_query($con, $delete_paymt);
    if ($result) {
       echo "<script>alert('Payment Deleted Successfully')</script>";
       echo "<script>window.open('index.php?list_payment', '_self')</script>";
    }
}
?>