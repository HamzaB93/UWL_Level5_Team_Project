<!DOCTYPE html>

<?php
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  require_once "classes/BasketItem.php";#
  
  $image_location = "/Website_version7/images/";
  
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
			#mainContent .carddetails { float: left; background:gray; border-radius: 15px; margin-left:200px; padding: 10px; width: 800px}
			#mainContent #carddetails2 { color: #000000; float: none; text-align:center; 
			#mainContent #carddetails2 h6 { margin: 2px 0 2px 0; }
			#mainContent .methods { background:#e6e6e6; margin: 5px 0px 0px 175px; float:left; width: 400px; border-radius: 15px; padding:5px;}
			#mainContent .cardImage { float: left;  color:FFF;}
			#mainContent .proceedPayment { color:#FFF; margin:135px 10px 10px 10px; width: 150px; height: 45px; background:#00e600; border-radius: 10px; border: 4px outset #FFF;}
			#mainContent .cancelPayment { color:#FFF; margin:135px 10px 10px 10px; width: 150px; height: 45px; background:#00e600; border-radius: 10px; border: 4px outset #FFF;}
			
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
			<!---------------------------- Card Datail  ------------------------------>
            
    <div id="mainContent" style="height:inherit; width:940px;">
                    <div class="carddetails">
                    <div align="center" class="cancelPayment">
                    <form id="carddetails2" form action="" method="POST">
                    	
                        <h6>Type of Card :</h6>
                        <input type="text" value="- Card Type -" name="card_type" method="POST" />
                        
                       <br>
                        
                        <h6>Card Number :</h6>
                        <input type="text" value="- Card Number -" name="payment_code" method="POST" />
                     
                        <br>
                        
                        <h6>Security Code :</h6>
                        <input type="text" name="security_code" value="- Security Number -" method="POST" />
                        <br>
                        <h6>Cardholder's Name as it appears on card :</h6>
                        <input type="text" value="- Cardholder's Name -" name="cardholder_name" method="POST"/>
                        <br>
                        
                        <input class="proceedPayment" type="submit" value="Submit Transaction" name="proceed_payment" />                 
                   		</form>
                        
                    <form action="index.php">
                    <input class="cancelPayment" type="submit" value="Cancel Transaction" name="cancel_payment"/>
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
                    
                    
                   <!---- <input class="proceedPayment" type="submit" value="Submit Transaction" name="proceed_payment" />  <input class=/"cancelPayment" type="submit" value="Cancel Transaction" />
                    </div>--->
               	
                
                	</div>
                     <?php
						//If statement- should only run when the button has been clicked
						if (isset($_POST['proceed_payment'])) {
    					//Tried to fix the errors
   						 $result = false;
    
   						 //Gets the security from the form
    					$security_code = $_POST['security_code'];
    
    					//Gets the card type from the form
    					$card_type = $_POST['card_type'];
						
						//Gets the card number from the form
						$card_code = $_POST['payment_code'];
						
						//Gets the card number from the form
						$card_number = $_POST['cardholder_name'];
										
										
    					//Connects to the database
						global $conn;
						
						////prepares an SQL function to retrieve the security code
      					$sql = $conn->prepare("SELECT * FROM `customer_payment1`
              				WHERE `security_code` = :code");
      					//Binds the paramater for extra security: cant enter SQL code into field
      					$sql->bindParam('code', $security_code);
      					//Execute the SQL command
      					$sql->execute();
						
						 //makes the result variable the SQL object
    					$result = $sql->fetchObject();
						
						$balance = $result->balance;
      
      					//checks the result from the database exists
      					if ($result != false){
		 
		 			 //makes a variable called real card code - this is the real card number assosicated with that security code
      				$real_card_code = $result->card_number;
	 
	 			 //Checks real card code is equal to the card number they entered
      			if ($real_card_code === $card_code){
					
		   		// replace newpage with whatever you want
		  		//echos that they entered the correct details
          		echo "You entered the correct details </br>;";
		 
		 		//echos each of their details form the database
          		echo "Name: " , $result->cardholder_name, "</br>";
          		echo "Card Number: " , $real_card_code, "</br>";
          		echo "Security Code: " , $result->security_code, "</br>";
		  		echo "Card Type: " , $result->type_of_cards, "<br>";			
		  		
				//If the balance is enough
		 		if($balance >= $final_price){
					//congrats you have enough money
					//send them to the confirmation page
					//take the final price away from their balance
					$newBalance = $balance - $final_price;
					//echo $balance;
					
					 $sql = $conn->prepare("UPDATE `customer_payment1` SET `balance` = '$newBalance' WHERE `security_code` = '$security_code'");
              			$sql->execute();
						
					echo "<meta http-equiv='refresh' content='0; confirmation.php'>";
				}
				//if the balance is not enough
				else{
					//The balance was not enought, tell them to please try again
					echo "Sorry, There seen be not enough money within your account balance. Please try again";
				}
		  
		  		
          
      }
	  //If the real card code does not match the one they entered
      else {
          echo "You entered the incorrect details";
      }
      
  } else{
	  //if the result from the database does not exist
      echo "This does not exist";
  }
}


///TODO


//Make confirmation page
//confirmation displays the final price of the purchase!
//Link the payments page to the confirmation page
//Button to confirm payments
//Upload to the git
						
                        
                   
                        
                        ?>
            
				</div>
				



</body>
</html>