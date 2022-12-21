
<?php
if (isset($_GET['edit_products'])) {
   $edit_id = $_GET['edit_products'];
   $get_product = "SELECT * FROM `products` WHERE product_id = '$edit_id'";
   $result = mysqli_query($con, $get_product);
   $row = mysqli_fetch_assoc($result);
   $product_title = $row['product_title'];
   $product_description = $row['product_description'];
   $product_keywords = $row['product_keywords'];
   $category_id = $row['category_id'];
   $brand_id = $row['brand_id'];
   $product_image1 = $row['product_image1'];
   $product_image2 = $row['product_image2'];
   $product_image3 = $row['product_image3'];
   $product_price = $row['product_price'];
   

//    fetching category name
$select_category = "SELECT * FROM `categories` WHERE category_id = '$category_id'";
$result_category = mysqli_query($con, $select_category);
$row_cart = mysqli_fetch_assoc($result_category);
$category_title = $row_cart['category_title'];


//    fetching  brand name
$select_brands = "SELECT * FROM `brands` WHERE brand_id = '$brand_id'";
$result_brand = mysqli_query($con, $select_brands);
$row_brand = mysqli_fetch_assoc($result_brand);
$brand_title = $row_brand['brand_title'];

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">EDIT PRODUCTS</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" 
            value = "<?php echo $product_title; ?>" class="form-control">
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" 
            value = "<?php echo $product_description; ?>" class="form-control">
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" 
            value = "<?php echo $product_keywords; ?>" class="form-control">
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>

                <?php 
                $select_all_carte = "SELECT * FROM `categories`";
                $carte_result = mysqli_query($con, $select_all_carte);
                while ($data = mysqli_fetch_assoc($carte_result)) {
                    $category_id = $data['category_id'];
                    $category_title = $data['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
        
            </select>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php 
                $select_all_brand = "SELECT * FROM `brands`";
                $brand_result = mysqli_query($con, $select_all_brand);
                while ($data = mysqli_fetch_assoc($brand_result)) {
                    $brand_id = $data['brand_id'];
                    $brand_title = $data['brand_title'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>

            </select>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_image1" class="form-label">Product image1</label>
            <div class="d-flex">
            <input type="file" name="product_image1" id="product_image1" 
            class="form-control w-90 m-auto">
            <img src="product_images/<?php echo $product_image1; ?>" class="prod_img">
            </div>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_image2" class="form-label">Product image2</label>
            <div class="d-flex">
            <input type="file" name="product_image2" id="product_image2" 
            class="form-control w-90 m-auto">
            <img src="product_images/<?php echo $product_image2; ?>" class="prod_img">
            </div>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_image3" class="form-label">Product image3</label>
            <div class="d-flex">
            <input type="file" name="product_image3" id="product_image3" 
            class="form-control w-90 m-auto">
            <img src="product_images/<?php echo $product_image3; ?>" class="prod_img">
            </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" 
            value = "<?php echo 'N' . $product_price; ?>">
        </div>
        <div class=" mb-4 w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product " class="btn btn-info mb-3 px-3">
        </div>
    </form>

</div>
</body>
</html>

<!-- editing Product -->
<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    
    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking for field is empty or not
    if ($product_title == '' OR $product_description == '' OR $product_keywords == '' OR 
        $product_category == '' OR $product_brand == '' OR $product_image1 == '' OR 
        $product_image2 == '' OR $product_image3 == '' OR $product_price == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
    }else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // query to update products
        $update_product = "UPDATE `products` SET product_title = '$product_title', 
        product_description = '$product_description', product_keywords = '$product_keywords', 
        category_id = '$product_category', brand_id = '$product_brand', 
        product_image1 = '$product_image1', product_image2 = '$product_image2', 
        product_image3 = '$product_image3', product_price = '$product_price', 
        date = NOW() WHERE product_id = $edit_id";
        $result_update = mysqli_query($con, $update_product);
        if ( $result_update) {
            echo "<script>alert('Product Updated successfully')</script>";
            echo "<script>window.open('./index.php?view_products', '_self') </script>";
        }
    }
}

?> 


