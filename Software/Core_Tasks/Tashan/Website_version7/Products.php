<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  require_once "classes/BasketItem.php"; #

  $image_location = "/Website_version7/images/";

  //This is for the number next to the trolley
  $basket_number = trolleyNumber();





  if (isset($_GET['id'])) {
      $product_id = $_GET['id'];
      $page_id = $product_id;
      $limit = $product_id + 5;
      $widthValue = 300;

      if ($product_id == 1000) {
          $limit = 1011;
          $titleText = "Fresh Food";
      } else if ($product_id == 1012) {
          $limit = 1020;
          $titleText = "Toiletries";
      } else if ($product_id == 1021) {
          $limit = 1030;
          $titleText = "Electronics";
      } else if ($product_id == 1031){
          $limit = 1040;
          $titleText = "Video Games";
      } else if ($product_id == 1041){
          $limit = 1048;
          $titleText = "DVD's";
      }
      
      
      if ($product_id >= 1031){
          
          $widthValue = 200;
          
      }
  }
?>


<head>
    <title id="TitleText"><?= ($titleText); ?></title>
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

        #productDivs{
            margin-bottom: 30px;
        }

        #colMid{
            padding-top: 60px;
        }
        #ProductLinks{
            color:black;
        }
        #imageStyle{
            width: <?= ($widthValue); ?>px;
            height: 200px;
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
                        <h1 id="slogan"> More for less </h1>
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

    <!-- End of template  -->
<?php
  //While Function
  while ($product_id <= $limit) {


      $sql = $conn->prepare("SELECT * FROM `products` WHERE `id` = :id");
      $sql->bindParam('id', $product_id, PDO::PARAM_INT);
      $sql->execute();



      $result = $sql->fetchObject();

      if ($result != false) {
          ?>
              <!-- VIEW -->
              <div id="productDivs" class="container">
                  <div class="col-sm-4">
                      <a href="product.php?id=<?= ($product_id); ?>">
                          <img id="imageStyle" src="<?= ($image_location . $result->img_url); ?>"></a>
                  </div>
                  <div id="colMid"   class="col-sm-4">
                      <p1>
                          <?= ($result->name); ?> <br />
                          £<?= ($result->price); ?> <br />
                          <?= ($result->description); ?> <br /></br>
                      </p1>
                  </div>

                  <div id="colMid"  class="col-sm-2">
                      <form id="quantitySelect" action="" method="POST">



                          <select name="quantity">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select></br></br>

                  </div>


                  <div id="colMid"  class="col-sm-2">
                      <input id="buttonDesign" type="submit" name="<?= $product_id; ?>" value="Add to Basket" />
                      </form>
                  </div>

              </div>
          <?php
          $submit = isset($_POST[$product_id]) ? $_POST[$product_id] : '';
          $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

          if ($submit) {

              $basket_item = new BasketItem($result->name, $result->price, $result->description, $quantity, $result->img_url);
              addToBasket($result->id, $basket_item);
              echo "<meta http-equiv='refresh' content='0'>";
          }
      }




      $product_id++;
  }
?>








</body>

</html>