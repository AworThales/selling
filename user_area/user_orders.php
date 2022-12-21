<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
    $user_result = mysqli_query($con, $get_user);
    $fetch_row = mysqli_fetch_assoc($user_result);
    $user_id = $fetch_row['user_id'];

    ?>
    <h3 class="text-success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>S/N</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Payment Stage</th>
                <th>Status</th>
        </tr>
        <tbody class = "bg-secondary text-light">
            <?php
            $get_order_details = "SELECT * FROM `user_orders` WHERE user_id ='$user_id'";
            $order_result = mysqli_query($con, $get_order_details);

            $number = 1;
            while ($row_data = mysqli_fetch_assoc($order_result)) {
                $order_id = $row_data['order_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                if ($order_status == 'pending') {
                    $order_status = '<span class="bg-danger">Incomplete</span>';
                }else {
                    $order_status = '<span class="bg-success">Complete</span>';
                }
                echo "<tr>
                <th>$number</th>
                <th>$amount_due</th>
                <th>$total_products</th>
                <th>$invoice_number</th>
                <th>$order_date</th>
                <th>$order_status</th>";
            ?>
            <?php 
            if ($order_status == '<span class="bg-success">Complete</span>') {
                echo "<th class='bg-success'>Paid</th>";
            }else {
                echo "<th><a href='confirm_payment.php?order_id=$order_id' class='text-light bg-primary'>Pay Now</a></th>
                </tr>";
            }   
            $number++;

            }

            ?>

        </tbody>
        </thead>
    </table>
</body>
</html>