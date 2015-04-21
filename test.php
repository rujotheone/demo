<?php 
$servername ="localhost";
$username ="root";
$password="";
$dbname= "test";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}

       $test = array();
       $id=1;
      $sql="SELECT * FROM currency ";

       $result= mysqli_query($con,$sql);

        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
               $currencyid=$row["currencyID"];
               echo $currencyid;
            }
        }
             else
             {
                  echo "No results";
              }
            
           
            echo '</br>';
            echo '</br>';
            print_r($test);

            $val=array(1,0.5,3);
            $sum=array_sum($val);
            $count=sizeof($val);
             $average=$sum/$count;

             echo "the sum is".$sum;
             echo "the number of elements is".$count;
             echo "the average is".$average;

          /*   for($i=0;$i<mysqli_num_rows($result);$i++)
            	echo $test[$i];

     $db= new mysqli($servername,$username,$password,$dbname);
      $result = $db->query("select * from users");
      $names=$result->fetch_all(MYSQLI_ASSOC);

      print_r($names);

      foreach($names as $key => $value){
           foreach ($value as $keyn => $values )
           	{echo  $values."\n";}
          }*/


   class test{
       public $a;
       
       function test($see){
        echo $see;
        
        
       }

       function prin($use){
        $this->a=$use;
        print_r($this->a);
       }

   }
  
  $use=array(1,2,3);
 $a=new test('see');
 $a->prin($use);

 $stamp=strtotime('17-03-2015');
 $newd=date('Y-m-d',$stamp);

  echo $newd;
?>