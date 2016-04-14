<?php

  require_once "includes/db.php";
  require_once "classes/BasketItem.php";
  /*
   * Function to add a BasketItem object to the session (basket).
   * If the session does not exist, instantiate it as an empty array, then
   * 	 recall the function.
   * If the session does exist, check to see if the item already is in the
   * 	 session. If it is, get the old quantity and add it to the new. If not,
   * 	 simply add the item to the session.
   * BasketItem objects must be serialised to maintain class information.
   */

  function addToBasket($id, $basket_item) {
      if (isset($_SESSION['basket'])) {
          if (array_key_exists($id, $_SESSION['basket'])) {
              $item = unserialize($_SESSION['basket'][$id]);
              $basket_item->set_quantity($basket_item->get_quantity() + $item->get_quantity());
              $_SESSION['basket'][$id] = serialize($basket_item);
          } else {
              $_SESSION['basket'][$id] = serialize($basket_item);
          }
      } else {
          $_SESSION['basket'] = array();
          addToBasket($id, $basket_item);
      }
    
  }

  /*
   * Function to remove a BasketItem from the session (basket.)
   * First check that the item actually exists, if it does then unset that
   * 	 array index. If the basket is then empty, unset the session.
   * If the session doesn't exist, or the item doesn't exist, then there has
   * 	 been an error.
   */

  function removeFromBasket($id) {
      if (isset($_SESSION['basket'])) {
          if (array_key_exists($id, $_SESSION['basket'])) {
              unset($_SESSION['basket'][$id]);
              if (getBasketCount() === 0) {
                  unset($_SESSION['basket']);
              }
          } else {
              echo "Item isn't in the basket.";
          }
      } else {
          
      }
  }

  /*
   * Function to return the amount of BasketItem objects in the 
   * session (basket).
   */

  function getBasketCount() {
      if (isset($_SESSION['basket'])) {
          return count($_SESSION['basket']);
      }
  }

  /*
   * Function to return the value of all BasketItems contained within the
   * session (basket). Will loop through all items contained within the 
   * basket, first multiplying their value by their quantity, then adding that
   * to the value of the basket_value variable, which is later returned.
   */

  function getBasketValue() {
      if (isset($_SESSION['basket'])) {
          $basket_value = 0;
          foreach ($_SESSION['basket'] as $key => $value) {
              $value = unserialize($value);
              $basket_value += $value->get_price() * $value->get_quantity();
          }
          return number_format($basket_value, 2);
      }
  }

  function updateStock() {
      if (isset($_SESSION['basket'])) {
          foreach ($_SESSION['basket'] as $id => $value) {
              global $conn;
              $sql = $conn->prepare("SELECT `stock` FROM `products` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $value = unserialize($value);

              $result = $sql->fetchObject();
              $stock = $result->stock;
              $newstock = $stock - $value->get_quantity();

              if ($newstock <= 20) {
                  $newstock = 50;
              }

              $sql = $conn->prepare("UPDATE `products` SET `stock` = '$newstock' WHERE `id` = '$id'");
              $sql->execute();
              removeFromBasket($id);

              // Just for testing purposes
              //print "Updated.";
          }
      }
  }

  ////////////////// Payment Functions //////////////////////

  function updateLoyaltyPoints() {
      global $conn;

      //Gets the price of the basket 
      $price = getBasketValue();
      //Gets the loyalty points by rounding down the price
      $loyaltyPoints = floor($price);
      

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
      
      if ($result != false) {
          
          echo "The Current Price is: £", $price, "</br>";
      echo "</br>";
      
      echo "The Loyalty points From this purchase are: ", $loyaltyPoints, "</br>";
      echo "</br>";
      echo "</br>";
          
      
      //Makes a newpoints variable that is the points propeerty of the SQL object
      //and gets the current loyaylty points from the basket function
      $currentPoints = $result->Points;
      $name = $result->Name;
      echo "Customer Name: ", $name, "</br>";
      echo "Current Points: ", $currentPoints, "</br>";
      echo "</br>";
      $newpoints = $result->Points + $loyaltyPoints;

      //Starts an if statment if the new loyaylty points are less than 500
      if ($newpoints < 500) {
          //Updates the database with the new points added
          $sql = $conn->prepare("
            UPDATE `loyalty_points`
            SET `points` = '$newpoints'
            WHERE `id` = :id");
          $sql->bindParam('id', $loyalty_code);
          $sql->execute();


          
          echo "</br>";
          echo "New Points: ", $newpoints, "</br>";
          echo "</br>";
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

          
          echo "</br>";
          echo "The new points are: ", $newpoints, "</br>";


          
          $price = $price * 0.8;
          echo "</br>";
          $price =  number_format((float)$price, 2, '.', '');
          echo "The new price is £", $price;
  }}
  else {
      echo "The id entered is incorrect, Please try again.";
  }
  }
  
  function trolleyNumber() {
      
      $basket_number = getBasketCount();
      
      if ($basket_number === 0) {
      $basket_number = null;
      }
      return $basket_number;
   }
  