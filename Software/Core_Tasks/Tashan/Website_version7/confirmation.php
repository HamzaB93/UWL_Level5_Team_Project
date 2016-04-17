<?php
  //getting the other files code
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  
  global $conn;
  
  $basket_number = trolleyNumber();
  
  $priceID = 1;
  
  $sql = $conn->prepare("SELECT * FROM `final_price`
              WHERE `id` = :code");
      //Binds the paramater for extra security: cant enter SQL code into field
      $sql->bindParam('code', $priceID);
      //Execute the SQL command
      $sql->execute();

      //makes the result variable the SQL object
      $result = $sql->fetchObject();
	  
	  $final_price = $result->price;
  
?>

<html>
    <title>Payment Confirmation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

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
            margin-bottom: 10px;

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

        /* --------------- Product Section -------------------- */

        .row-centre{
            float:none;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
		
		.trolleyText{
            text-align: center;
        }

        /* --------------- Footer -------------------- */

        .FooterClass{
            background-color: transparent;
            margin: auto;
            margin-top: 40px;
            width: 100%;
        }

        #loyaltyPointsDiv{

            margin-left: auto;
            margin-right: auto;
            width: 400px;

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
                    <img src="Logo.png" alt="Logo" width="80" height="110" margin-right="10">
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
                    <li><a href="Products.php?id=1031">Video Games</a></li>
                        <li><a href="Products.php?id=1041">DVD's</a></li>
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

<body>        

    <div class="trolleytext">

        <?php
          
             
             echo "Price: £" , $final_price , "</br> </br>";
			 
		?>
			  	 <form action="">
			 	<input name="Confirm_payment" type="button" value="Click to Pay Now"> 
			 	</form>
                <form action="">
				<input name="Cancal_payment" type="button" value="Cancel Payment">
                </form>
                
                
          
		  
		