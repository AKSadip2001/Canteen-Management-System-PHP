<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


include 'connection.php';

if(isset($_POST['add'])){
    $target = "./Pictures/Food/".basename($_FILES['image']['name']);
    $foodName = $_POST['name'];
    $foodPrice = $_POST['price'];

    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO menu (foodName, foodPrice, foodImage) VALUES ('$foodName', '$foodPrice', '$image')";
    mysqli_query($db, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo '<script>alert("Item added!")</script>';
        header("Refresh:0");
    }
    else{
        echo '<script>alert("Item failed to add...")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="./CSS/adminDashboard.css">
</head>
<body class="d-flex">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center">
                        <div hidden="hidden">
                            <input type="text" name="sNo"
                                class="form-control border-0 border-bottom rounded-0 sNo" id="sNo"
                                aria-describedby="emailHelp">
                        </div>
                        <div class=" mb-4 w-100">
                            <h6>Food Name</h6>
                            <input type="text" name="eName"
                                class="form-control border-0 border-bottom rounded-0 eName" id="eName"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4 w-100">
                            <h6>Food Price</h6>
                            <input type="text" name="ePrice" placeholder="Food Price"
                                class="form-control border-0 border-bottom rounded-0 ePrice" id="ePrice"
                                aria-describedby="emailHelp">
                        </div>
                        <button class="btn text-light btn-lg px-5 btn-add" id="btn_add">Update</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 pt-5 px-0 px-md-3 fw-bold">
        <ul class="nav nav-pills flex-column mb-auto mt-3">
            <li class="nav-item">
                <a class="nav-link" href="./adminDashboard.php">
                    <i class="bi bi-house-door fs-5 me-2"></i>
                    <span class="d-none d-md-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">
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

        <main class="item-list-container py-5">

            <h1 class="mb-3 fw-bold text-center"><i class="bi bi-card-checklist fs-1"></i> Add item</h1>

            <!-- add item form -->
            <div class="bg-white shadow-lg rounded-3 col-12 col-sm-10 col-md-8 border px-3 px-md-5 py-5 mx-auto mb-5">
                <form class="d-flex flex-column align-items-center" method="post" action="adminItemsList.php" enctype="multipart/form-data" autocomplete="off">
                    <div class=" mb-3 w-100">
                        <input type="text" name="name" placeholder="Food Name"
                            class="form-control border-0 border-bottom rounded-0" id="exampleInputName"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 w-100">
                        <input type="text" name="price" placeholder="Food Price"
                            class="form-control border-0 border-bottom rounded-0" id="exampleInputPrice"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 w-100">
                        <input type="file" name="image"
                            class="form-control border-0 border-bottom rounded-0 label" id="exampleInputPhotoURL"
                            aria-describedby="emailHelp">
                    </div>
                    <input  type="submit" value="Add" name="add" class="btn text-light btn-lg px-5 btn-add">
                </form>
            </div>

            <h1 class="pt-5 mb-3 fw-bold text-center"><i class="bi bi-card-checklist fs-1"></i> List of items available</h1>

            <!-- list table -->
            <div class="bg-white shadow-lg rounded-3 col-12 col-md-10 px-0 px-sm-3 px-md-5 py-5 mx-auto mb-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col-1">Food ID</th>
                            <th scope="col-3">Food Name</th>
                            <th scope="col-2">Food Price</th>
                            <th scope="col-5">Food Photo URL</th>
                            <th scope="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql = "SELECT * FROM `menu`";
                        $result = mysqli_query($db, $sql);
                        $count = 1;
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr>
                                <th scope="row" class="align-middle">'.$count.'</th>
                                <td class="sNo" hidden="hidden">'.$row['sno'].'</td>
                                <td class="align-middle fName">'.$row['foodName'].'</td>
                                <td class="align-middle fPrice">TK '.$row['foodPrice'].'/-</td>
                                <td class="align-middle fImage">'.$row['foodImage'].'</td>
                                <td>
                                    <i class="btn btn-outline-success bi bi-pencil-square btnEdit" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                    <i class="btn btn-outline-danger bi bi-archive btnDelete"></i>
                                </td>
                            </tr>';
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
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

    
    <!-- js -->
    <script src="./JS/adminItemsList.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>