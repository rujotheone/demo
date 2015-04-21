<?php
session_start();
 require_once ('functions.php');

$s= new Stats();

 if ($_REQUEST['activate']=='stats')
     {
     	$currency=$_REQUEST['activate'];
     	$currency=strtoupper($currency);

     	
     	$datebegin=strtotime($_REQUEST['activate']);
     	$datebegin=date('Y-m-d',$datebegin);

     	$timebegin=$_REQUEST['activate'];

     	$dateend=strtotime($_REQUEST['activate']);
     	$dateend=date('Y-m-d',$dateend);

     	$timeend=$_REQUEST['activate'];

        $values=array();
    $values = $s->plot($currency,$datebegin,$timebegin,$dateend,$timeend);
     


   
    $s->Average;
    $s->NegativeGrad();
    $s->PositiveGrad();
    $s->Regression();
}



?>