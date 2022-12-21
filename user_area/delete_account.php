
    <h3 class="text-center text-danger mb-5">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" value="Delete Account" 
            class="form-control w-50 m-auto bg-danger text-light">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="dont_delete" value="Don't Delete Account" 
            class="form-control w-50 m-auto bg-primary text-light">
        </div>

    </form>
    
<?php
$user_session = $_SESSION['username'];
if (isset($_POST['delete'])) {
   $delete_user = "DELETE FROM `user_table` WHERE username = '$user_session'";
   $result = mysqli_query($con, $delete_user);
   if ($result) {
    session_destroy();
    echo "<script>alert('Account Deleted Successfully')</script>";
    echo "<script>window.open('../index.php', '_self')</script>";
   }
}


if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php', '_self')</script>";
}
?>