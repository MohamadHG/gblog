<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

require "connect.php";
$user = $_SESSION['user'];
$query = "SELECT * FROM subscribers";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="pics/G_Blog_Logo.png">
    <link rel="stylesheet" href="css/sub.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/13ccb33514.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>G-Blog/viewSubscribers</title>
    <style>
        #addShit:hover {
            background-color: #e4e4e4;
        }
    </style>
</head>

<body style="background-color:#708090;padding:0px;">
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
                <a class="nav-link active" style="border-bottom: 1px solid darkgray;" href="sub.php">Subscribers</a>
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

    <center>
        <h1 class="fw-light text-center text-lg-start mt-4 mb-0 col-xl-3 col-xxl-3 col-lg-3 col-sm-10 col-md-3" style="border-bottom:1px black solid;color:white;">Subscribers</h1>
        <table class="ft" style="margin-top:30px;">
            <tr id="t1">
                <td>ID</td>
                <td>Email</td>
                <td>Send Message</td>
                <td>Delete</td>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
        <tr class='ttr'>
            <td class='ttd'>" . $row['Sid'] . "</td>
            <td class='ttd'>" . $row['SEmail'] . "</td>
            <td class='ttd'><a class='btn btn-success' href=mailto:" . $row['SEmail'] . "><i class='fa fa-envelope'></i></a></td>
            <td class='ttd'><a class='btn btn-danger fa fa-trash' href=deleteSub.php?subID=" . $row['Sid'] . "></a></td>
        </tr>";
                }
            } else {
                echo "<h2>You don't have any customers.</h2>";
            }
            ?>
        </table>

        <form action="AlertSub.php" method="POST" class=" mt-4 mb-0 col-xl-5 col-xxl-5 col-lg-5 col-sm-10 col-md-5" style="margin-bottom:20px;padding:40px;background-color:rgb(255, 255, 255, 0.5);box-shadow: 0 0 5px 1px;">
            <table style="margin-bottom:20px;">
                <tr style="color:white;border-radius: 10px;color: white;">
                    <td>
                        <h4 class="fw-dark text-center" style="text-align:center;color:black;">Alert Subscribers</h4>
                    </td>
                </tr>
                <tr>
                    <td class="input-group">
                        <textarea name="emailMsg" placeholder="Enter your message" rows="5" cols="50" class="in" spellcheck="true" required style="color:black;"></textarea>
                        <span class="border-buttom"></span>
                    </td>
                </tr>
                <tr>
                    <td><br><input type="reset" class="btn btn-outline-dark">
                        <input type="submit" class="btn btn-success" style="float: right;">
                    </td>
                </tr>
            </table>
        </form>
    </center>



</body>
<footer style="margin-top:20px;">
    <div class="text-center p-3" style="background-color:#343A40;">
        <a class="text-white" href="#">&copy; 2022 Mohammad Abo Al Ghozlan - MHG</a><br>
    </div>
</footer>

</html>