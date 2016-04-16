<!DOCTYPE html>

<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  require_once "classes/BasketItem.php";#
  
  $image_location = "/Website_version5/images/";
  
  $basket_number = trolleyNumber();
 
  
  
  
  
  if (isset($_GET['id'])) {
      $product_id = $_GET['id'];
      $page_id = $product_id;
      $limit = $product_id + 5;
      
      if ($product_id == 1000) {
          $limit = 1011;
          
      }
      else if($product_id == 1012) {
          $limit = 1020;
      }
      else if($product_id == 1021){
          $limit = 1030;
      }
      
      
  }
  
  ?>

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
			
			/* ----------Users Delivery Address--------------*/
			.deliverBody{
				text-align:center;
				border:thin;
				margin-left:auto;
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
                                <li><a href="#">Sign In</a></li>
                                <li><a href="#">Sign Up</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">More</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>

   <!----------------------------------- User's Delivery Address -------------------->
   <body>
   
   <div class="deliverBody">
   
   <p><h1>Please enter your delivery address.</h1></p>
   <p><h3>To ensure that the items are deliver to the correct address, you will need to input an<br> address that you would like your items to be deliver to.</h2></p> 
   <form action="form_address.php" method="post" name="delivery_address">
   
   <p>Full Name:
   <input name="full_name" type="text">
   </p>
   
   <p>Address Line 1:
   <input name="address_line_1" type="text">
   </p>
   
   <p>Address Line 2:
   <input name="address_line_2" type="text">
   </p>
   
   <p>Town/City:
   <input name="town_city" type="text">
   </p>
   
   <p>County:
   <input name="county" type="text">
   </p>
   
   <p>Postcode:
   <input name="postcode" type="text">
   </p>
   
   <p>
   Country:
   <input name="country" type="text">
   </p>
   
   <p>
   Phone Number:
   <input name="phone_number" type="text">
   </p>
   
   <input type="submit" value="Submit"> <input type="submit" value="Cancel">
   </form>
   
   </div>
      
  
    
    </body>
    
 </html>