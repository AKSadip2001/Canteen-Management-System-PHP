<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="./CSS/adminDashboard.css">
</head>

<body class="d-flex">
<div class="sidebar d-flex flex-column flex-shrink-0 pt-5 px-0 px-md-3 fw-bold">
        <ul class="nav nav-pills flex-column mb-auto mt-3">
            <li class="nav-item">
                <a class="nav-link" href="./adminDashboard.php">
                    <i class="bi bi-house-door fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./adminItemsList.php">
                    <i class="bi bi-menu-down fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./adminBalanceReq.php">
                    <i class="bi bi-wallet2 fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Balance Request</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./adminCustomerOrder.php">
                    <i class="bi bi-view-list fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Customer Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">
                    <i class="bi bi-envelope-open fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Feedbacks</span>
                </a>
            </li>
        </ul>
    </div>

    <!------------------ contents ---------------------->
    <div class="w-100">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-yellow-light fs-5">
            <div class="container px-1 px-sm-5">
                <a class="navbar-brand clr-red fs-2 fw-bolder d-flex align-items-center" href="./adminDashboard.html">
                    <img src="./Pictures/brand-icon.png" alt="Logo" width="36"
                        class="d-inline-block align-text-top me-2">
                    CMS
                </a>
                <div class="d-flex justify-content-center align-items-center">
                    <p class="mb-0 me-1 me-md-3 clr-green fw-medium">Admin</p>
                    <a href="./log_in.php" class="btn btn-outline-success fw-medium" type="submit"><i
                            class="bi bi-person-circle me-2"></i>Log
                        out</a>
                </div>
            </div>
        </nav>

        <main class="item-list-container feedback-container py-5">
            <h1 class="mb-3 fw-bold text-center"><i class="bi bi-envelope-open fs-1"></i> Feedbacks</h1>
            <div class="accordion col-10 col-md-7 mx-auto shadow-lg" id="accordionFlushExample">
                <?php
                include 'connection.php';

                $sql = "SELECT * FROM `feedbacks`";
                $result = mysqli_query($db, $sql);
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    echo '
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#'.$count.'" aria-expanded="false" aria-controls="'.$count.'">
                                <strong>'.$row['subject'].'</strong>
                            </button>
                        </h2>
                        <div id="'.$count.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>User ID - <strong>'.$row['userId'].'</strong></p>
                                <p>Feedback - <strong>'.$row['message'].'</strong></p>
                                <a href="./Pictures/Feedback/'.$row['photo'].'" download class="btn btn-primary">Image</a>
                            </div>
                        </div>
                    </div>';
                    $count++;
                }
                ?>
            </div>
        </main>

        <!-- footer -->
        <footer class="footer py-5">
            <div class="container">
                <div class="d-block d-md-flex justify-content-evenly text-center text-md-start">
                    <div class="mb-5 mb-md-0">
                        <a href="http://www.iub.edu.bd/" class="text-decoration-none fs-5 fw-medium">
                            <i class="bi bi-building"></i>
                            Independent University, Bangladesh</a>
                        <p class="mt-3 ms-4">Opening hours: From Sunday to Saturday 8am-8pm</p>
                    </div>
                    <div>
                        <p class="fs-5 fw-medium mb-3">Contact us</p>
                        <a href="mailto: lamisaferdous19@gmail.com" class="text-decoration-none">
                            <i class="bi bi-envelope"></i>
                            Lamisa Ferdous Ritu</a><br>
                        <a href="mailto: 1910807@iub.edu.bd" class="text-decoration-none">
                            <i class="bi bi-envelope"></i>
                            Tamim Fatema</a><br>
                        <a href="mailto: shadip20023@gmail.com" class="text-decoration-none">
                            <i class="bi bi-envelope"></i>
                            Ashraful Kabir</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>