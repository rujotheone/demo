<?php
$servername ="localhost";
$username ="rujo";
$password="techtech";
$dbname= "rexcheck";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}

class UserManagement
{
   function logout(){
        $_SESSION["loggedin"]=false;
        $_SESSION["userid"]=array();
        session_destroy();
       header('Location:index.php');

   }

    function signup($username,$password,$passhashcompare)
    {
           $con=$GLOBALS['con'];           
          
          
           $sql="SELECT username FROM users where username='$username'";

          $result= mysqli_query($con,$sql);
           if (mysqli_num_rows($result)==0)
           {
                   //username doesnt exist
             if ($passhash==$passhashcompare) //passwords compare correctly
               {
            $sql="INSERT INTO users (username,passhash) VALUES ('$username','$password')";
            mysqli_query($con,$sql);
            echo mysqli_error($con);

             $this->login($username,$password);
                } else{
                  $_SESSION["errorsign"]="Your passwords don't match";
                  header('Location:index.php#instructionSign');
                  
                     }
               
            }
            else
             {

               $_SESSION["errorsign"]= "Username already exists";
               $_SESSION["errorlogin"]=" ";
              header('Location:index.php#instructionSign');
              
                
              }
 
              //end signup
    }
    function login($username,$password)
    {
      $con=$GLOBALS['con'];
      
      

           $sql="SELECT userID,username  FROM users WHERE username='$username' 
                           AND passhash='$password'";

           $result= mysqli_query($con,$sql) ;
           echo mysqli_error($con);

      
            if (mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result))
              {
                
                $_SESSION["userid"]=$row["userID"];
                 $_SESSION["username"]=$row["username"];
                $_SESSION["loggedin"]=true;
                header('Location:'.$_SESSION["redirect"]);

              }
            }
            else
            {
              $_SESSION["loggedin"]=false;
              $_SESSION["errorlogin"]="Error logging in";
              $_SESSION["errorsign"]=" ";
              header('Location:index.php#instructionLogin');
            
            }
           
    //end login
    }

//end user  management
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
          
            $confirm=" " ;
          $con=$GLOBALS['con'];
          $userid=$_SESSION["userid"];
        

          $sql ="INSERT INTO currency (currencyname,userID) 
                            VALUES ('$currency','$userid')" ;
         
         if (mysqli_query($con, $sql))
            {
            //echo "success creating currency";
              $confirm="success";
            }
          else
             {
              echo  mysqli_error($con);
              $confirm ="failure".mysqli_error($con);
            }
              
          return $confirm;

        }

        function  update($currencyname,$date,$time,$value)
      {
        $confirm=" ";
        $con=$GLOBALS['con'];
        $userid=$_SESSION["userid"];

        
        if(!$con)
          echo 'error connecting';      

        $query="SELECT currencyID FROM currency where currencyname='$currencyname' 
                          AND userID='$userid'";
      
        $result= mysqli_query($con,$query);
        

            while ($row = mysqli_fetch_assoc($result))
            {
               $currencyid=$row["currencyID"];
              // echo " the currency id is ".$currencyid.'</br>';
            }
          
         

        $sql ="INSERT INTO data (currencyID,value,enteredTime,enteredDate,userID) 
                         VALUES ('$currencyid','$value','$time','$date','$userid')" ;
         
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
      

        $query="SELECT currencyID FROM currency where currencyname=$currency  
                       AND userID='$userid'";
        $result= mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               $currency=$row["currencyID"];
            }
          }else
             {
                  echo "No results to show";
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
                      return $this->value;
           }
        

//end of class

   
 }



       class Stats
   {
       public $value=array();
       

       public  function Stats()
       {
        

       }

       function plot($currency,$datebegin,$timebegin,$dateend,$timeend)
       {
          $con=$GLOBALS['con'];
          $userid=$_SESSION["userid"];
          

        $query="SELECT currencyID FROM currency where currencyname='$currency'
                         AND userID='$userid'";
        $result= mysqli_query($con,$query) or die("error query");

        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               $currency=$row["currencyID"];
               //echo "--".$currency."--";
            } 
          }else
             {
                 // echo "No currency";
              }


          $sql="SELECT value  FROM  data  WHERE  currencyID ='$currency' 
                AND enteredDate >= '$datebegin' AND enteredDate <= '$dateend'
                OR enteredTime >='$timebegin'   AND enteredTime <= '$timeend'
                AND userID='$userid'";

          $result = mysqli_query($con, $sql) or die(mysql.error());
              

          if (mysqli_num_rows($result) > 0)
          {
            $i=0;
             while ( $row = mysqli_fetch_assoc($result) )
            {
               //show data
                $this->value[$i]= $row["value"];
               // echo $this->value[$i];
                $i++;

            }
          }else
             {
                  //echo "No values" . mysqli_error($con);
              }
              return $this->value;

       }
   	  function Average()
      {
        $sum=array_sum($this->value);
        $count=sizeof($this->value);
        $average=$sum/$count;
      }
   	  function NegativeGrad(){}
   	  function PositiveGrad(){}
   	  function Regression(){}
   }

  
?>