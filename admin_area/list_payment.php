<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-success text-center">PAYMENT HISTORY</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            
        <?php
            $select = "SELECT * FROM `user_payments`";
            $result = mysqli_query($con, $select);
            $count_rows = mysqli_num_rows($result);
               
            if ($count_rows == 0) {
                echo "<h2 class= 'text-danger text-center mt-5'>No Payment Recieved Yet!</h2>";
            }else {
                echo " <tr>
                <td>S/N</td>
                <td>Invoice Number</td>
                <td>Amount</td>
                <td>Payment Mode</td>
                <td>Order Date</td>
                <td>Delete</td>
            </tr>
        </thead>";
                $number = 0;
                while ($data = mysqli_fetch_assoc($result)) {
                    $order_id = $data['order_id'];
                    $amount = $data['amount'];
                    $invoice_number = $data['invoice_number'];
                    $payment_mode = $data['payment_mode'];
                    $order_date = $data['date'];
                    $number++;

                    echo "<tbody class='bg-secondary text-light'>
                    <tr>
                        <td>$number</td>
                        <td>$invoice_number</td> 
                        <td>$amount</td>
                        <td>$payment_mode</td>
                        <td>$order_date</td>
                        <td><a href='index.php?delete_payment=$order_id'
                         type='button' class='text-light' data-toggle='modal' 
                        data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                                   
                    </tr>";
                }
            }
            // <td><a href='index.php?delete_payment=$order_id' class='text-light'><i class='fa-solid 
            // fa-trash'></i></a></td> 
            

            ?>

        </tbody>
    </table>
   
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are You Sure You Want To Delete This?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payment"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_payment=<?php echo $order_id;?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>