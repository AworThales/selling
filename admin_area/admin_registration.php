<?php include('../includes/connect.php'); 
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
        <!-- Bootstrap css Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
 
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Styling -->
    <link rel="stylesheet" href="../style.css">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <img src="../images/admin.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-lable">Username</label>
                    <input type="text" name="username" id="username" 
                    placeholder="Enter Your Username" class="form-control" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-lable">Email</label>
                    <input type="email" name="email" id="email" 
                    placeholder="Enter Your Email" class="form-control" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-lable">Password</label>
                    <input type="password" name="password" id="password" 
                    placeholder="Enter Your Password" class="form-control" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-lable">Confirm Password</label>
                    <input type="password" name="c_password" id="c_password" 
                    placeholder="Confirm Password" class="form-control" required="required">
                </div>
                <div>
                    <input type="submit" name="admin_registration"  
                    class="bg-info border-0 py-2 px-3" value="Register">
                    <p class="small mt-3 fw-bold">Already Have An Acoount? <a href="admin_login.php" 
                        class="link-danger text-decoration-none">Login</a></p>
                </div>
               </form>
            </div>
            
            
        </div>
        
    </div>
    
</body>
</html>

<?php

if (isset($_POST['admin_registration'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_hash = password_hash($password, PASSWORD_DEFAULT);
   $c_password = $_POST['c_password'];

//    if ($username == '' OR $email == '' OR $password == '' OR $c_password == 0) {
//     echo "<script>alert('Please fill all the fields to proceed')</script>"
//    }
    $email_query = "SELECT * FROM admin_table WHERE admin_username = '$username' 
    OR admin_email = '$email'";
    $result_email = mysqli_query($con, $email_query);
    $email_count = mysqli_num_rows($result_email);
    if ($email_count > 0) {
        echo "<script>alert('Username or Email Already exist') </script>";
    }elseif ($password != $c_password) {
        echo "<script>alert('Password Do Not Match') </script>";
    }else {
        $insert = "INSERT INTO admin_table (admin_username, admin_email, admin_password) 
        VALUES('$username', '$email', '$password_hash')";
        $result = mysqli_query($con, $insert);
        if ($result) {
           echo "<script>alert('You Have Successfully Register')</script>";
        }
    }
    
   }




?>