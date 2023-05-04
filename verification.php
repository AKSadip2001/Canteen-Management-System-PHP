<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    if (empty($userId) || empty($password)) {
      echo '<script>
              window.location.href = "log_in.php";
              alert("Enter your credentials!")
            </script>';
    }
    else{
      include 'connection.php';

      $sql = "SELECT count(*) as Result FROM `credential` WHERE `credential`.userId='$userId' and `credential`.password='$password';";
      $result = $db->query($sql);

      $row = $result->fetch_assoc();
      $data = $row['Result'];
      if($data[0]=='1'){
        session_start();
        $_SESSION['userId'] = $userId;

        header("Location:adminDashboard.php");
      }
      else{
        $sql = "SELECT count(*) as Result FROM `customer` WHERE `customer`.userId='$userId' and `customer`.password='$password';";
          $result = $db->query($sql);
          $row = $result->fetch_assoc();
          $data = $row['Result'];
          if($data[0]=='1'){
            header("Location:customerView.php");
          }
          else{
            echo '<script>
                    window.location.href = "log_in.php";
                    alert("Login failed!")
                  </script>';
          }
      }
    }
    session_start();
    $_SESSION['userId'] = $userId;
}
?>