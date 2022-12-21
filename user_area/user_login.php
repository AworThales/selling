<?php include('../includes/connect.php'); 
 include('../functions/common_function.php');
 @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
    <div class="container-fluid my-5">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex alight-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                      <!-- username filed -->
                    <div class="form-outline ">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" 
                        placeholder="Enter Your Username" autocomplete="off" required="required" />
                    </div>
                    <!-- password filed -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" 
                        placeholder="Enter Your Password" autocomplete="off" required="required" />
                    </div>
                    <div>
                        <input type="submit" name="user_login" value="Login" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if (isset($_POST['user_login'])) {
   $user_username = $_POST['user_username'];
   $user_password = $_POST['user_password'];
   
   $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
   $result = mysqli_query($con, $select_query);
   $count_rows = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);

   if ($count_rows > 0 && password_verify($user_password, $row_data['user_password'] )) {
    $_SESSION['username'] = $row_data['username'];
    $_SESSION['admin'] = $row_data['admin'];
    if ($_SESSION['admin']) {
        echo "<script>alert('Logged In successful') </script>";
        echo "<script>window.open('../admin_area/index.php', '_self') </script>";
        
    } else {
        echo "<script>alert('Logged In successful') </script>";
        echo "<script>window.open('profile.php', '_self') </script>";
    }       
    exit();
   }else {
        echo "<script>alert('Invalid Credentials') </script>";
       }

//    $user_ip = getIPAddress();
   
// //    cart Item
// $select_cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
// $result_cart = mysqli_query($con, $select_cart_query );
// $count_rows_cart = mysqli_num_rows($result_cart);

//    if ($count_rows > 0) {
//         $_SESSION['username'] = $user_username;
//         if (password_verify($user_password, $row_data['user_password'] )) {
//             // echo "<script>alert('Logged In successful') </script>";
//             if ($count_rows == 1 AND $count_rows_cart == 0) {
//                 $_SESSION['username'] = $user_username;
//                 echo "<script>alert('Logged In successful') </script>";
//                 echo "<script>window.open('profile.php', '_self') </script>";
//             }else {
//                 $_SESSION['username'] = $user_username;
//                 echo "<script>alert('Logged In successful') </script>";
//                 echo "<script>window.open('payment.php', '_self') </script>";
//             }
//         }else {
//             echo "<script>alert('Invalid Credentials') </script>";
//         }
//    }else {
//     echo "<script>alert('Invalid Credentials') </script>";
//    }
}

?>