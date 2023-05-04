<?php
include 'connection.php';

session_start();

if(!isset($_SESSION['userId'])){
  header('Location: log_in.php');
}

$userId = $_SESSION['userId'];
$_SESSION['userId'] = $userId;

$sql = "SELECT userBalance FROM `customer` WHERE userId='$userId'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/customerMenu.css">
    <script src="https://kit.fontawesome.com/babd782b9c.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Orders List</h4>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead class="table" style="background-color: #b8161e; color: white;">
                <tr>
                  <th scope="col">Order#</th>
                  <th scope="col">Items</th>
                  <th scope="col">Bill</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql2 = "SELECT * FROM `orders` WHERE userId='$userId' ORDER BY orderTime DESC";
                $result2 = mysqli_query($db, $sql2);
                $status = "";
                while($row2 = mysqli_fetch_array($result2)){
                  if($row2['status']=="0"){
                    $status="Pending";
                  }
                  else{
                    $status="Delivered";
                  }
                  $values = explode(',', $row2['itemNames']);
                  echo '<tr>
                          <td>'.$row2['orderId'].'</td>
                          <td>';
                          foreach ($values as $x) {
                            echo $x;
                            echo '<br>';
                          }
                          echo 
                          '</td>
                          <td>'.$row2['totalBill'].'</td>
                          <td>'.$status.'</td>
                        </tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=""><i class="fa-solid fa-utensils"></i>CMS</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="customerView.php">Home</span></a>
        <a class="nav-item nav-link" href="customerView.php#about">About</span></a>
        <a class="nav-item nav-link active" href="">Menu</a>
        <a class="nav-item nav-link" href="customerFeedback.php">Feedback</a>
      </div>
    </div>
    <span class="orders" data-bs-toggle="modal" data-bs-target="#exampleModal">Orders <i class="fas fa-chevron-down"></i></span>
    <span class="balance" id="balance">Balance: <?php echo $row['userBalance'] ?> <i class="fas fa-plus-circle addBtn" onclick="addBal()"></i></span>
    <a href="log_in.php?logOut=true" onclick="sessionStorage.clear()"><i class="fa-solid fa-arrow-right-from-bracket sign_out"></i></a>
  </nav>

  <section class="food-menu">
    <div class="main_container">
      <h2 class="text-center">Items</h2>
      <div class="content row">
          <?php
          $sql = "SELECT * FROM `menu`";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)){
              echo '<div class="food-menu-box">
                      <div class="food-menu-img">
                          <img src="./Pictures/Food/'.$row['foodImage'].'" class="img-responsive img-curve">
                      </div>
      
                      <div class="food-menu-desc">
                          <h4 class="productname">'.$row['foodName'].'</h4>
                          <p class="price">TK '.$row['foodPrice'].'/-</p>
                          <button class="addtocart">Add To Cart</button>
                      </div>
                  </div>';
          }
          ?>
      </div>
    </div>
    
    <div class="cart-container">
        <div class="cart">
          <h2>Cart</h2>
          <table>
            <thead>
              <tr>
              <th><strong>Product</strong></th>
              <th><strong>Price</strong></th>
            </tr>
            </thead>
            <tbody id="carttable">
            </tbody>
          </table>
          <hr>
          <table id="carttotals">
            <tr>
              <td><strong>Items</strong></td>
              <td><strong>Total</strong></td>
            </tr>
            <tr>
              <td>x <span id="itemsquantity">0</span></td>
            
              <td>Tk <span id="total">0</span></td>
            </tr></table>

            
          <div class="cart-buttons">  
            <button id="emptycart">Empty Cart</button>
            <button id="checkout">Checkout</button>
          </div>
          <div id="alerts"></div>
        </div>
    </div>

  </section>

    

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

<script src="./JS/app.js"></script>
<script>
  function addBal(){
    bal = parseInt(prompt("Enter amount to be added: "));
    $.ajax({
      type: "POST",
      url: "reqBalance.php",
      data:{
          bal: bal
      },
      success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==1){
              alert("Balance request send!");
          }
          else{
              alert("You have already requested for balance.");
          }
      }
    });
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>