<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

require "connect.php";
$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="pics/G_Blog_Logo.png">
    <link rel="stylesheet" href="css/aboutUs.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/13ccb33514.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>G-Blog/AboutUs</title>
    <style>
        #addShit:hover {
            background-color: #e4e4e4;
        }
    </style>
</head>

<body style="padding:0px;">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style="background-color:#804000;font-family:sans-serif;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><span style="color:cyan;">G</span>-Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="mynavbar"> 
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
            <a class="nav-link active" style="border-bottom: 1px solid darkgray;" href="aboutUs.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
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

    <!-- Body Start -->

    <div class="container-xxl" style="width:100%;text-align:left;background-color:rgb(236, 240, 240);">
        <div class="row d-flex justify-content-center" style="width:100%;padding-top:60px;padding-bottom:70px;">
            <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-12 col-md-4">
                <div>
                    <div class="img-wrapper">
                        <img src="pics/MHG.jpeg" alt="none">
                    </div>
                    <!--<h1 style="color:#008080;margin-top:20px;">G-Blog</h1>-->
                    <h1 style="padding-top:35px;font-size:50px;"><span style="color:#ff8000;"><i>Mohammad</i></span><br>Abo Al Ghozlan</h1>
                    <hr><br>
                    <a href="#skills" id="mia">My Skills</a>
                </div> 
            </div>
            <span style="background-color:#17A2B8;position:absolute;margin-right:-100px;top:0;right:0;margin:0px;border-radius:350px;height:400px;width:400px;">.</span>
            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-10 col-md-6">
                <!--<h1 style="margin-bottom:40px;font-size:50px;"><span style="color:#008080;"><i>Mohammad</i></span> Abo Al Ghozlan</h1>-->
                <div>
                    <p style="text-align:justify;">I'm a third year computer science student at LIU and a junior full stack web developer.</p>
                    <p style="text-align:justify;"><br>This is a personal blog that shows the last post, autor's abstract and books division in the home page, last few posts in the articles page, pictures, allows the admin to change his/her password, add articles and books and save subscribers in the database to sent updates.<br>
                    </p>
                </div>
                <div>
                    I've completed several self-taught courses, the most important one in my opinion is CCNA: introduction to networking not because it's from cisco but because its was the door to online courses.
                    <br>
                    Other courses: <br>
                    <ul>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/1BOb7S9q3u_y2bswPd4qcfKZ4jSTdDTp3/view?usp=sharing">CCNA: Switching, Routing and Wireless Essentials</a> by cisco</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/16eLg_lQKGDLb7BgS74LsRkCefDqP-uxT/view?usp=sharing">Linux Uncharted</a> by cisco</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/1KGTpkh4ZIiWErIPXcTN9DprOhJpoQ3Im/view?usp=sharing">Get Connected</a> by cisco</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/12yquV3S2PDXlHFQMDMBqGWOzD61nTD4k/view?usp=sharing">JavaScript Algorithms and Data Structure</a> by freecodecamp</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/1HzL6O-K0_6ta4g_C-5I7tNSOoj1GHtwk/view?usp=sharing">JavaScript Essentials 1</a> by OPENEDG</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/16FIkpnV4O4Vg9x3XxS7COOjFhoyPQXoN/view?usp=sharing">Scientific Computing with Python</a> by freecodecamp></li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/127bMVYEGLP-lVgPSejPp3FuoosTko6A8/view?usp=sharing">IT Support from Google hosted</a> by coursera</li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/16yUqcriwGY9pUs8ASVWoaumSecv1pQBK/view?usp=sharing">php</a></li>
                        <li><a style="color:blue;" target="_blank" href="https://drive.google.com/file/d/1KnytR5AYG64t2SbFrDCaz2u5eMKZxAUZ/view?usp=sharing">Web Development Fundimentals</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="container-xxl mt-3" id="skills" style="width:100%;text-align:left;padding-top:80px;padding-bottom:80px;background-color:#17A2B8;color:white;">
        <div class="row" style="width:100%;padding:0px;margin:0px;">
            <div class="col-xl-1 col-xxl-1 col-lg-1 col-sm-0 col-md-1"></div>
            <div class="col-xl-5 col-xxl-5 col-lg-5 col-sm-12 col-md-5" style="padding-left:50px;padding-right:50px;padding-top:auto;">
                <h1>Remarkable idea can get you a great website with the right developer.</h1>
            </div>
            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-12 col-md-6">
                <h1 style="text-decoration:underline;">My Skills</h1><br>
                <div class="container">
                    <div class="row text-center text-lg-start" style="margin:0px;">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Java</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Python</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>HTML5</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>CSS3</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>JavaScript</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>MySQL</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>PHP</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>JSON</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Bootstrap5</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Packet Tracer</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Database</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>phpmyadmin</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Responsive Web Development</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Problem Solving</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Stratgy</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6" style="text-align:left;">
                            <p>Angular</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl mt-3" style="width:100%;text-align:left;padding-top:80px;padding-bottom:80px;background-color:rgb(236, 240, 240);margin-top:0px;">
        <div class="row" style="width:100%;padding:0px;margin:0px;">
            <div class="content">
                <div class="contact">
                    <div class="other">
                        <div class="info">
                            <img src="pics/MHG.jpeg" style="border-radius:10px;width:150px;height:150px;">
                            <h2>Mohammad Haitham Abo Al Ghozlan</h2>
                            <h3>Email</h3>
                            <div class="svg-wrap">
                                <a id="buttt" href="mailto:abo.al.ghozlan.mohammad@gmail.com">abo.al.ghozlan.mohammad@gmail.com</a>
                            </div>
                            <h3>Phone</h3>
                            <div class="svg-wrap">
                                <p id="buttt">+961 81 985 614</p>
                            </div>
                            <h3>Connect</h3>
                            <div class="svg-wrap">
                                <a id="buttt" class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/mohamadhaitham5" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M373.66 0H138.34C62.06 0 0 62.06 0 138.34v235.32C0 449.94 62.06 512 138.34 512h235.32C449.94 512 512 449.94 512 373.66V138.34C512 62.06 449.94 0 373.66 0zm96.976 373.66c0 53.472-43.503 96.976-96.977 96.976H138.34c-53.472 0-96.976-43.503-96.976-96.977V138.34c0-53.472 43.503-96.976 96.977-96.976h235.32c53.472 0 96.976 43.503 96.976 96.977v235.32z" />
                                        <path d="M370.586 238.14c-3.64-24.546-14.84-46.794-32.386-64.34-17.547-17.547-39.795-28.747-64.34-32.386-11.177-1.657-22.508-1.657-33.683 0-30.336 4.5-57.103 20.54-75.372 45.172-18.27 24.63-25.854 54.903-21.355 85.237 4.5 30.335 20.54 57.102 45.172 75.372 19.996 14.83 43.706 22.62 68.153 22.62 5.667 0 11.375-.42 17.083-1.266 30.336-4.5 57.103-20.542 75.372-45.173 18.27-24.63 25.855-54.9 21.356-85.236zM267.79 327.633c-19.404 2.882-38.77-1.973-54.526-13.66-15.757-11.687-26.02-28.81-28.896-48.216-2.878-19.405 1.973-38.77 13.66-54.527 11.688-15.758 28.81-26.02 48.217-28.898 3.574-.53 7.173-.795 10.772-.795s7.2.265 10.773.796c32.23 4.78 57.098 29.645 61.878 61.877 5.94 40.058-21.817 77.482-61.877 83.422zM400.05 111.95c-3.853-3.85-9.184-6.057-14.626-6.057S374.65 108.1 370.8 111.95c-3.852 3.853-6.06 9.175-6.06 14.626 0 5.45 2.208 10.773 6.06 14.625 3.85 3.852 9.182 6.06 14.624 6.06s10.773-2.207 14.625-6.06c3.85-3.85 6.057-9.182 6.057-14.624 0-5.443-2.207-10.774-6.058-14.625z" />
                                    </svg></a>

                                <a id="buttt" class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/Mohamad2074" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60.734" height="60.733" viewBox="0 0 60.734 60.733">
                                        <path d="M57.378 0H3.352C1.502 0 0 1.5 0 3.354V57.38c0 1.852 1.502 3.353 3.352 3.353h29.086v-23.52h-7.914v-9.166h7.914v-6.76c0-7.843 4.79-12.116 11.787-12.116 3.355 0 6.232.252 7.07.36v8.2h-4.853c-3.805 0-4.54 1.81-4.54 4.463v5.85h9.08l-1.188 9.167h-7.892v23.52h15.475c1.852 0 3.355-1.503 3.355-3.35V3.35C60.732 1.5 59.23 0 57.378 0z" />
                                    </svg></a>

                                <a id="buttt" class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/mohammad-abo-al-ghozlan-7224b6241" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 478.165 478.165">
                                        <path d="M442.78 0H35.424C15.86 0 0 15.4 0 34.288v409.688c0 18.828 15.86 34.19 35.424 34.19H442.76c19.586 0 35.405-15.362 35.405-34.19V34.288C478.165 15.4 462.345 0 442.78 0zM145.003 400.244H72.78V184.412h72.224v215.832zm-36.16-245.28h-.48c-24.246 0-39.926-16.695-39.926-37.336 0-21.22 16.158-37.337 40.863-37.337 24.725 0 39.927 16.12 40.385 37.338.02 20.64-15.64 37.337-40.843 37.337zm296.54 245.28h-72.082V284.807c0-29.01-10.598-48.952-36.738-48.952-20.063 0-31.798 13.428-36.958 26.458-1.893 4.423-2.39 10.898-2.39 17.393v120.537H184.95s.916-195.63 0-215.832h72.263v30.604c9.484-14.684 26.658-35.703 65.01-35.703 47.577 0 83.16 30.863 83.16 97.168v123.766zm-148.61-184.532c.06-.22.16-.438.42-.677v.677h-.42z" />
                                    </svg></a>

                                <a id="buttt" href="http://wa.me/+96181985614">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <h1>Send Feedback</h1>
                        <form action="userFeedbackAction.php" method="POST">
                            <div class="flex-rev">
                                <input type="text" placeholder="James Delaney" name="name" id="name" required/>
                                <label for="name">Full Name</label>
                            </div>
                            <div class="flex-rev">
                                <input type="email" placeholder="Enter your email e.g: ..@gmail.com" name="email" id="email" required/>
                                <label for="email">Your Email</label>
                            </div>
                            <div class="flex-rev">
                                <textarea placeholder="I have an idea for a project...." name="message" id="message" required/></textarea>
                                <label for="message">Email Message</label>
                            </div>
                            <button id="buttt" style="background: #243342;">Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<footer>
    <div class="text-center p-3" style="background-color:#343A40;">
        <a class="text-white" href="#">&copy; 2022 Mohammad Abo Al Ghozlan - MHG</a><br>
    </div>
</footer>

</html>