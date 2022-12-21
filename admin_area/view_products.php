
    <h3 class="text-center text-success">ALL PRODUCTS</h3>
    <table class="table table-bordered mt5">
        <thead class="bg-info">
            <tr>
                <td>Product Id</td>
                <td>Product Title</td>
                <td>Product Image</td>
                <td>Product Price</td>
                <td>Total Sales</td>
                <td>Status</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_products = "SELECT * FROM `products`";
            $results = mysqli_query($con, $get_products);
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($results)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_image1 = $row_data['product_image1'];
                $product_price = $row_data['product_price'];
                $status = $row_data['status'];
                $number++;
            ?>
                <tr class='secondary text-center'>
                <td><?php echo $number ;?></td>
                <td><?php echo $product_title ;?></td>
                <td><img src='product_images/<?php echo $product_image1 ;?>' class='prod_img'></td>
                <td><?php echo 'N' . $product_price;?></td>
                <td><?php 
                    $get_count = "SELECT * FROM `orders_pending` WHERE product_id = '$product_id'";
                    $count_result = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($count_result);
                    echo $rows_count;
                    ?>
                </td>
                <td><?php echo $status ;?></td>

                <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid 
                    fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_product=<?php echo $product_id; ?>'
                    type="button" class="text-light" data-toggle="modal" 
                    data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
                    
                <!-- <td><a href='index.php?edit_products=<?php echo $product_id; ?> ' class='text-light'><i class='fa-solid 
                fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id; ?> ' class='text-light'><i class='fa-solid 
                fa-trash'></i></a></td> -->
            </tr>

        <?php
            }
           
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_product=<?php echo $product_id; ?> '
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>