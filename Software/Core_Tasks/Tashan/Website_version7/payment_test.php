<?php
//Get the files from other areas of the project
require_once "includes/db.php";
  require_once "classes/BasketItem.php";
  require_once "includes/basket_session.php";
  
  
  
  
  
  
  ?>
   
<form action="" method="POST">
    <!-- Gets the payment code and security code from the user -->
        Payment Code: <input type="text" name="payment_code"></br>
    
        Security Code: <input type="text" name="security_code"><br>
        
        <!--Button-->
        <input id="buttonDesign" type="submit" name="confirm" value="Confirm payment" />
        </form>
    

<?php
//If statement- should only run when the button has been clicked
if (isset($_POST['confirm'])) {
    //Tried to fix the errors
    $result = false;
    
    //Gets the security from the form
    $security_code = $_POST['security_code'];
    
    //Gets the card code from the form
    $card_code = $_POST['payment_code'];
    //Connects to the database
    global $conn;
      ////prepares an SQL function to retrieve the current loyalty points
      $sql = $conn->prepare("SELECT * FROM `customer_payment1`
              WHERE `security_code` = :code");
      //Binds the paramater for extra security: cant enter SQL code into field
      $sql->bindParam('code', $security_code);
      //Execute the SQL command
      $sql->execute();

      //makes the result variable the SQL object
      $result = $sql->fetchObject();
      
      //checks the result from the database exists
      if ($result != false){
		  //makes a variable called real card code - this is the real card number assosicated with that security code
      $real_card_code = $result->card_number;
	  //Checks real card code is equal to the card number they entered
      if ($real_card_code === $card_code){
		  //echos that they entered the correct details
          echo "You entered the correct details </br>";
		  //echos each of their details form the database
          echo "Name: " , $result->cardholder_name, "</br>";
          echo "Card number: " , $real_card_code, "</br>";
          echo "security code: " , $result->security_code, "</br>";
		  
		  $balance = $result->balance;
		  
		  $newBalance = 250;
		  
		  echo "Balance = " , $balance , "</br>";
		  
		  
		  $sql = $conn->prepare("UPDATE `customer_payment1` SET `balance` = '$newBalance' WHERE `security_code` = '$security_code'");
              $sql->execute();
			  
		
		
			  
		  //echo "<meta http-equiv='refresh' content='0; index.php'>";
          
      }
	  //If the real card code does not match the one they entered
      else {
          echo "You entered the incorrect details </br> ";
      }
      
  } else{
	  //if the result from the database does not exist
      echo "This does not exist";
  }
}
