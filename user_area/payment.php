<?php include('../includes/connect.php'); 
 include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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
    <style>
        img{
            width: 90%;
            height: 500px;
            margin: auto;
            display: block;
            object-fit: contain;
        }
    </style>
</head>
<body>
    
            <!-- php code to access user id -->
            <!-- user ip should be un comment during development and be replace with username -->
    <?php
    // $user_ip = getIPAddress();
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
    $result_user = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_assoc($result_user);
    $user_id = $run_query['user_id'];

    ?>
    <div class="container mt-5 mb-5">
        <h2 class="text-center text-info">Payment Methods</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target ="_blank"><img src="../images/pay.jpg" alt="" class="pay_img"></a>
            </div> 
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id; ?>" class="text-info"><h2 class="text-center">Pay Offline</h2></a>
            </div>     
        </div>
    </div>
    
</body>
</html>