<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $Email_id = mysqli_real_escape_string($conn, $_POST['Email_id']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);

   $select = " SELECT * FROM pro WHERE Email_id = '$Email_id' AND password='$password'";

   $result = mysqli_query($conn, $select);
   $rows=mysqli_num_rows($result);
      if($rows==1){
      header("location:hell.html");
   }
     else
     {
      echo"incorrect email or password!";
   }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="Email_id" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>