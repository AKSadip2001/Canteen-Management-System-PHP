<?php
include 'connection.php';

session_start();

if(!isset($_SESSION['userId'])){
  header('Location: log_in.php');
}

$userId = $_SESSION['userId'];
$_SESSION['userId'] = $userId;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/customerView.css">
    <link rel="stylesheet" href="./CSS/owl.carousel.min.css">
    <script src="https://kit.fontawesome.com/babd782b9c.js" crossorigin="anonymous"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="color: white;">
    <span class="navbar-toggler-icon"></span>
  </button>
    <a class="navbar-brand" href=""><i class="fa-solid fa-utensils"></i>CMS</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="">Home</span></a>
        <a class="nav-item nav-link" href="#about">About</span></a>
        <a class="nav-item nav-link" href="customerMenu.php">Menu</a>
        <a class="nav-item nav-link" href="customerFeedback.php">Feedback</a>
      </div>
    </div>
    <a class="order_now" href="customerMenu.php">Order now</a>
    <a href="log_in.php?logOut=true" onclick="sessionStorage.clear()"><i class="fa-solid fa-arrow-right-from-bracket sign_out"></i></a>
  </nav>

  <div class="main_container">
    <div class="content">
        <h3>Eat Tasty Dish Everyday<span></span></h3>
        <h1>Share Your Love<span></span></h1>
        <h1>About Food<span></span></h1>
    </div>
  </div>

  <section id="slider" class="pt-5">
    <div class="container">
      <h1 class="text-center">Today's Special</h1>
      <div class="slider">
          <div class="owl-carousel">
            <?php
            $sql = "SELECT * FROM `menu` WHERE foodImage LIKE '%special%';";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){
              echo '<div class="slider-card">
                      <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="./Pictures/Food/'.$row['foodImage'].'" alt="" >
                      </div>
                      <h5 class="mb-0 text-center"><b>'.$row['foodName'].'</b></h5>
                      <p class="text-center p-4">Tk '.$row['foodPrice'].'/-</p>
                    </div>';
            }
            ?>
          </div>
            
          </div>
        </div>
    </div>
  </section>

  <div class="button">
    <a href="customerMenu.php">View All</a>
  </div>

   <!-- About Section -->
<section id="about">
  <div class="about container">
    <div class="left_content">
      <h1 class="section-title">About <span>us</span></h1>
      <div class="text">
        <p>Welcome to our canteen! We are dedicated to providing you with a variety of 
          delicious and healthy food options to fuel your day. Our canteen is designed to 
          be a convenient and accessible space for you to grab a quick snack or a full meal.</p>
          <br>

          <p>Our menu is carefully crafted to offer a variety of options to suit 
          different tastes and dietary needs. We use only high-quality ingredients 
          and work with trusted suppliers to ensure that our food is fresh and nutritious. 
          We also strive to provide a welcoming and inclusive environment for all of our customers, 
          and we are committed to accommodating any special requests or dietary restrictions.</p>
          <br>
          <p>At our canteen, we believe that good food is essential to a productive 
          and healthy lifestyle. We are always looking for ways to improve and 
          innovate, and we welcome any feedback or suggestions from our customers. 
          Thank you for choosing our canteen, and we look forward to serving you soon!</p>
      </div>
    </div>
    <div class="right_content">
      <img src="./Pictures/Pic_5.png" alt="">
    </div>
  </div>
</section>
<!-- End About Section -->

  <div class="place_order">
    <img src="./Pictures/order.png">
  </div>


  <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Opening hours:</p>
                <p>Sun-Sat 8am-8pm</p>
            </div>
            <div class="col-md-4">
                <p>Independent University, Bangladesh</p>
                <p>Plot 16 Aftab Uddin Ahmed Rd, Dhaka 1229</p>
            </div>
        </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./JS/script.js"></script>
  <script src="./JS/owl.carousel.min.js"></script>
</body>
</html>