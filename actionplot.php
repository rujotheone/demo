<?php
session_start();
 require_once ('functions.php');


$s= new Stats();

 if ($_REQUEST['activate']=='stats')
     {
     	$currency=$_REQUEST['currency'];
     	$currency=strtoupper($currency);
        
     	
     	$datebegin=strtotime($_REQUEST['datebegin']);
     	$datebegin=date('Y-m-d',$datebegin);

     	$timebegin=strtotime($_REQUEST['timebegin']);
        $timebegin= date('H:i:s',$timebegin);
       

     	$dateend=strtotime($_REQUEST['dateend']);
     	$dateend=date('Y-m-d',$dateend);

     	$timeend=strtotime($_REQUEST['timeend']);
        $timeend= date('H:i:s',$timeend);
        
        $values=array();
        $values =$s->plot($currency,$datebegin,$timebegin,$dateend,$timeend);

        echo  json_encode($values);
       
       
     }


   
    /*$s->Average();
    $s->NegativeGrad();
    $s->PositiveGrad();
    $s->Regression();*/




?>