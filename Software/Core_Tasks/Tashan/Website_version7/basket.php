<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  require_once "classes/BasketItem.php";

  $basket_number = trolleyNumber();

  if (isset($_GET['unset'])) {
      $id = $_GET['unset'];
      removeFromBasket($id);
      header("Refresh:0; url=basket.php");
  }
?>

<head>
    <title>Trolley</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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



        .trolleyText{
            text-align: center;
        }
        
        #buttonDesign{
            background-color: #08CF08; 
            border: none;
            color: white;
            transition-duration: 0.9s;
            cursor: pointer;
            font-size: 16px;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
        }
        
        #buttonDesign:hover {
            background-color: #e60000;
        color: white;
        }

    </style>
</head>
<body>

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
                        <li><a href="basket.php">View Trolley <?= $basket_number; ?> </a></li>
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
          if (isset($_SESSION['basket'])) {
              foreach ($_SESSION['basket'] as $key => $value) {
//	  unserialising restores class information, so it can be accessed.	  
                  $value = unserialize($value);
                  ?>
                  Name: <?= ($value->name); ?> <br />
                  Price: £<?= ($value->price); ?> <br />
                  Description: <?= ($value->description); ?> <br />
                  Quantity: <?= ($value->quantity); ?> <br />
                  <a href="?unset=<?= ($key); ?>">Remove From Basket</a> <br />
                  <br />
                  <?php
              }
          } else {
              ?>
              <h3> Nothing in your basket mate </h3>
          <?php } ?>

        <h4>
            <?php
              //$totalPrice = number_format(getBasketValue(), 2);
              $totalPrice = getBasketValue();
              
              
              
              
              //echo "Total Price: &pound$totalPrice" , "</br>" , "</br>";
              
              $new_price = checkDeals()[0];
              $discount = checkDeals()[1];
              
              //echo "Total Discount: £" , number_format($discount, 2) , "</br> </br>";
              
              
              
             echo "Savings: £" , number_format($discount, 2) , "</br>" , "</br>";
              
              echo "Price: £" , number_format($new_price , 2) , "</br> </br>";
              
              
              
              

              //updateStock();
            ?>

            <!-- Payment button, Goes to the payment page  -->
            <form action="loyalty_points.php">
                <input id="buttonDesign" type="submit" value="Confirm Payment">
            </form>   <br>

            <!-- Goes back to home page  -->
            <form action="index.php">
                <input type="submit" value="Back to home">
            </form>
    </div>


</body>
</html>