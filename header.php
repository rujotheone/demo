
<div class="navbar" >
   <ul class="nav nav-tabs">
        <li><a href="create.php">Home</a></li>
        <li><a href="update.php">Update</a></li>
        <li><a href="stats.php">Stats</a></li>
    <ul>
<div id="user" style="position:absolute;right:80px">
<?php
$Propername=ucfirst($_SESSION["username"]);
$loggedstate;
if ($_SESSION["loggedin"]==true)
{
	$loggedstate="logged in";
}else $loggedstate="logged out";


echo "Hi, <b>".$Propername."  </b> "."\r\n" ;
?>
<ul class="nav nav-tabs" style="float:right" >
<li><a href="logout.php">Log out</a></li>
</ul>

</div>

</div>



