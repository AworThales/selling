<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">ALL CATEGORIES</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr class="text-center">
                <td>S/N</td>
                <td>Category Title</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $query = "SELECT * FROM `categories`";
            $result = mysqli_query($con, $query);
            $number = 0;
            while ($data = mysqli_fetch_assoc($result)) {
                $category_id = $data['category_id'];
                $category_title = $data['category_title'];
                $number++;
            

            ?>
             <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid 
                    fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?php echo $category_id; ?>'
                    type="button" class="text-light" data-toggle="modal" 
                    data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>


            <!-- <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid 
                    fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid 
                    fa-trash'></i></a></td>
            </tr> -->
    <?php }  
    
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_category=<?php echo $category_id; ?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
</body>
</html>