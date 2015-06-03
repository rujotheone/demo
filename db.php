<?php
$servername ="localhost";
$username ="rujo";
$password="techtech";
$dbname= "rexcheck";

$con =mysqli_connect($servername,$username,$password,$dbname);

if (!$con){
	die ("connection failed");
}

$sql="CREATE TABLE IF NOT EXISTS users (
	userID INT(6)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(40) NOT NULL UNIQUE,
    passhash VARCHAR(200) NOT NULL UNIQUE
    )";

if (mysqli_query($con, $sql))
	{echo "success creating USERS table";}
else
	{echo "error creating USERS table". mysqli_error($con);}


$sql="CREATE TABLE IF NOT EXISTS currency (
	currencyID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	currencyname VARCHAR(40) NOT NULL,
    reg_date TIMESTAMP,
    userID INT(6) NOT NULL ,
    FOREIGN KEY (userID) REFERENCES users(userID) ,
    CONSTRAINT fkusercur FOREIGN KEY (userID) REFERENCES users(userID)
    )";

if (mysqli_query($con, $sql))
	{echo "success creating 1st table";}
else
	{echo "error creating 1st table". mysqli_error($con);}


$sql="CREATE TABLE IF NOT EXISTS data (
	dataID INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	currencyID INT(6) UNSIGNED NOT NULL ,
    reg_date TIMESTAMP,
    value FLOAT(10,5) ,
    enteredTime TIME,
    enteredDate  DATE,
    userID INT(6) NOT NULL ,
    FOREIGN KEY (currencyID) REFERENCES currency(currencyID) ,
    FOREIGN KEY (userID) REFERENCES users(userID),
    CONSTRAINT fkcurdata FOREIGN KEY (currencyID) REFERENCES currency(currencyID),
    CONSTRAINT fkuserdata FOREIGN KEY (userID) REFERENCES users(userID)
    )";

if (mysqli_query($con, $sql))
	{echo "success creating 2ND table";}
else
	{echo "error creating 2nd table". mysqli_error($con);}


mysqli_close($con);

?>