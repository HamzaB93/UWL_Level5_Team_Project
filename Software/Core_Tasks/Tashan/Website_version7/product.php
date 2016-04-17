<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  require_once "classes/BasketItem.php";

  $image_location = "/Website_version7/images/";
  
  $basket_number = trolleyNumber();

  if (isset($_GET['id'])) {
      $product_id = $_GET['id'];

      $sql = $conn->prepare("SELECT * FROM `products` WHERE `id` = :id");
      $sql->bindParam('id', $product_id, PDO::PARAM_INT);
      $sql->execute();

      $result = $sql->fetchObject();
  }

  $submit = isset($_POST['add']) ? $_POST['add'] : '';
  $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

  if ($submit) {
      $basket_item = new BasketItem($result->name, $result->price, $result->description, $quantity, $result->img_url);
      addToBasket($result->id, $basket_item);
      echo "<meta http-equiv='refresh' content='0'>";
  }
?>

<head>
    <title>Trolley Page</title>
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
        
        #quantitySelect{
            margin-top: 20px;
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

        .trolleyText{
            text-align: center;
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

    <!--  End of template -->


    <div class="trolleyText">


    </div>

    <!-- this is the view to show when successfully pulling data from db -->
    <?php
      //If function checks for result and makes sure the result is not false
      if (isset($result) && $result != false) {
          ?>
    <!-- The VIEW using html and snippets of PHP -->
          <div class="trolleytext"
               <h1>
                   Product: <?= ($result->name); ?> <br /> 
                  Price: £<?= ($result->price); ?> <br />
                  Description: <?= ($result->description); ?> <br /></br>
              </h1>
               <img src="<?= ($image_location . $result->img_url); ?>" width="300" height="200"/></br>


              <form id="quantitySelect" action="" method="POST">
                  
                  
                  
                  <select name="quantity">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select></br></br>
                  
                  
                  
                  <input id="buttonDesign" type="submit" name="add" value="add to basket" />
              </form>

              <!-- view to show when unsuccessful -->
              <?php
                
                
          } else {
              ?>

              <h1> Sorry, this product does not exist </h1>

              <?php
          }
        ?>
        <form action="index.php">
            <input id="buttonDesign" type="submit" value="Back to home">
        </form>
    </div>
</body>
</html>
