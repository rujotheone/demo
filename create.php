<?php session_start();
 $_SESSION["redirect"]="index.php";
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
  <link rel="stylesheet" href="css/uniq_create.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap-3.3.1.min.js"></script>
  <script src="js/moment-locales.js"></script>
  <script src="js/transition.js"></script>
  <script src="js/collapse.js"></script>

  
  
  <script src="js/bootstrap-datetimepicker.js"></script>
  <script>
  $(document).ready(function(){
 
 
})

  </script>

</head>
<body>
  
  <?php include ('header.php');?>
  <div class="banner"><img src="">
    <span class="info">
    Rexcheck allows you to aggregrate and visualize your forex data
    </span>
    
</div>


  <div  class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">

    <form role="form" action="/rexcheck/actioncreate.php" method="post" >
      <img class="img img-rounded">
      <div id="instruction">
        Enter the new currency
    </div>
    <input type="hidden" value="create" name="activate" >
    	<div class="form-group">        
    		<label for="basecurrency">Base Currency</label>
    		<input type="text" class="form-control" id="base" name="base" placeholder="enter base currency">
        </div>
        <div class="form-group">
    		<label for="comparecurrency">Other Currency</label>
    		<input type="text" class="form-control" id="compare" name="compare" placeholder="enter other  currency">
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
       </div> 
      </div>
      </div>
    </form>

    <section id="section"></section>



<?php include ('footer.php'); ?>

</body>



</html>