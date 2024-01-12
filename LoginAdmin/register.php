<?php

include '../config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));

   $select_admin = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_admin) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `admin`(Id_daisy,nama, email, password) VALUES(1,'$name', '$email', '$cpass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login_Admin.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-dark-subtle">

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message">
                <span>' . $message . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>

    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <h3 class="mb-4">Register Now</h3>
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Enter your name" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Enter your email" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Enter your password" required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="cpassword" placeholder="Confirm your password" required
                            class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
                    <p class="mt-3">Already have an account? <a href="login_Admin.php">Login Now</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>