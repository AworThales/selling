<?php include('../includes/connect.php'); 
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <div class="container-fluid m-5">
        <h2 class="text-center mb-5">Admin Login</h2>
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
                    <label for="password" class="form-lable">Password</label>
                    <input type="password" name="password" id="password" 
                    placeholder="Enter Your Password" class="form-control" required="required">
                </div>
                <div>
                    <input type="submit" name="admin_login"  
                    class="bg-info border-0 py-2 px-3" value="Login">
                    <p class="small mt-3 fw-bold">Dont't Have An Acoount? <a href="admin_registration.php" 
                        class="link-danger text-decoration-none">Register</a></p>
                </div>
               </form>
            </div>
            
            
        </div>
        
    </div>
    
</body>
</html>

<?php
if (isset($_POST['admin_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_table WHERE admin_username = '$username'";
    $result = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    if ($count_rows > 0) {
        $_SESSION['admin'] = $username;
       if (password_verify($password, $data['admin_password'])) {
        $_SESSION['admin'] = $username;
            echo "<script>alert('Logged In successful') </script>";
            echo "<script>window.open('index.php', '_self') </script>";
       }else {
        echo "<script>alert('Invalid Credentials') </script>";
        
       }
    }else {
        echo "<script>alert('Invalid Credentials') </script>";
    }




    
}


?>