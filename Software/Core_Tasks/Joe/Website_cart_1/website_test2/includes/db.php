<?php

   session_start();

   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "project_eshop";


   try {
      $conn = new PDO("mysql:host=$server;dbname=$database", $username,
	      $password, array(
//		causes the connection to be persistent.		
	  PDO::ATTR_PERSISTENT => true
      ));
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $ex) {
      $ex->getTrace();
   }