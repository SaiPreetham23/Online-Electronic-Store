<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];

   $message = []; // Initialize an empty array for messages

   // Validate name: only letters and spaces allowed
   if(!preg_match("/^[a-zA-Z ]+$/", $name)){
      $message[] = 'Username can only contain letters and spaces.';
   }

   // Validate email format and additional characters (letters, numbers, dots, underscores, and hyphens)
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message[] = 'Invalid email format.';
   } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      $message[] = 'Email format is not allowed.';
   }

   // Validate password and confirm password match
   if($pass != $cpass){
      $message[] = 'Confirm password does not match.';
   }

   // If no validation errors, proceed with registration
   if(empty($message)){
      // Check if the email already exists
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);

      if($select_user->rowCount() > 0){
         $message[] = 'Email already exists!';
      } else {
         // Hash the password (you can use more secure methods than sha1)
         $hashed_password = sha1($pass);

         // Insert user into database
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $hashed_password]);

         $message[] = 'Registered successfully! Please login now.';
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
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">
   <div class="container">
      <?php
      if(isset($message)){
         if(is_array($message)) {
            foreach($message as $msg){
               echo '<div class="message">' . $msg . '</div>';
            }
         } else {
            echo '<div class="message"> </div>';
         }
      }
      ?>
      <form action="" method="post">
         <h3>Register Now</h3>
         <input type="text" name="name" required placeholder="Enter your username" maxlength="20" pattern="[a-zA-Z ]+" title="Username can only contain letters and spaces." class="box">
         <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="box">
         <input type="password" name="pass" required placeholder="Enter your password" maxlength="20" class="box">
         <input type="password" name="cpass" required placeholder="Confirm your password" maxlength="20" class="box">
         <input type="submit" value="Register Now" class="btn" name="submit">
         <p>Already have an account?</p>
         <a href="user_login.php" class="option-btn">Login Now</a>
      </form>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
