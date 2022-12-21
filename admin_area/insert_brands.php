<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    $select_query = "SELECT * FROM brands WHERE brand_title ='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand already exist')</script>";
    }else {
        $insert_query = "INSERT INTO brands (brand_title) values('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
           echo "<script>alert('Brand successfully Inserted')</script>";
           echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }

}

?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-50 mb-2 m-auto">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands">
    </div>

    <div class="input-group w-50 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">
       
    </div>
</form>