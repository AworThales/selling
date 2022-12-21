<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-success text-center">ORDERS HISTORY</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            
        <?php
            $select = "SELECT * FROM `user_orders`";
            $result = mysqli_query($con, $select);
            $count_rows = mysqli_num_rows($result);
               
            if ($count_rows == 0) {
                echo "<h2 class= 'text-danger text-center mt-5'>No Order Yet!</h2>";
            }else {
                echo " <tr>
                <td>S/N</td>
                <td>Due Amount</td>
                <td>Invoice Number</td>
                <td>Total Products</td>
                <td>Order Date</td>
                <td>Status</td>
                <td>Delete</td>
            </tr>
        </thead>";
                $number = 0;
                while ($data = mysqli_fetch_assoc($result)) {
                    $order_id = $data['order_id'];
                    $user_id = $data['user_id'];
                    $amount_due = $data['amount_due'];
                    $invoice_number = $data['invoice_number'];
                    $total_products = $data['total_products'];
                    $order_date = $data['order_date'];
                    $order_status = $data['order_status'];
                    if ($order_status == 'pending') {
                        $order_status = '<span class="bg-warning">Pending</span>';
                    }else {
                        $order_status = '<span class="bg-success">Completed</span>';
                    }
                    $number++;

                    echo "<tbody class='bg-secondary text-light'>
                    <tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$invoice_number</td>
                        <td>$total_products</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='index.php?delete_order=$order_id'
                         type='button' class='text-light' data-toggle='modal' 
                        data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                                   
                    </tr>";
                }
            }
                
            

            ?>
<!-- <td><a href='index.php?delete_order=$order_id' class='text-light'><i class='fa-solid 
                    fa-trash'></i></a></td>  -->
        </tbody>
    </table>
   
</body>
</html>

<!-- <h3 class="text-success text-center">ALL ORDERS</h3>
    <table class="table table-bordered mt5">
        <thead class="bg-info">
            <tr>
                <td>S/N</td>
                <td>Due Amount</td>
                <td>Invoice Number</td>
                <td>Total Products</td>
                <td>Order Date</td>
                <td>Status</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

            <?php
            $select = "SELECT * FROM `user_orders`";
            $result = mysqli_query($con, $select);
            $number = 0;
            while ($data = mysqli_fetch_assoc($result)) {
                $amount_due = $data['amount_due'];
                $invoice_number = $data['invoice_number'];
                $total_products = $data['total_products'];
                $order_date = $data['order_date'];
                $status = $data['order_status'];
                $number++;
                
            

            ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $amount_due; ?></td>
                <td><?php echo $invoice_number; ?></td>
                <td><?php echo $total_products; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $status; ?></td>
                <td><a href='index.php?delete_order=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid 
                    fa-trash'></i></a></td>
            </tr>
            <?php  } ?>
        </tbody>
    </table> -->


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are You Sure You Want To Delete This?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_order=<?php echo $order_id?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>