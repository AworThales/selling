
<?php
// fetching brand from the database
if (isset($_GET['edit_brand'])) {
    $edit_brand_id = $_GET['edit_brand'];
    $select = "SELECT * FROM `brands` WHERE brand_id = ' $edit_brand_id'";
    $result = mysqli_query($con, $select);
    $data = mysqli_fetch_assoc($result);
    $brands_title = $data['brand_title'];
}

// updating brand
if (isset($_POST['update_brand'])) {
   $brands_title = $_POST['brands_title'];
   if ($brands_title == '') {
    echo "<script>alert('Please fill the Brand field')</script>";
    
   }else {
    $update_brand = "UPDATE `brands` SET brand_title = '$brands_title' WHERE brand_id = '$edit_brand_id'";
    $update_result = mysqli_query($con, $update_brand);
    if ($update_result) {
        echo "<script>alert('Brand Successfully Updated')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
        
    }
   }
}

?>

<div class="container mt-3">
<h2 class="text-center">Edit Brand</h2>
    <form action="" method="post" class="mb-2 text-center">
        <label for="" class="form-label">Brand Title</label>
        <div class="input-group w-50 mb-2 m-auto">
            <span class="input-group-text bg-info" id="basic-addon1">
                <i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brands_title" value="<?php echo $brands_title; ?>"
            aria-label="Categories" aria-describedby="basic-addon1">
        </div>

        <div class="input-group w-50 mb-2 m-auto">
            <input type="submit" class="bg-info border-0 p-2 my-3" name="update_brand" value="Update Brand">
        </div>
    </form>
</div>