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
    <!------------------- sidebar ---------------------->
    <div class="sidebar d-flex flex-column flex-shrink-0 pt-5 px-0 px-md-3 fw-bold">
        <ul class="nav nav-pills flex-column mb-auto mt-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">
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
                <a class="nav-link" href="./adminBalanceReq.php">
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
                <a class="nav-link" href="./adminFeedback.php">
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

        <!-- dashboard -->
        <div class="container-fluid bg-yellow-light text-center pb-5">
            <div class="mb-3">
                <img src=" ./Pictures/chefs-removebg-preview.png" class="img-fluid" alt="...">
            </div>
            <div>
                <button type=" button" class="btn btn-dashboard bg-green px-5 pt-3 pb-4 mx-2 mx-md-5 rounded-4"><a
                        href="./adminItemsList.html" class="text-white"><i
                            class="bi bi-menu-down fs-1"></i></a></button>
                <button type="button" class="btn btn-dashboard bg-red px-5 pt-3 pb-4 mx-2 mx-md-5 rounded-4"><a href=""
                        class="text-white"><i class="bi bi-wallet2 fs-1"></i></a></button>
                <button type="button" class="btn btn-dashboard bg-blue px-5 pt-3 pb-4 mx-2 mx-md-5 rounded-4"><a
                        href="./adminFeedback.html" class="text-white"><i
                            class="bi bi-envelope-open fs-1"></i></a></button>
            </div>
        </div>

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