<?php
session_start();


require_once('functions.php');
$l=new UserManagement();
$l->logout();

?>