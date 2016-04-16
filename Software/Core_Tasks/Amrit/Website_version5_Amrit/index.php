<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";

  if (!isset($_SESSION['basket'])) {
      $_SESSION['basket'] = array();
  } else {
      $basket = $_SESSION['basket'];
  }

// Prevent malicious code execution.
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

  $basket_number = trolleyNumber();
  
?>

<!---------------------------- START OF TEMPLATE FOR EVERY PAGE  ------------------------------>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Vista</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <style>

            /* --------------- Header --------------------- */

            #HeaderDiv {
                background: linear-gradient(#08CF08, #08CF08); /* For browsers that do not support gradients */
                background-repeat: no-repeat;
            }



            .HeaderClass{
                background-color: transparent;
                text-align: left;
                margin-left: 5px;
                margin-bottom: 10px;
                margin-right: 800px;
            }

            #LogoID{
                float:left;
            }
            #SloganID{
                float:left;
                margin-left: 20px;
                margin-top: 16px;
                color: white;
            }

            /* --------------- Nav Bar -------------------- */

            .navbar{
                color: white !important;
                background: black;
                border: transparent;
                font-size: 10px;
                margin-bottom: 50px;

            }

            .navbar li a, .navbar .navbar-brand { 
                color: white !important;
                background-color: black !important;
                font-size: 20px;
            }

            #nav li a:hover, #nav2 li a:hover{
                background-color: white!important;
                color: black !important;
            }

            /* --------------- Carousel -------------------- */

            .carousel-inner > .item > img {
                margin: auto;
                width:1300px;
                height:500px
            }

            .carousel{
                margin: 0 auto;
                margin-bottom: 50px;
                width:800px;
                height:500px;

            }
            
            #carousel_links_white{
                color: white;
            }
            
            #carousel_links_black{
                color: black;
            }

            /* --------------- Product Section -------------------- */

            .row-centre{
                float:none;
                margin: 0 auto;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            
            #columnDivs{
                margin-left: auto;
                margin-right: auto;
                width: 190px;
                
            }
            
            #ProductLinks{
                color: black;
                text-align: center;
                
            }
            
            

            /* --------------- Footer -------------------- */

            .FooterClass{
                background-color: transparent;
                margin: auto;
                margin-top: 40px;
                width: 100%;
            }
        </style>

    </head>
    <!---------------------------- HEADER  ------------------------------>

    <!-- Sets the header division  -->
    <div id="HeaderDiv">
        <body>
            <header class="HeaderClass">
                <div class="container">
                    <div id="LogoID">
                        <a href="index.php">
                        <img src="Logo.png" alt="Logo" width="80" height="110" margin-right="10" >
                        </a>
                    </div>
                    <div id="SloganID">
                        <h1> More for less </h1>
                    </div>


                </div>

                <!---------------------------- NAVBAR  ------------------------------>
            </header>
            <!-- First Nav Bar-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="Products.php?id=1000">Fresh Food</a></li>
                        <li><a href="Products.php?id=1012">Toiletries</a></li>
                        <li><a href="Products.php?id=1021">Electronics</a></li>
                    </ul>
                    <ul id="nav2" class="nav navbar-nav navbar-right">
                        <li><a href="basket.php">View Trolley <?= $basket_number;  ?> </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="marketing.php">Sign In</a></li>
                                <li><a href="#">Sign Up</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">More</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>

    <!---------------------------- END OF TEMPLATE FOR EVERY PAGE  ------------------------------>
    <!--- *The footer is also on every page  ---->

    <!---------------------------- CAROUSEL  ------------------------------>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                
                <img src="apples2.jpg" alt="Apples" width="800" height="500">
                <div class="carousel-caption">
                    <a href="product.php?id=1000" id="carousel_links_white">
                    <h3>Apples</h3>
                    <p>We have deals on apples</p>
                    </a>
                </div>      
            </div>

            <div class="item">
                <img src="images/soap.png" alt="Soap" width="800" height="500">
                <div class="carousel-caption">
                    <a href="product.php?id=1011" id="carousel_links_black">
                    <h3>Soap</h3>
                    <p>We have deals on soap</p>
                    </a>
                </div>      
            </div>

            <div class="item">
                <img src="images/fruit.jpg" alt="Fruit" width="1200" height="700">
                <div class="carousel-caption">
                    <a href="product.php?id=1013" id="carousel_links_black">
                    <h3>Fruit</h3>
                    <p>Check out our deals on fruit</p>
                    </a>
                </div>      
            </div>
        </div>

        <!-- Left and right controls -->

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!---------------------------- PRODUCTS DIVISION  ------------------------------>
    
    <div id="bestSellingDiv">
        
        <h1> Our Best Sellers...</h1>
        
    </div>

    <div class="container">
        <div class="row row-centre">
            <div class="col-sm-4">
                <img src="images/Oranges.jpg" class="img-rounded" alt="Oranges" width="324" height="236">
                <div id="columnDivs">
                <h1> <a id="ProductLinks"  href="product.php?id=1003">Oranges</a> </h1> 
                </div>
            </div>

            <div class="col-sm-4">
                <img src="bananas.jpg" class="img-rounded" alt="Bananas" width="304" height="236"> 
                <div id="columnDivs">
                <h1> <a id="ProductLinks" href="product.php?id=1001">Bananas</a> </h1> <br />  
                </div>
            </div>

            <div class="col-sm-4">
                <img src="images/peaches.jpg" class="img-rounded" alt="Peaches" width="304" height="236"> 
                <div id="columnDivs">
                <h1> <a id="ProductLinks" href="product.php?id=1002">Peaches</a> </h1> <br />
                </div>
            </div>

        </div>








        <!---------------------------- FOOTER  ------------------------------>
    </div>
    <footer class="FooterClass">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h4> Groceries </h4>
                    <ol>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                    </ol>
                </div>
                <div class="col-sm-2">
                    <h4> Clothes </h4>
                    <ol>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                    </ol>
                </div>

                <div class="col-sm-2">
                    <h4> Electronics </h4>
                    <ol>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                        <li><a href="#" >Here</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
