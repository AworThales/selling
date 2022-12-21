<?php include('../includes/connect.php'); 
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
      <!-- Bootstrap css Link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
 
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-4">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex alight-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                      <!-- username filed -->
                    <div class="form-outline ">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" 
                        placeholder="Enter Your Username" autocomplete="off" required="required" />
                    </div>
                     <!-- email filed -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" 
                        placeholder="Enter Your Email" autocomplete="off" required="required" />
                    </div>
                     <!-- image filed -->
                     <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" 
                         required="required" />
                    </div>
                    <!-- password filed -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" 
                        placeholder="Enter Your Password" autocomplete="off" required="required" />
                    </div>
                    <!--Confirm password filed -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" 
                        placeholder="Confirm Password" autocomplete="off" required="required" />
                    </div>
                     <!--User Address filed -->
                     <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" 
                        placeholder="Enter Your Address" autocomplete="off" required="required" />
                    </div>
                    <!--User mobile filed -->
                    <div class="form-outline mb-4">
                        <label for="user_mobile" class="form-label">Mobile Number</label>
                        <input type="text" name="user_mobile" id="user_mobile" class="form-control" 
                        placeholder="Enter Your Phone Number" autocomplete="off" required="required" />
                    </div>
                    <div>
                        <input type="submit" name="user_register" value="Register" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    $_conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $admin = 0;
    $user_ip = getIPAddress(); 
    

   
    // select unique username query
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username' OR user_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $count_rows = mysqli_num_rows($result);
    if ($count_rows > 0) {
        echo "<script>alert('Username or Email Already exist') </script>";
    }elseif ($user_password != $_conf_user_password) {
        echo "<script>alert('Password Do Not Match') </script>";
    }
    
    else {
        // insert query
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    $insert_query = "INSERT INTO `user_table` (username, user_email, 
    user_password, user_image, admin, user_ip, user_address, user_mobile ) VALUES ('$user_username', 
    '$user_email', '$password_hash', '$user_image', '$admin', '$user_ip', '$user_address', '$user_mobile')";
    $sql_execute = mysqli_query($con, $insert_query);
    $row_data = mysqli_fetch_assoc($sql_execute);
    $_SESSION['user_id'] = $row_data['user_id'];
    $_SESSION['username'] = $row_data['username'];
    $_SESSION['admin'] = $row_data['admin'];
    if ($_SESSION['admin']) {
        $_SESSION['username'] = $row_data['username'];
        $_SESSION['admin'] = $row_data['admin'];
        echo "<script>alert('Registration successful') </script>";
        echo "<script>window.open('../admin_area/index.php', '_self') </script>";
        
    } else {
        $_SESSION['username'] = $row_data['username'];
        echo "<script>alert('Registration successful') </script>";
        echo "<script>window.open('user_login.php', '_self') </script>";
    }       
    exit();
   
    
    }
    

    // selecting cart item
    // $select_cart_item = "SELECT FROM ` cart_details` WHERE ip_address = '$user_ip'";
    // $result_cart = mysqli_query($con, $select_cart_item);
    // $count_rows = mysqli_num_rows($result_cart);
    // if ($count_rows > 0) {
    //     $_SESSION['username'] = $user_username;
    //     echo "<script>alert('You Have Items in the cart') </script>";
    //     echo "<script>window.open('checkout.php', '_self') </script>";
    // }else {
    //     echo "<script>window.open('../index.php', '_self') </script>";
    // }

}

?>