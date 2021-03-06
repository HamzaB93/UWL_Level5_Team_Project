<?php

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
	    $basket_item->set_quantity($basket_item->get_quantity() 
		    + $item->get_quantity());
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
	    echo "Item removed from basket";
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
    * Function to modify the amount of a particular BasketItem in the 
    * session (basket). Whether that be adding to or removing from.
    * TODO: Fully Implement.
    */

   function changeQuantity($id, $basket_item, $operand) {
      switch ($operand) {
	 case "+":
	    echo "add to";
	    break;
	 case "-":
	    echo "minus from";
	    break;
	 default:
	    echo "not recognised";
	    break;
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
   