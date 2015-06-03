<?php
   $servername ="localhost";
$username ="rujo";
$password="techtech";
$dbname= "test";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}

$id=$_REQUEST['first'];

$sql = "SELECT * FROM users WHERE id>$id";
$result= mysqli_query($con,$sql);
$jsonresult=array();

if (mysqli_num_rows($result) > 0)
          {
          	$file=fopen("uploads/name.txt","w") or die("unable to open file");
            while ($row = mysqli_fetch_assoc($result))
            {
               
               $name=$row["id"]."\r\n";
               fwrite($file,$name);
               $jsonresult[($row["id"])-1]= (int) $row["id"] ;
               

            }
            fclose($file);
            echo json_encode($jsonresult);
              }
         


?>