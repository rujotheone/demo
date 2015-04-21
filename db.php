<?php
$servername ="localhost";
$username ="rujo";
$password="techtech";
$dbname= "rexcheck";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}


$sql="CREATE TABLE IF NOT EXISTS currency (
	currencyID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	currencyname VARCHAR(40) NOT NULL,
    reg_date TIMESTAMP
    )";

if (mysqli_query($con, $sql))
	{echo "success";}
else
	{echo "error creating 1st table". mysqli_error($con);}


$sql="CREATE TABLE IF NOT EXISTS data (
	dataID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	currencyID INT(6) UNSIGNED NOT NULL ,
    reg_date TIMESTAMP,
    value FLOAT(10,5) ,
    enteredTime TIME,
    enteredDate  DATE,
    FOREIGN KEY (currencyID) REFERENCES currency(currencyID) ,
    CONSTRAINT fkcurdata FOREIGN KEY (currencyID) REFERENCES currency(currencyID)
    )";

if (mysqli_query($con, $sql))
	{echo "success";}
else
	{echo "error creating 2nd table". mysqli_error($con);}


mysqli_close($con);

?>