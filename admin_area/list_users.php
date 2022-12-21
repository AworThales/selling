<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 class="text-success text-center">ALL USERS</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            
        <?php
            $select = "SELECT * FROM `user_table`";
            $result = mysqli_query($con, $select);
            $count_rows = mysqli_num_rows($result);
               
            if ($count_rows == 0) {
                echo "<h2 class= 'text-danger text-center mt-5'>No Users Yet!</h2>";
            }else {
                echo " <tr>
                <td>S/N</td>
                <td>Username</td>
                <td>User Email</td>
                <td>User Image</td>
                <td>User_IP</td>
                <td>User Address</td>
                <td>User Mobile</td>
                <td>Delete</td>
            </tr>
        </thead>";
                $number = 0;
                while ($data = mysqli_fetch_assoc($result)) {
                    $user_id  = $data['user_id'];
                    $username = $data['username'];
                    $user_email = $data['user_email'];
                    $user_image = $data['user_image'];
                    $user_ip = $data['user_ip'];
                    $user_address = $data['user_address'];
                    $user_mobile = $data['user_mobile'];
                    $number++;

                    echo "<tbody class='bg-secondary text-light'>
                    <tr>
                        <td>$number</td>
                        <td>$username</td>
                        <td>$user_email</td>
                        <td> <img src='../user_area/user_images/$user_image' alt='$username'
                        class='user-image'></td>
                        <td>$user_ip</td>
                        <td>$user_address</td>
                        <td>$user_mobile</td>
                        <td><a href='index.php?delete_users=$user_id'
                         type='button' class='text-light' data-toggle='modal' 
                        data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                                  
                                  
                    </tr>";
                }
            }
                
            // <td><a href='index.php?delete_users=$user_id' class='text-light'><i class='fa-solid 
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users"
            class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_users=<?php echo $user_id ?>'
         class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>

</body>
</html>