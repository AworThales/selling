<?php
include('includes/connect.php'); 
include('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
</head>
<body>
    <div class="container-fluid my-5">
        <h2 class="text-center text-info">Contact Form</h2>
        <p class="text-center">Send us a message by filling the form below.</p>
        <div class="row d-flex alight-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="contact.php" method="post">
                      <!-- username filed -->
                    <div class="form-outline ">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" 
                        placeholder="Enter Your Name" autocomplete="off" required="required" />
                    </div>
                    <div class="form-outline ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" 
                        placeholder="Enter Your Email" autocomplete="off" required="required" />
                    </div>
                    <div class="form-outline ">
                        <label for="mobile" class="form-label">Mobile Numbe</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" 
                        placeholder="Enter Your Mobile Number" autocomplete="off" required="required" />
                    </div>
                    <!-- password filed -->
                    <div class="form-outline mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" cols="0" rows="4" 
                        placeholder="Write your message here..." required="required"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="send" value="Send Message" class="bg-info py-2 px-3 border-0">
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $description = $_POST['description'];

    $select = "INSERT INTO `contact` (name, email, mobile, description) 
    VALUES ('$name', '$email', $mobile, '$description')";
    $result = mysqli_query($con, $select);
    if ($result) {
        echo "<script>alert('Message sent successfully') </script>";
        echo "<script>window.open('index.php', '_self') </script>";
    }


}


?>