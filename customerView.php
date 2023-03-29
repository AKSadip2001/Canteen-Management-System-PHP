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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href=""><i class="fa-solid fa-utensils"></i>CMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="">Home</span></a>
        <a class="nav-item nav-link" href="#">About</a>
        <a class="nav-item nav-link" href="customerFeedback.php">Feedback</a>
      </div>
    </div>
  </nav>

  <div class="main_container">
    <div class="left_content">
        <h3>Eat Tasty Dish Everyday</h3>
        <h1>Share Your Love About Food</h1>
        <button>Order Online</button>
    </div>
    <div class="right_content">
        <img src="./Pictures/Food.png" alt="">
    </div>
  </div>

  <section id="slider" class="pt-5">
    <div class="container">
      <h1 class="text-center"><b>Today's Menu</b></h1>
      <div class="slider">
          <div class="owl-carousel">
            <div class="slider-card">
              <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="./Pictures/Food/sandwich.jpg" alt="" >
              </div>
              <h5 class="mb-0 text-center"><b>Vegetable Sandwich</b></h5>
              <p class="text-center p-4">Tk 50/-</p>
            </div>
            <div class="slider-card">
              <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="./Pictures/Food/Tea.jpg" alt="">
              </div>
              <h5 class="mb-0 text-center"><b>Milk Tea</b></h5>
              <p class="text-center p-4">TK 10/-</p>
            </div>

            <div class="slider-card">
              <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="./Pictures/Food/Coffee.jpg" alt="" >
              </div>
              <h5 class="mb-0 text-center"><b>Coffe</b></h5>
              <p class="text-center p-4">Tk 20/-</p>
            </div>
            <div class="slider-card">
              <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="./Pictures/Food/Samosa.jpg" alt="">
              </div>
              <h5 class="mb-0 text-center"><b>Vegetable Samosa</b></h5>
              <p class="text-center p-4">TK 10/-</p>
            </div>
            
          </div>
        </div>
    </div>
  </section>

  <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Opening hours: Sun-Sat 8am-8pm</p>
            </div>
            <div class="col-md-4">
                <p>Independent University, Bangladesh</p>
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