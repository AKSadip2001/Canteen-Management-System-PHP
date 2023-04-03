<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $userId = $_POST['userId'];
  $userEmail = $_POST['userEmail'];
  $userPassword = $_POST['userPassword'];
  if (empty($userId) || empty($userEmail) || empty($userPassword)) {
    echo "Enter your full details!";
  }
  else{
    $servername = "localhost";
    $username = "username";
    $dbpassword = "";
    $database = "cms";

    $connection = new mysqli($servername, $username, $dbpassword, $database);

    if($connection->connect_error){
      die("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT count(*) as Result FROM `credential` WHERE `credential`.userId='$userId';";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();
    $data = $row['Result'];
    if($data[0]=='1'){
      echo '<script>
        window.location.href = "log_in.php";
        alert("You have already registered.")
        </script>';
    }
    else{
      $sql = "INSERT INTO `credential` (`userId`, `password`, `userEmail`) VALUES ('$userId', '$userPassword', '$userEmail');";
      if($connection->query($sql)==true){
        echo '<script>
        window.location.href = "log_in.php";
        alert("Your sign-up was succesfull!")
        </script>';
      }
      else{
        echo '<script>
        window.location.href = "sign_up.php";
        alert("Your registration failed...")
        </script>';
      }
      
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>CMS</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="./CSS/mdb.min.css" />
    
  </head>
  <body>
    <section class="vh-100" style="background-color: #b8161e;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-9">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                    <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" name="userId" id="form3Example1c" class="form-control" />
                          <label class="form-label" for="form3Example1c">Your IUB ID</label>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email" name="userEmail" id="form3Example3c" class="form-control" />
                          <label class="form-label" for="form3Example3c">Your Email</label>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" name="userPassword" id="form3Example4c" class="form-control" />
                          <label class="form-label" for="form3Example4c">Password</label>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example4cd" class="form-control" />
                          <label class="form-label" for="form3Example4cd">Re-enter password</label>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="Submit" class="btn btn-primary btn-lg" value="Register" style="background-color: #b8161e;">
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex flex-row justify-content-center align-items-center order-1 order-lg-2">
                    <img src="./Pictures/Sign up logo.jpg" class="img-fluid" alt="IUB logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MDB -->
    <script type="text/javascript" src="./assets/js/mdb.min.js"></script>
  </body>
</html>
