<?php
if (isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    $select_category = "SELECT * FROM `categories` WHERE category_id = $edit_id";
    $result = mysqli_query($con, $select_category);
    $row_data = mysqli_fetch_assoc($result);
    $category_title = $row_data['category_title'];
}
if (isset($_POST['update_category'])) {
    $category_title = $_POST['cat_title'];
    if ($category_title == '') {
        echo "<script>alert('Please fill the category fields')</script>";
    }else {
        $update_cat = "UPDATE `categories` SET category_title = '$category_title'
        WHERE category_id ='$edit_id'";
        $update_result = mysqli_query($con, $update_cat);
        if ($update_result) {
            echo "<script>alert('Category Updated Successfully')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self') </script>"; 
        }
    }
}
?>

<div class="container mt-3">
<h2 class="text-center">Edit Categories</h2>
    <form action="" method="post" class="mb-2 text-center">
        <label for="" class="form-label">Category Title</label>
        <div class="input-group w-50 mb-2 m-auto">
            <span class="input-group-text bg-info" id="basic-addon1">
                <i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" value="<?php echo $category_title; ?>"
            aria-label="Categories" aria-describedby="basic-addon1">
        </div>

        <div class="input-group w-50 mb-2 m-auto">
            <input type="submit" class="bg-info border-0 p-2 my-3" name="update_category" value="Update Categories">
        </div>
    </form>
</div>

