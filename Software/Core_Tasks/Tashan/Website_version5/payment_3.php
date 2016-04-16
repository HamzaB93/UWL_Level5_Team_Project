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
        <title>Credit/Debit Card Payment</title>
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

           			
			/* ----------Card Datail CSS--------------*/
			#mainContent .carddetails { float: left; background:#000; border-radius: 15px; margin-left:350px; padding: 10px; text-align:center; width: 900px}
			#mainContent #carddetails2 { color: #fff; float: none; text-align:center;}
			#mainContent #carddetails2 h6 { margin: 2px 0 2px 0;}
			#mainContent .methods { background:#e6e6e6; margin: 5px 0px 0px 200px; float:left; width: 480px; border-radius: 15px; padding:5px;}
			#mainContent .cardImage { float: left;  color:FFF;}
			#mainContent .proceedPayment { color:#FFF; margin:135px 10px 10px 10px; width: 200px; height: 45px; background:#00e600; border-radius: 10px; border: 4px outset #FFF;}
			#mainContent .cancelPayment { color:#FFF; margin:135px 10px 10px 10px; width: 200px; height: 45px; background:#00e600; border-radius: 10px; border: 4px outset #FFF;}
			
			#mainContent .cardDetailCenter {	text-align:center; }
			
            #mianContent .form {  text-align: center; position: absolute; top: 282px; left: 923px;}
            

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

			<!---------------------------- Card Datail  ------------------------------>
            
    <div id="mainContent" style="height:inherit; width:940px;">
                    <div class="carddetails">
                    <div align="center">
                    <form id="carddetails2">
                    	
                        <h6>Type of Card :</h6>
                        <select name="cardType"  >
                            <option selected="selected">-Select your Card-</option>
                            <option>Visa</option>
                            <option>Mastercard</option>
                            <option>Mastercard Debit</option>
                            <option>Switch/Maestro</option>
                            <option>Solo</option>
                            <option>Visa Debit</option>
                            <option>Visa Electron</option>
                            <option>Visa Delta</option>
                        </select>
                        
                        <h6>Card Number :</h6>
                        <input type="text" value="- Card Number -" />
                        
                        <h6>Expiry Date :</h6>
                        <select name="expiryDay">
                        	<option selected="selected">---</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>Jun</option><option>Jul</option><option>Aug
                            </option><option>Sep</option><option>Oct</option><option>Nov</option><option>Dec</option>
                        </select>
                        <select name="expiryYear">
                        	<option selected="selected">----</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>						2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option>
                        </select>
                        
                         <h6>Start Date :</h6>
                        <select name="startDay">
                        	<option selected="selected">---</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>Jun</option><option>Jul</option><option>Aug</option><option>Sep</option><option>Oct</option><option>Nov</option><option>Dec</option>
                        </select>
                        <select name="startYear">
                        	<option selected="selected">----</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option>
                        </select>
                        
                        <h6>Security Code :</h6>
                        <input type="text" value="- Security Number -" />
                        <h6>Cardholder's Name as it appears on card :</h6>
                        <input type="text" value="- Cardholder's Name -" />
                    </form>
                    </div>
                    <br>
                    <div class="methods">
                    <img class="cardImage" src="images/Visa.png" alt="" />
                    <img class="cardImage" src="images/American-Express.png" alt="" />
                    <img class="cardImage" src="images/Switch.png" alt="" />
                    <img class="cardImage" src="images/Maestro.png" alt="" />
                    <img class="cardImage" src="images/Solo.png" alt="" />
                    <img class="cardImage" src="images/Visa Debit.png" alt="" />
                    <img class="cardImage" src="images/Electron.png" alt="" />
                    <img class="cardImage" src="images/Delta.png" alt="" />
                    
                    
                    <input class="proceedPayment" type="submit" value="Submit Transaction" />  <input class="cancelPayment" type="submit" value="Cancel Transaction" />
                    </div>
               	
                
                	</div>
            
				</div>
				



</body>
</html>