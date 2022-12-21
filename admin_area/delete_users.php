<?php
if (isset($_GET['delete_users'])) {
    $del_id = $_GET['delete_users'];
    $delete_users = "DELETE FROM user_table WHERE user_id =$del_id";
    $result = mysqli_query($con, $delete_users);
    if ($result) {
       echo "<script>alert('User Deleted Successfully')</script>";
       echo "<script>window.open('index.php?list_users', '_self')</script>";
    }
}
?>