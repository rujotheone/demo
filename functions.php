<?php
$servername ="localhost";
$username ="rujo";
$password="techtech";
$dbname= "rexcheck";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}
 
class DataManagement
  {
  	   public $value=array();

  	  function getter()
  	  {
  	  	return $this->value;
  	  }

  	  function setter($value)
  	  {
  	  	$this->value=$value;
  	  }

  	    
        function create($currency)
        {
          unset($con);
            $confirm=" " ;
          $con=$GLOBALS['con'];
        

          $sql ="INSERT INTO currency (currencyname) 
                            VALUES ('$currency')" ;
         
         if (mysqli_query($con, $sql))
            {
            //echo "success creating currency";
              $confirm="success";
            }
          else
             {
              echo "error creating currency". mysqli_error($con);
              $confirm ="failure".mysqli_error($con);
            }
              
          return $confirm;

        }

        function  update($currencyname,$date,$time,$value)
      {
        $confirm=" ";
        $con=$GLOBALS['con'];
        
        if(!$con)
          echo 'error connecting';      

        $query="SELECT currencyID FROM currency where currencyname='$currencyname'";
      
        $result= mysqli_query($con,$query);
        

            while ($row = mysqli_fetch_assoc($result))
            {
               $currencyid=$row["currencyID"];
              // echo " the currency id is ".$currencyid.'</br>';
            }
          


        $sql ="INSERT INTO data (currencyID,value,enteredTime,enteredDate) 
                            VALUES ('$currencyid','$value','$time','$date')" ;
         
         if (mysqli_query($con, $sql))
            { $confirm="success";}
          else
             {
              echo "error updating".mysqli_error($con);
              $confirm ="failure";
          }

           return $confirm;

       }     
        
      

         function show($time,$currency,$date)
      {
        $con=$GLOBALS['con'];

        $query=" SELECT currencyID FROM currency where currencyname=$currency    ";
        $result= mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               $currency=$row["currencyID"];
            }
          }else
             {
                  echo "No results1";
              }

        $sql ="SELECT value FROM data where currencyID=$currency AND 
                       AND enteredDate >='$date'" ;
        $result = mysqli_query($con, $sql);
        $num=mysqli_num_rows($result) ;

          if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               //show data
               
                 $this->value[$row["value"]-1]=$row["value"] ;             
            }
          }else
             {
                  echo "No results2";
              }
 
           }
        



   
 }



       class Stats
   {
       public $value=array();
       

       public  function Stats()
       {
         $d=new DataManagement();
         $values=$d->getter();

       }

       function plot($currency,$datebegin,$timebegin,$dateend,$timeend)
       {
          $con=$GLOBALS['con'];

        $query=" SELECT currencyID FROM currency where currencyname=$currency";
        $result= mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               $currency=$row["currencyID"];
            }
          }else
             {
                  echo "No results1";
              }

          $sql=" SELECT value from data where currencyID=$currency AND 
                  enteredDate>=$datebegin and enteredDate <=$dateend and
                  enteredTime >= $timebegin and enteredTime  <= $timeend";

               $result = mysqli_query($con, $sql);
              

          if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               //show data
               
                 $this->value=$row["value"] ;             
            }
          }else
             {
                  echo "No results";
              }
              return $value;

       }
   	  function Average()
      {
        $sum=array_sum($this->values);
        $count=sizeof($this->values);
        $average=$sum/$count;
      }
   	  function NegativeGrad(){}
   	  function PositiveGrad(){}
   	  function Regression(){}
   }

  
?>