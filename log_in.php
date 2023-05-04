<?php
session_start();
if (isset($_GET['logOut'])) {
  session_destroy();
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
      <form class="form" action="verification.php" method="post">
        <h1>LOGIN</h1>
        <input type="text" name="userId" placeholder="User name" id="username" autocomplete="off">
        <input type="password" name="password" placeholder="Password" id="pass">
        <label class="para-2">Show password <input type="checkbox" onclick="myfunction()"></label>
        <input type="submit" value="Log In">
        
        <p class="para-2">
            Do not have an account? <a href="sign_up.php">Sign Up</a>
        </p>
      </form>
    </div>
    </div>
  </div>
  <script src="./JS/valid.js"></script>
</body>
</html>
