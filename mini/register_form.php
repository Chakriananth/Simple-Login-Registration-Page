<?php

include 'config.php';

if(isset($_POST['submit'])){

   $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
   $Email_id = mysqli_real_escape_string($conn, $_POST['Email_id']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $select = " SELECT * FROM pro WHERE Email_id = '$Email_id' && password = '$password' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{
         $insert = "INSERT INTO pro(student_name, Email_id, password) VALUES('$student_name','$Email_id','$password')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="style.css">
   <script type="text/javascript">
      var password=document.getElementByid("pass"),confirm_password=document.getElementByid("confirm");
       function validate()
       {
        if(password.value!=confirm_password.value)
        {
            confirm_password.setCustomValidity("password mismatch");
        }
        else{
            confirm_password.setCustomValidity('');
        }
       }
       password.onchange=validate;
       confirm_password.onkeyup=validate;
   </script>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="student_name" required placeholder="enter your name">
      <input type="email" name="Email_id" pattern="['s'][1][7][0-9]{4}@rguktsklm.ac.in$" placeholder="enter your email"required>
      <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"placeholder="enter your password"required>
      <input type="password" name="confirm" required placeholder="confirm your password"required>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>