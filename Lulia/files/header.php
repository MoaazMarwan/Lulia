<?php

include "inc/function.php";


$user_coo = @$_COOKIE['user'];
$login_coo = @$_COOKIE['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lulia Store</title>
  <script src="https://code.jquery.com/jquery-3.6.0.js"!important></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="images/logo.jpg">
</head>
<body>
<div id="header">
        <div id="subheader">
            <div class="container">
              <p>Lulia Shopping Place</p>
              <?php  cart();   ?>
              <div class="cart">My products (<?php total_item(); ?>) : Total price (<?php total_price(); ?>)<?php echo "EG"; ?> :<a href="cart.php">cart</a></div>
            </div>
          </div>
          <!--==Main header==-->
          <nav>
          <div class="logo">
            <a class="logo-1" href="index.php">
              <img src="images/logo.jpg" style="width:100px;position:absolute;margin-left:5px;border-radius:10px;float:left;left:10px;">
            </a>
          </div>
         <ul>
            
            <li class="btn"><span class="fas fa-bars"></span></li>
            <div class="items">
               <li><a href="index.php">Home</a></li>
               <li><a href="#footer">About Us</a></li>
               <li><a href="#footer">Contact</a></li>
               <li><a href="login.php">login</a></li>
               <li><a><?php get_cat()?></a></li>
            </div>
         </ul>
      </nav>
      </div>
      <script>
         $('nav ul li.btn span').click(function(){
           $('nav ul div.items').toggleClass("show");
           $('nav ul li.btn span').toggleClass("show");
         });
      </script>

        <!--==END Main header==-->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.js"
          integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
          crossorigin="anonymous"></script>
          <script src="js/my.js"></script>

</body>
</html>