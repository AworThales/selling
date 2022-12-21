<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_session_name'";
    $result = mysqli_query($con, $select_query);
    $row_fectch = mysqli_fetch_assoc($result);
    $user_id = $row_fectch['user_id'];
    $username = $row_fectch['username'];
    $user_email = $row_fectch['user_email'];
    $user_address = $row_fectch['user_address'];
    $user_mobile = $row_fectch['user_mobile'];
}
    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_tmp_image = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_tmp_image, "./user_images/$user_image");

        $update_data = "UPDATE `user_table` SET username = '$username',
        user_image = '$user_image', user_email = '$user_email', 
        user_address = '$user_address', user_mobile = '$user_mobile'
        WHERE user_id = '$update_id'";
        $result_update = mysqli_query($con, $update_data);

        if ($result_update) {
           echo "<script>alert('Data updated Successfully')</script>";
           echo "<script>window.open('profile.php', '_self')</script>";
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4 mt-4">Edit Account</h3>
    <div class="row d-flex alight-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                  <!-- username filed -->
                <div class="form-outline ">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username"
                    value ="<?php echo $username; ?>" class="form-control" />
                </div>
                <!-- password filed -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="user_email" id="user_email" 
                    value = "<?php echo $user_email; ?>" class="form-control" />
                </div>
                <div class="form-outline mb-4 d-flex">
                    <input type="file" name="user_image" id="user_image" class="form-control m-auto w-100" />
                    &nbsp; <img src="user_images/<?php echo $user_image; ?>" class="edit_image" alt="">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" name="user_address" id="user_address" 
                    value = "<?php echo $user_address; ?>" class="form-control"  />
                </div>
                <!--User mobile filed -->
                <div class="form-outline mb-4">
                    <label for="user_mobile" class="form-label">Mobile Number</label>
                    <input type="text" name="user_mobile" id="user_mobile" 
                    value = "<?php echo $user_mobile; ?>" class="form-control" />
                </div>
                <div>
                    <input type="submit" name="user_update" value="Update Acoount " 
                    class="bg-info py-2 px-3 border-0">
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>