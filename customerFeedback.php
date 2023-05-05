<?php

include 'connection.php';

session_start();

if(!isset($_SESSION['userId'])){
    header('Location: log_in.php');
}

$userId = $_SESSION['userId'];
$_SESSION['userId'] = $userId;

if(isset($_POST['submit'])){
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $image = $_FILES['image']['name'];

    function feedbackId($type){
        $final_unique_id=$type.time().rand(10,100); 
        return $final_unique_id;
    }
    $feedbackId = feedbackId('FD');

    if($image!=""){
        $sql = "INSERT INTO feedbacks (fdId, userId, subject, message, photo) VALUES ('$feedbackId', '$userId', '$subject', '$message', '$image')";
        mysqli_query($db, $sql);
        
        $target = "./Pictures/Feedback/".basename($image);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            echo '<script>alert("Feedback submitted!")</script>';
        }
        else{
            echo '<script>alert("Feedback failed to submitted...")</script>';
        }
    }
    else{
        $sql = "INSERT INTO feedbacks (fdId, userId, subject, message, photo) VALUES ('$feedbackId', '$userId', '$subject', '$message', 'noImage.jpg')";
        mysqli_query($db, $sql);
        echo '<script>alert("Feedback submitted!")</script>';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/customerFeedback.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/babd782b9c.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/"><i class="fa-solid fa-utensils"></i>CMS</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="customerView.php">Home</span></a>
            <a class="nav-item nav-link" href="customerView.php#about">About</span></a>
            <a class="nav-item nav-link" href="customerMenu.php">Menu</a>
            <a class="nav-item nav-link active" href="">Feedback</a>
          </div>
        </div>
        <a href="log_in.php?logOut=true" onclick="sessionStorage.clear()"><i class="fa-solid fa-arrow-right-from-bracket sign_out"></i></a>
    </nav>

    <div class="main_container">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 class="text-center mt-5 font-weight-bold">Feedback</h1>
                    <hr class="bg-white">
                    <h6 class="text-center">We would love to hear your thoughts, concerns or problems with anything so we can improve!</h6>
                </div>
            </div>
                <form action="customerFeedback.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <label class="col-md-8">Subject* <br>
                            <input type="text" name="subject" id="subject" required placeholder="E.g. Food quality issue" >
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <label class="col-md-8">Message* <br> 
                            <textarea type="text" name="message" id="message" required placeholder="Write you text here" cols="48" rows="5"></textarea>
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <label for="image" class="drop-container col-md-8">Picture (If any)
                            <input type="file" id="image" name="image" >
                        </label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="btn mt-3" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>