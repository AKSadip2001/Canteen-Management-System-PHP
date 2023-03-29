<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/customerFeedback.css">
    <script src="https://kit.fontawesome.com/babd782b9c.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><i class="fa-solid fa-utensils"></i>CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="customerView.html">Home</span></a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link active" href="">Feedback</a>
          </div>
        </div>
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
            <form action="">
                <div class="row">
                    <div class="col-md-2"></div>
                    <label class="col-md-4">Full Name* <br>
                        <input type="text" id="text" required="" placeholder="AKS">
                    </label>
                    <label class="col-md-4">Phone* <br>
                        <input type="text" id="text" required="" placeholder="01777888899">
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <label class="col-md-8">Subject* <br>
                        <input type="text" id="text" required="" placeholder="Food quality">
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <label class="col-md-8">Message* <br> 
                        <textarea type="text" id="message" required="" placeholder="Write you text here" cols="48" rows="5"></textarea>
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <label for="images" class="drop-container col-md-4">Picture (If any)
                        <input type="file" id="images" accept="image/*" required>
                    </label>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <button class="btn btn-primary col-md-8">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>