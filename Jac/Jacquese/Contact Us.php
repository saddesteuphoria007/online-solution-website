<?php

include 'config.php';


session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
<link rel="stylesheet" href="css/sty.css">

</head>
<body>

<section class="header" style=" background:url(ban.jpeg); background-repeat: no-repeat;   min-height: 60vh; background-position: center; background-size: cover">
                       <nav>

                <h3>3M</h3>
            
<div class="nav-links">
<ul>
<li><a href="home.php" >Home Page</a></li>
<li><a href="Products.php">Products </a></li>
<li><a href="About Us.php" >About Us</a></li>
<li><a href="Contact Us.php" >Contact Us</a> </li>
<li><a href="Testimonials.php">Testimonials</a></li>
	<li><a href="Cart.php">Cart</a></li>
</ul>
</div>
</nav>

    <div class="text-box">



<p style="color:white"> Contact us we'll get back to you soon.
</p>
</div>
</section>



  <section class="About">


          <h2><span class="ab">Deli</span>very</h2>
<p> We Serve The People</p>
      
          <div class="row">
 
   <div class="col">
 
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3580.1263883140314!2d28.031313574509788!3d-26.192566563498477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950b9300000001%3A0x335d35f228da3ccd!2sRosebank%20College%20%7C%20Braamfontein%20Campus!5e0!3m2!1sen!2sza!4v1698885410248!5m2!1sen!2sza" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     

 </div>

               <div class="col">
			   <section class="contact">
 <form  action="" method="post">
      <h3>Hi say something !</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>

</section>
 </div>
 </div>
          
    </section>










 <section class="footer">

<br />
          <br /><h2><span class="ab">3M</span> Network</h2>
<p> Order Now!</p>

<span style="color:darkblue"><ion-icon name="logo-facebook"></ion-icon></span>
  <span style="color:deeppink">  <ion-icon name="logo-instagram"></ion-icon></span>
     <span style="color:lightblue">   <ion-icon name="logo-twitter"></ion-icon></span>


      </section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>