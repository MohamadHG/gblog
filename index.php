<?php

session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}

require "connect.php";
$user = $_SESSION['user'];
$query1 = "SELECT * FROM posts ORDER BY Pid DESC LIMIT 1";
$lastPost = mysqli_query($con, $query1) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="pics/G_Blog_Logo.png">
  <link rel="stylesheet" href="css/index.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/13ccb33514.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>G-Blog</title>
  <style>
    #addShit:hover {
      background-color: #e4e4e4;
    }
  </style>
</head>

<body style="background-color:rgb(236, 240, 240);padding:0px;">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style="background-color:#804000;font-family:sans-serif;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><span style="color:cyan;">G</span>-Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="mynavbar"> <!-- me-auto in the class to return the a tags to the edges -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" style="border-bottom: 1px solid darkgray;" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
              </svg> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="article.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
              </svg> Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pictures.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
              </svg> Pictures</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutUs.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
              </svg> About Us</a>
          </li>
        </ul>
        <div class="d-flex">
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="addArt.php"> Add Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sub.php">Subscribers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="resetPass.php">Change Password</a>
              </li>
              <li class="nav-item" style="background-color: #708090; border-radius:5px;">
                <a class="btn btn-secondary nav-link" style="color: white;" href="logout.php">Log out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <!--body start-->
  <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12 col-md-12" style="padding:0px;margin:0px;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="pics/index/cc1.jpg" class="d-block w-100" style="background-repeat:no-repeat;background-position: center;background-size: cover;height:600px;width:100%;">
          <div style="background-color: rgba(255, 255, 255, 0.5);color:black;border-radius:30px;" class="carousel-caption d-none d-md-block">
            <h5>Coding!</h5>
            <p>Coffee, code, and conquer the day!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pics/homejpg.jpg" class="d-block w-100" style="background-repeat:no-repeat;background-position: center;background-size: cover;height:600px;width:100%;">
          <div style="background-color: rgba(255, 255, 255, 0.5);color:black;border-radius:30px;" class="carousel-caption d-none d-md-block">
            <h5>Symphony of the Mind</h5>
            <p>In the noise of everyday life, find the melody of mindfulness.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="pics/index/cc2.jpg" class="d-block w-100" style="background-repeat:no-repeat;background-position: center;background-size: cover;height:600px;width:100%;">
          <div style="background-color: rgba(255, 255, 255, 0.5);color:black;border-radius:30px;" class="carousel-caption d-none d-md-block">
            <h5>Computers</h5>
            <p>The computer is incredibly fast, accurate, and stupid; people is unbelievably slow, inaccurate, and brilliant.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>


  <h1 style="text-align: center;border-bottom:1px solid black;margin-bottom:20px;width: 100%;height: 3em;padding:20px 0px 0px 0px;
  border-bottom:0px;background-color:#3eb7ff;border-radius: 0 0 50% 50%/0 100% 80% 100%;">Welcome to G-Blog<br><span>
      <h5 style="margin-left:-165px;">Your Virtual Window</h5>
    </span>
  </h1>

  <div class="container-xxl" style="width:100%;margin:0px;">
    <div class="row g-2 d-flex justify-content-evenly" style="width:100%;padding:0px;margin:0px;">

      <div class="col-xl-8 col-xxl-8 col-lg-8 col-sm-12 col-md-8" style="background-color:white;padding:20px;text-align: justify;width:100%;">
      <?php
      if (mysqli_num_rows($lastPost) > 0) {
        while ($row = mysqli_fetch_assoc($lastPost)) {
          echo "
        <img src=pics/articlesimag/" . $row['imag'] . " style='height:500px;padding:0px;margin:0px 0px 10px 0px;width:100%;'>
      " . $row['article'] . "
      <br><br>
      <p style='color:#797979;text-align:right;'>Published in [" . $row['PublishedDate'] . "]</p>
          ";
        }
      }
      ?>
      </div>

      <div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-12 col-md-3" style="background-color:white;">
        <div class="container mt-3" style="padding:0px;">
          <center>
            <h5>Creator</h5>
          </center>
          <div class="card" style="width:100%;font-size:small;">
            <img class="card-img-top" src="pics/MHG.jpeg" alt="Card image" style="width:100%">
            <div class="card-body" style="padding:10px;background-color:#f2f2f2;">
              <h4 class="card-title">Mohammad<br>Abo Al Ghozlan</h4>
              <p class="card-text">Third year computer science student at Lebanese International University.</p>
            </div>
          </div>
          <br>
          <br>
          <hr><br>
          This blog is made for posting articles about computer science in general, and virtual machine, java, javascript, packet tracer, kotlin, php, database, MySQL, phpmyadmin, python, html5, css3 bootstrap5 and react.
        </div>
      </div>
    </div>
  </div>

  <div id="slimPic"></div>

  <div class="container" style="background-color:white;margin-top:20px;padding:30px;">
    <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Books</h1>
    <hr class="mt-2 mb-5">
    <div class="row g-4 text-center text-lg-start" style="margin:0px;">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/index/cc1.jpg" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">First Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/index/cc2.jpg" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">Second Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/Art4.jpg" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">Third Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/mysql.png" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">Fourth Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/phpp.png" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">Fifth Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card d-block mb-4 h-100" style="width: 18rem;margin:10px;width:100%;">
          <img src="pics/js.jpg" class="card-img-top" alt="..." style="height:13em;">
          <div class="card-body" style="padding:5px;">
            <h5 class="card-title">Sixth Book</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="download.php?file=s.pdf" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
<footer class="bg-dark text-center text-white" style="margin-top:20px;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/Mohamad2074" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Email -->
      <a class="btn btn-outline-light btn-floating m-1" href="mailto:abo.al.ghozlan.mohammad@gmail.com" role="button"><i class="fa fa-envelope"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/mohamadhaitham5" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/mohammad-abo-al-ghozlan-7224b6241" role="button"><i class="fab fa-linkedin-in"></i></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/MohamadHG" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="subscribers.php" method="POST">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Enter your email to recieve updates</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" placeholder="Enter your email e.g: ..@gmail.com" class="form-control" name="subscriber" />
            </div>
          </div>

          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->

    <!-- Section: Text
    <section class="mb-4">
      <p>
        This is my responsive blog website. Built in HTML5, CSS3 and Bootstrap5. This is the home page which displays the last article and its picture and some info about me.
      </p>
    </section>
    Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->

        <div class="mb-4 col-lg-6 col-md-6 mb-4 mb-md-0">
          <p>
            This is my responsive blog website. Built in HTML5, CSS3 and Bootstrap5. This is the home page which displays the last article and its picture and some info about me.
          </p>
        </div>
        <!--Grid column-->

        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <!--<h5 class="text-uppercase">About Us</h5>-->

          <ul class="list-unstyled mb-0">
            <li>
              <a class="text-white" href="#!">Privacy Policy</a>
            </li>
            <li>
              <a href="#!" class="text-white">Open Jobs</a>
            </li>
            <li>
              <a href="#!" class="text-white">Want an advirtisment?</a>
            </li>
          </ul>
        </div>

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <img class="img-fluid img-thumbnail" src="pics/G_Blog_Logo.png" alt="G-Blog" style="width:60%;height:90%;">
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" id="mine" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Mohammad Abo Al Ghozlan - MHG
  </div>
  <!-- Copyright -->
</footer>

</html>