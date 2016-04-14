<?php

   class BasketItem {

//  Variables    
      public $name, $price, $description, $quantity, $img_url;

//  Constructor    
      function __construct($name, $price, $description, $quantity, $img_url) {
	 $this->name = $name;
	 $this->price = $price;
	 $this->description = $description;
	 $this->quantity = $quantity;
	 $this->img_url = $img_url;
      }

//  Getters and Setters    
      function get_name() {
	 return $this->name;
      }

      function get_price() {
	 return $this->price;
      }

      function get_description() {
	 return $this->description;
      }

      function get_quantity() {
	 return $this->quantity;
      }

      function get_img_url() {
	 return $this->img_url;
      }
      

      function set_name($name) {
	 $this->name = $name;
      }

      function set_price($price) {
	 $this->price = $price;
      }

      function set_description($description) {
	 $this->description = $description;
      }

      function set_quantity($quantity) {
	 $this->quantity = $quantity;
      }

      function set_img_url($img_url) {
	 $this->img_url = $img_url;
      }
      

//  for debugging purposes    
      public function __toString() {
	 return $this->name .
		 $this->price .
		 $this->description .
		 $this->quantity .
		 $this->img_url;
                 
      }

   }
   