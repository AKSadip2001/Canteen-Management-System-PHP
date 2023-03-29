<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    if (empty($userId) || empty($password)) {
      echo '<script>alert("Enter your credentials!")</script>';
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
      $sql = "SELECT count(*) as Result FROM `credential` WHERE `credential`.userId='$userId' and `credential`.password='$password';";
      $result = $connection->query($sql);

      $row = $result->fetch_assoc();
      $data = $row['Result'];
      if($data[0]=='1'){
        header("Location:index.php");
      }
      else{
        echo '<script>
          window.location.href = "log_in.php";
          alert("Login failed!")
          </script>';
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
  <title>CMS</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
  <div class="main">
    <div class="main_container">
      <!-- <div class="logo">
      <img src="./assets/Image/logo.png" alt="IUB logo">
      </div> -->
      <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h1>LOGIN</h1>
        <input type="text" name="userId" placeholder="User name" id="username">
        <input type="password" name="password" placeholder="Password" id="pass">
        <label class="para-2">Show password <input type="checkbox" onclick="myfunction()"></label>
        <input type="submit" value="Log In">
        
        <p class="para-2">
            Not have an account? <a href="sign_up.php">Sign Up Here</a>
        </p>
      </form>
    </div>
    </div>
  </div>
  <script src="./JS/valid.js"></script>
</body>
</html>
