<?php
   require_once "includes/db.php";
   require_once "includes/basket_session.php";
   require_once "classes/BasketItem.php";

   $image_location = "/project_eshop/images/";

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
   }
?>

 <head>
        <title>Trolley Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
         <style>
      
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

.row-centre{
    float:none;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
}

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
 
.masthead{
    background-color: transparent;
    margin: auto;
    margin-top: 40px;
    width: 100%;
    }
    
    .masthead1{
        background-color: transparent;
        text-align: left;
        margin-left: 5px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-right: 800px;
    }
    
    #div1{
        float:left;
         }
    #div2{
             float:left;
             margin-left: 20px;
             margin-top: 16px;
             color: white;
         }
body {
    background: linear-gradient(#08CF08, white, white, white); /* For browsers that do not support gradients */
    background-repeat: no-repeat;
   
    
}

.trolleyText{
    text-align: center;
}
      
  </style>
</head>
    <body>
        <header class="masthead1">
  <div class="container">
      <div id="div1">
          <img src="Logo.png" alt="Logo" width="80" height="110" margin-right="10">
      </div>
      <div id="div2">
          <h1> More for less </h1>
      </div>
      
      
    </div>
  
</header>
        
         <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul id="nav" class="nav navbar-nav">
      <li><a href="#">Groceries</a></li>
      <li><a href="#">Clothes</a></li>
      <li><a href="#">Electronics</a></li>
    </ul>
       <ul id="nav2" class="nav navbar-nav navbar-right">
        <li><a href="basket.php">View Trolley</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Sign Up</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">More</a></li>
          </ul>
  </div>
</nav>
        
        
        <div class="trolleyText">
            
       
        </div>

      <!-- this is the view to show when successfully pulling data from db -->
      <?php
	 if (isset($result) && $result != false) {
	    ?>
      <div class="trolleytext"
      <h1>
            Product: <?= ($result->name); ?> <br />
            Price: £<?= ($result->price); ?> <br />
            Description: <?= ($result->description); ?> <br />
            </h1>
            <img src="<?= ($image_location . $result->img_url); ?>" />


            <form action="" method="POST">
      	 <select name="quantity">
      	    <option value="1">1</option>
      	    <option value="2">2</option>
      	    <option value="3">3</option>
      	    <option value="4">4</option>
      	    <option value="5">5</option>
      	 </select>
      	 <input type="submit" name="add" value="add to basket" />
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
    <input type="submit" value="Back to home">
</form>
      </div>
   </body>
</html>
