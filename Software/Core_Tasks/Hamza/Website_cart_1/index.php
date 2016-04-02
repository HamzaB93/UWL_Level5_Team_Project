<?php
   require_once "includes/basket_session.php";

   if (!isset($_SESSION['basket'])) {
      $_SESSION['basket'] = array();
   } else {
      $basket = $_SESSION['basket'];
   }

// Prevent malicious code execution.
   $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
   $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
<head>
  <title>Group Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
            
             $(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});
            
 
        
        </script>
  <style>
      
   /*Buttons */
   
   @media ( max-width: 585px ) {
    .input-group span.input-group-btn,.input-group input,.input-group button{
        display: block;
        width: 100%;
        border-radius: 0;
        margin: 0;
        margin-top: 10px;
        
        
    }
    .input-group {
        position: relative;   
        
    }
    .input-group span.data-up{
        position: absolute;
        top: 0;
        
    }
    .input-group span.data-dwn{
        position: absolute;
        bottom: 0;
       
    }
    .form-control.text-center {
        margin: 34px 0;
       
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
        margin-left:0;
       
        
    }

}
   
      
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
    background: linear-gradient(#08CF08, white, white, white, white, white, white); /* For browsers that do not support gradients */
    background-repeat: no-repeat;
   
    
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
      <!-- First Nav Bar-->
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
    
    
    <div id="body"></div>
    
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
        <img src="apples2.jpg" alt="New York" width="800" height="500">
        <div class="carousel-caption">
          <h3>Apples</h3>
          <p>We have deals on apples</p>
        </div>      
      </div>

      <div class="item">
        <img src="soap.png" alt="Chicago" width="800" height="500">
        <div class="carousel-caption">
          <h3>Soap</h3>
          <p>We have deals on soap</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="fruit.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Fruit</h3>
          <p>Check out our deals on fruit</p>
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

<div class="container">
  <div class="row row-centre">
    <div class="col-sm-4">
      <img src="apples2.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
      <h3>
          <p1> <a href="product.php?id=1000">Apples</a> </p1> <br />
      </h3>
     <div class="input-group number-spinner">
				<span class="input-group-btn data-dwn">
					<button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="1" min="0" max="50">
				<span class="input-group-btn data-up">
					<button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
      <div>
          
    </div>
    </div>
    <div class="col-sm-4">
      <img src="apples2.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
      <h3>
          <h1> <a href="product.php?id=1001">Bananas</a> </h1> <br />
      </h3>
      
			
		</div>
      
      <div class="col-sm-4">
      <img src="apples2.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
       </div>
		
  </div>
      
      
      
      
      
      
      
    
    
    </div>
      <footer class="masthead">
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
