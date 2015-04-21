<?php
     session_start();
     require_once ('functions.php');

     $d = new DataManagement();

    if (!isset($_REQUEST['activate'])) $_REQUEST['activate']="activate";

     if ($_REQUEST['activate'] =='create')
     {
     $base=$_REQUEST['base'];
     $base=strtoupper($base);

     $compare=$_REQUEST['compare'];
     $compare=strtoupper($compare);

     $currency=$base.'/'.$compare;

     $d->create($currency);
     
      
   if ($d->create($currency)=="success")
        $_SESSION["confirm"] = "Success entering the new currency pair";
   else
        $_SESSION["confirm"] = "OOps! there was a problem";
       

       header('Location: index.php#instruction');
       mysqli_close($con);
      


   

    }

     if ($_REQUEST['activate']=='update')
     {
     $currencyinput=$_REQUEST['currency'];
     $currencyinput=strtoupper($currencyinput);

     $time= $_REQUEST['time'];

     $date=strtotime($_REQUEST['date']);
     $date=date('Y-m-d',$date);

     $value = $_REQUEST['value'];
     
    $tag = $d->update($currencyinput,$date,$time,$value);

     if ($tag=="success")
        $_SESSION["confirm"] = "Success entering the values";
    else
        $_SESSION["confirm"] = "OOps! there was a problem";
     
       
      header('Location: update.php#confirm');
  
    }

    

    








?>