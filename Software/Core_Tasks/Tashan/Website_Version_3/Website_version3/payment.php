<?php
  //getting the other files code
  require_once "includes/db.php";
  require_once "includes/basket_session.php";
  //Establishing the database connection
  global $conn;
  
  
  $price = getBasketValue();
  $loyaltyPoints = floor($price);
  echo "The Price is: £" , $price , "</br>";
  echo "The Loyalty points are: " , $loyaltyPoints , "</br>";
  echo "</br>";
  echo "This means that " , $loyaltyPoints , " Loyalty points will be added to which ever id is entered into the field </br>";
  echo "If they have more than 500 points already it should deduct 500 points and take 20% from the price </br>";
  echo "If they have less it will just add the points";
  echo "</br>";
  

  //If the confirm button is clicked
//  if (isset($_POST['confirm'])) {
//      //The loyalty code variable is whatever is enter into the field
//      $loyalty_code = $_POST['loyalty_code'];
//      ////prepares an SQL function to retrieve the current loyalty points
//      $sql = $conn->prepare("SELECT * FROM `loyalty_points`
//              WHERE `id` = :code");
//      //Binds the paramater for extra security: cant enter SQL code into field
//      $sql->bindParam('code', $loyalty_code);
//      //Execute the SQL command
//      $sql->execute();
//
//      //makes the result variable the SQL object
//      $result = $sql->fetchObject();
//      //Makes a newpoints variable that is the points propeerty of the SQL object
//      //and gets the current loyaylty points from the basket function
//      $currentPoints = $result->Points;
//      echo "Current Points: " , $currentPoints , "</br>";
//      $newpoints = $result->Points + getLoyaltyPoints();
//
//      //Starts an if statment if the new loyaylty points are less than 500
//      if ($newpoints < 500) {
//          //Updates the database with the new points added
//          $sql = $conn->prepare("
//            UPDATE `loyalty_points`
//            SET `points` = '$newpoints'
//            WHERE `id` = :id");
//          $sql->bindParam('id', $loyalty_code);
//          $sql->execute();
//          
//          print "New Loyalty Points: " + $newpoints;
//          
//      } else {
//          //Otherwise it gets the newpoints and takes 500 from them
//          $newpoints = $newpoints - 500;
//          //Updates the loyalty points with 500 points gone 
//          $sql = $conn->prepare("
//            UPDATE `loyalty_points`
//            SET `points` = '$newpoints'
//            WHERE `id` = :id");
//          //Binds the parameters
//          $sql->bindParam('id', $loyalty_code);
//          //Executes the SQL function
//          $sql->execute();
//          
//          //Get the basket price and Multiply it by 0.2
//          //Return the basket price
//          
//          $price = getBasketValue();
//          $price = $price * 0.8;
//          print "new price: " + $price + "</br>";
//      }
//  }
?>

<html>

    <p1>
        Please enter ID
    </p1><br>

    <form action="" method="POST">
        Loyalty Code: <input type="text" name="loyalty_code"><br>
        <input type="submit" name="confirm" value="Confirm ID" />
    </form>
    
    
    <?php
      
      if (isset($_POST['confirm'])) {
      //The loyalty code variable is whatever is enter into the field
      $loyalty_code = $_POST['loyalty_code'];
      ////prepares an SQL function to retrieve the current loyalty points
      $sql = $conn->prepare("SELECT * FROM `loyalty_points`
              WHERE `id` = :code");
      //Binds the paramater for extra security: cant enter SQL code into field
      $sql->bindParam('code', $loyalty_code);
      //Execute the SQL command
      $sql->execute();

      //makes the result variable the SQL object
      $result = $sql->fetchObject();
      //Makes a newpoints variable that is the points propeerty of the SQL object
      //and gets the current loyaylty points from the basket function
      $currentPoints = $result->Points;
      echo "Current Points: " , $currentPoints , "</br>";
      $newpoints = $result->Points + getLoyaltyPoints();

      //Starts an if statment if the new loyaylty points are less than 500
      if ($newpoints < 500) {
          //Updates the database with the new points added
          $sql = $conn->prepare("
            UPDATE `loyalty_points`
            SET `points` = '$newpoints'
            WHERE `id` = :id");
          $sql->bindParam('id', $loyalty_code);
          $sql->execute();
          
          
          echo "There were less than 500 points </br>";
          echo "New Points: " , $newpoints , "</br>";
          echo "The price has not been affected";
          
      } else {
          //Otherwise it gets the newpoints and takes 500 from them
          $newpoints = $newpoints - 500;
          //Updates the loyalty points with 500 points gone 
          $sql = $conn->prepare("
            UPDATE `loyalty_points`
            SET `points` = '$newpoints'
            WHERE `id` = :id");
          //Binds the parameters
          $sql->bindParam('id', $loyalty_code);
          //Executes the SQL function
          $sql->execute();
          
          //Get the basket price and Multiply it by 0.2
          //Return the basket price
          
          echo "There were more than 500 points </br>";
          echo "The new points are: " , $newpoints , "</br>";
          
          
          $price = getBasketValue();
          $price = $price * 0.8;
          echo "</br";
          echo "Because there were more than 500 points the price has been taken down by 20% </br>";
          echo "The new price is £" , $price;
          
      }
  }
      
      
      
      
      
      
      
      ?>

</html>

