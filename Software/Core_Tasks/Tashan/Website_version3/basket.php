<?php
   require_once "includes/db.php";
   require_once "includes/basket_session.php";
   require_once "classes/BasketItem.php";

   if (isset($_GET['unset'])) {
      $id = $_GET['unset'];
      removeFromBasket($id);
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
        <li><a href="trolley.html">View Trolley</a></li>
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
            $totalPrice = getBasketValue();
            print "Total Price: &pound$totalPrice";
            
            //updateStock();
            
        ?>
             <form action="payment.php">
    <input type="submit" value="Confirm Payment">
             </form>   <br>
                
            <form action="index.php">
    <input type="submit" value="Back to home">
</form>
            </div>
        
   
   </body>
</html>