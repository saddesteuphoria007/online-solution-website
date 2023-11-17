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
   <title>Testimonials</title>

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

<h2></h2>

<p style="color:white"> Frequentlly asked Questions.
</p>

</div>
</section>

      
           <section class="blog-content">
<div class="row">
<div class="blog-left">
<img  src="images/foodpic.jpg"/>
    <h2>Delivered to you on time</h2> 
   

    <p>How does your online food delivery service work?<br />
Our online food delivery service is designed to make ordering your <br />
        favorite meals as convenient as possible. Simply visit our website <br />
        or download our mobile app, browse through the menu of your chosen restaurants, <br />
        select your desired dishes, and add them to your cart. Once you're ready, proceed <br />
        to checkout, provide your delivery address, and choose a payment method.<br /> 
        We'll take care of the rest, ensuring your delicious meal is prepared and <br />
        delivered right to your doorstep.</p><br />

    <p> What areas do you deliver to?<br />

We strive to reach as many hungry customers as possible.<br />
        To find out if we deliver to your area, enter your <br />
        address on our website or app. Our platform will <br />
        a list of available restaurants and delivery options near you.<br />
        We continually expand our delivery coverage, so if we don't currently <br />
        serve your location, keep an eye out for updates.</p><br />
    <p> What safety measures are in place for food handling and delivery during the COVID-19 pandemic?<br />

Your safety and the safety of our restaurant partners and delivery drivers is our top priority.<br />
        We have implemented stringent hygiene and safety measures in line with health guidelines.  <br />      
        Our partner restaurants maintain strict cleanliness standards, and our delivery drivers follow <br />
        contactless delivery protocols. You can trust that we're taking every precaution to ensure a safe <br />
        and enjoyable dining experience for you.</p>
    <div class="comment-box">

	
 </div>
  </div>
 

   

<div class="blog-right">
     <section class="contact">
 <form  action="" method="post">
      <h3>Leave a comment !</h3>
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

</body>
</html>