<?php


 session_start(); 
 require_once ('functions.php');



      $username=$_REQUEST['username'];
      $password=$_REQUEST['password'];
      $comparepassword=$_REQUEST['comparepassword'];

      $passhash=hash('sha512', $password);
      $passhashcompare=hash('sha512', $passwordcompare);
     

      $u=new Usermanagement();
      $u->signup($username,$passhash,$passhashcompare);

     



?>

