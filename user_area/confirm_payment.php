connect file
<?php
include('../includes/connect.php'); 
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $select_data = "SELECT * FROM `user_orders` WHERE order_id = '$order_id'";
    $data_result =mysqli_query($con, $select_data);
    $fetch_row = mysqli_fetch_assoc($data_result);
    $invoice_number = $fetch_row['invoice_number'];
    $amount_due = $fetch_row['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, 
    payment_mode) VALUES($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<h3 class='text-center text-success'>Payment Successful</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }

    $update_orders = "UPDATE `user_orders` SET order_status = 'complete' 
    WHERE order_id = '$order_id'";
    $result_update = mysqli_query($con, $update_orders);

}
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
    <link rel="stylesheet" href="../style.css">
</head>
<body class ="bg-secondary">
    <div class="container-fluid my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <div class="row d-flex alight-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                      <!-- username filed -->
                    <div class="form-outline  mb-4 w-50 m-auto ">
                        <label for="invoice_number" class="form-label text-light">Invoice Number</label>
                        <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>" class="form-control"/>
                    </div>
                    <!-- password filed -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="amount" class="form-label text-light">Amount</label>
                        <input type="text" name="amount" value="<?php echo $amount_due; ?>" class="form-control" />
                    </div>
                    <div class="form-outline mb-4 w-100 m-auto">
                        <select name="payment_mode" class="form-select w-50 m-auto">
                            <option>Select payment mode</option>
                            <option>UPI</option>
                            <option>Netbanking</option>
                            <option>Paypal</option>
                            <option>Cash on Delivery</option>
                            <option>Pay Offline</option>
                        </select>
                    </div>
                    <div class="mb-4 w-50 m-auto">
                        <input type="submit" name="confirm_payment" value="Confirm Payment" class="bg-info py-2 px-3 border-0 text-light">
                    </div>

                </form>
            </div>
        </div>
    </div>

    
    
</body>
</html>