<?php
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    $delete = "DELETE FROM categories WHERE category_id = $delete_id";
    $result = mysqli_query($con, $delete);
    if ($result) {
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?view_categories', '_self')</script>";
    }
}

?>