<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['send'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $msg = $_POST['msg'];

   $message = []; // Initialize an empty array for messages

   // Validate name: only letters and spaces allowed
   if(!preg_match("/^[a-zA-Z ]+$/", $name)){
      $message[] = 'Name can only contain letters and spaces.';
   }

   // Validate email format
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message[] = 'Invalid email format.';
   }

   // Validate number (optional: you may add additional validation)
   // For example, check if it is numeric and has exactly 10 digits
   if(!preg_match("/^[0-9]{10}$/", $number)){
      $message[] = 'Phone number must be numeric and exactly 10 digits.';
   }

   // Sanitize message (you've already done this)
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   if(empty($message)){
      // Check if the message already exists
      $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
      $select_message->execute([$name, $email, $number, $msg]);

      if($select_message->rowCount() > 0){
         $message[] = 'Message already sent!';
      } else {
         // Insert message into database
         $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
         $insert_message->execute([$user_id, $name, $email, $number, $msg]);

         $message[] = 'Message sent successfully!';
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
   <title>Contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="contact">
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
         <h3>Get in Touch</h3>
         <input type="text" name="name" placeholder="Enter your name" required maxlength="20" pattern="[a-zA-Z ]+"  class="box">
         <input type="email" name="email" placeholder="Enter your email" required maxlength="50" class="box">
         <input type="tel" name="number" placeholder="Enter your number" required pattern="[0-9]{10}"  class="box">
         <textarea name="msg" class="box" placeholder="Enter your message" cols="30" rows="10" required></textarea>
         <input type="submit" value="Send Message" name="send" class="btn">
      </form>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
