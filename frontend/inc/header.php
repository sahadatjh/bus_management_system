<!DOCTYPE html>
<html>
    <head>
        <title>University Bus Management System</title>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
        <!-- Fa icon  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/themify-icons.css"/>
        <link rel="stylesheet" href="css/magnific-popup.css"/>
        <link rel="stylesheet" href="css/animate.css"/>
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- header section -->
        <header class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5"><img src="img/logo-uu-new.png"/></div>
                    <div class="col-md-7"><img src="img/title.png"/></div>
                </div>
            </div>
        </header>
        <!-- header section end-->
        <!-- Header section  -->
        <nav class="nav-section">
            <div class="container">                
                <ul class="main-menu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="galary.php">Galry</a></li>
                    <li><a href="busInfo.php">Bus Info</a></li>
                    <li><a  href="contuct.php">Contact</a></li>                   
                    <li class="pull-right">
                        <span> <?php
                            session_start();
                            echo $_SESSION['username'];
                            ?></span>
                        <a href="../index.php?logout='1'" >Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header section end -->