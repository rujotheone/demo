<?php 
session_start(); 
$_SESSION["redirect"]="update.php"; 
if (!isset($_SESSION["loggedin"]))
{
header('Location:index.php');
}

?>
<!doctype html>
<html>

<head>

  <title>Create Currency</title>

    <meta charset="utf-8">
   <meta name="create" content="create currency" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="css/bootstrap-3.3.1.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/pretty.css">
  <link rel="stylesheet" href="css/template.css">
  <link rel="stylesheet" href="css/uniq_update.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap-3.3.1.min.js"></script>
  <script src="js/moment-locales.js"></script>
  <script src="js/transition.js"></script>
  <script src="js/collapse.js"></script>
  
  <script src="js/bootstrap-datetimepicker.js"></script>

 <script type="text/javascript" >
      $(document).ready(
      	function(){
        $('#datepicker').datetimepicker({
          format:'DD/M/YYYY',
          showTodayButton:true
          }),

        $('#timepicker').datetimepicker({
          format:'LT'
          });
        

      });     

 </script>

<style type="text/css">

.input-group .form-control {z-index: 0;}
</style>

</head>
<body>
  <?php include ('header.php');?>
  <div class="banner">
    <img src="">
    <span class="info">
    With Rexchek you can input the values
     of your currency pairs with the time and date of the value    
   </span>
</div>

	<div class="container">
		<div class="row">
             <div class="col-lg-9">
         
         <form role="form" action="/rexcheck/actioncreate.php" method="post" >
          <img class="img img-rounded">
      <div id="instruction">
        Enter the currency and the values at each date and time.
    </div>
    <input type="hidden" value="update" name="activate" >
    	<div class="form-group">
    		<label for="Currency">Currency</label>
    		<input type="text" class="form-control" id="currency" name="currency" placeholder="enter currency">
        </div>


        <div class="form-group" >
    		<label for="Date">Date</label>
    		<div class="input-group" id="datepicker">
    		<input  type="text" class="form-control" id="date" name="date" placeholder="Enter Date" >
    		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
       </div>
       </div>

        <div class="form-group">
    		<label for="time">time</label>
    		<div class="input-group" id="timepicker">
    		<input type="text" class="form-control" id="time" name="time" placeholder="enter time">
    		<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        </div>
    </div>

        <div class="form-group">
    		<label for="Value">Value</label>
    		<input type="text" class="form-control" id="value" name="value" placeholder="enter value">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Submit</button>
    	</div>
        <div id="confirm">
         <span>
          <?php  
            if(isset($_SESSION["confirm"]))
              echo $_SESSION["confirm"]; 
            ?>
        </span>
      </div>

    </form>
   




             </div>

		</div>
	</div>


<?php include ('footer.php');?>
	</body>
</html>