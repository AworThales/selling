<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-success text-center">CONTACT MESSAGES HISTORY</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            
        <?php
            $select = "SELECT * FROM `contact`";
            $result = mysqli_query($con, $select);
            $count_rows = mysqli_num_rows($result);
               
            if ($count_rows == 0) {
                echo "<h2 class= 'text-danger text-center mt-5'>No Contact Message Yet!</h2>";
            }else {
                echo " <tr>
                <td>S/N</td>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile Number</td>
                <td>Description</td>
                <td>Delete</td>
            </tr>
        </thead>";
                $number = 0;
                while ($data = mysqli_fetch_assoc($result)) {
                    $form_id  = $data['form_id'];
                    $name  = $data['name'];
                    $email = $data['email'];
                    $mobile = $data['mobile'];
                    $description = $data['description'];
                    $number++;

                    echo "<tbody class='bg-secondary text-light'>
                    <tr>
                        <td>$number</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$mobile</td>
                        <td>$description</td>
                        <td><a href='index.php?delete_contact=$form_id'
                         type='button' class='text-light' data-toggle='modal' 
                        data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>            
                    </tr>";
                }
            }
                
            // <td><a href='index.php?delete_contact=$form_id' class='text-light'><i class='fa-solid 
            //         fa-trash'></i></a></td>

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_contact"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_contact=<?php echo $form_id; ?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>