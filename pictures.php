<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

require "connect.php";
$user = $_SESSION['user'];

$query = "SELECT * FROM posts";
$r = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/x-icon" href="pics/G_Blog_Logo.png">
    <link rel="stylesheet" href="css/pictures.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/13ccb33514.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>G-Blog/Pictures</title>
    <style>
        #addShit:hover {
            background-color: #e4e4e4;
        }
    </style>
</head>

<body style="background-color: rgb(236, 240, 240);">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style="background-color:#804000;font-family:sans-serif;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><span style="color:cyan;">G</span>-Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="mynavbar"> <!-- me-auto in the class to return the a tags to the edges -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
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
            <a class="nav-link active" style="border-bottom: 1px solid darkgray;" href="pictures.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
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

    <!-- Page Content -->
    <div class="container">
        <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Gallery</h1>
        <hr class="mt-2 mb-5">
        <div class="row text-center text-lg-start" style="margin:0px;">
        
            <?php
            if (mysqli_num_rows($r) > 0) {
                while ($row = mysqli_fetch_assoc($r)) {
                    echo "
            <div class='col-lg-3 col-md-4 col-6'>
                <a src='pics/articlesimag/" . $row['imag'] . "' target='_blank' class='d-block mb-4 h-100'>
                    <img class='img-fluid img-thumbnail' src='pics/articlesimag/" . $row['imag'] . "'>
                </a>
            </div>";
                }
            }
            ?>

            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M1.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M1.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M2.jpg" target="_blank" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M2.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M3.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M3.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M4.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M4.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M5.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M5.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M6.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M6.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M7.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M7.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M8.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M8.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M9.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M9.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M10.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M10.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M11.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M11.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="pics/Pictures/M12.jpg" target="_blank" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="pics/Pictures/M12.jpg" alt="">
                </a>
            </div>
        </div>
    </div>

</body>
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/Mohamad2074" role="button"><i class="fab fa-facebook-f"></i></a>

            <!-- Email -->
            <a class="btn btn-outline-light btn-floating m-1" href="mailto:abo.al.ghozlan.mohammad@gmail.com" role="button"><i class="fas fa-envelope"></i></a>

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
                            <input type="email" name="subscriber" id="form5Example21" placeholder="Enter your email e.g: ..@gmail.com" class="form-control" />

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

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->

                <!-- Section: Text -->
                <section class="mb-4 col-lg-6 col-md-6 mb-4 mb-md-0">
                    <p>
                        This is my reposive blog website. Built in HTML5, CSS3 and Bootstrap5. This page is presenting my pictures and by pressing on any picture, the picture will open in a new tab.
                    </p>
                </section>
                <!-- Section: Text -->

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