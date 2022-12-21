<?php
if (isset($_GET['delete_contact'])) {
    $del_id = $_GET['delete_contact'];
    $delete_contact = "DELETE FROM contact WHERE form_id =$del_id";
    $result = mysqli_query($con, $delete_contact);
    if ($result) {
       echo "<script>alert('Contact Deleted Successfully')</script>";
       echo "<script>window.open('index.php?list_contact', '_self')</script>";
    }
}
?>