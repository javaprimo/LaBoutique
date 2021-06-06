<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La boutique</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>


    <div id="page-portfolio">
        <?php
            session_start();
            error_reporting(E_ALL ^ E_DEPRECATED);// ^ E_WARNING);

            include 'pages/header.php';
            include 'pages/menu.php';
            include "pages/notifications.php";

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                require("pages/".$page . ".php");
            } else {
                require("pages/accueil.php");
            }
            
            include 'pages/footer.php';
        ?>
    </div>




    <!-- Latest jQuery form server -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){ 

    });

    </script>


</body>
</html>