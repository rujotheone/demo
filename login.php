<?php 

session_start();

 require_once ('functions.php');

      $username=$_REQUEST['username'];
      $password=$_REQUEST['password'];
      $passhash=hash('sha512', $password);

      $u=new Usermanagement();
      $u->login($username,$passhash);

     



?>
