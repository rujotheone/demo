<?php session_start(); 
$_SESSION["redirect"]="create.php";

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
  <link rel="stylesheet" href="css/uniq_home.css">
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap-3.3.1.min.js"></script>

  <style type="text/css">
  



  </style>
   <script></script>


</head>
<body>
<div  class="navbar">
  <div class="login-con">
    <form role="form" class="form-inline" action="login.php" method="post" >
     
    <div class="form-group">        
        <label for="username">Username</label>
         <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
      </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-default">Login</button>
      </div>

    </form>
    <div id="instructionLogin">
      <h4> <?php 
      if (isset($_SESSION["errorlogin"] ) || $_SESSION["errorlogin"]=" ")
      echo $_SESSION["errorlogin"]; 
    
      ?> </h4>
    </div>
  </div> 
</div>
      
    

    <div  class="signup-container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">

    <form role="form" action="signup.php" method="post" >
      <img class="img img-rounded">
      <div id="instructionSign">
       <h4> <?php 
       if (isset($_SESSION["errorsign"]) || $_SESSION["errorsign"]=" ")
       echo $_SESSION["errorsign"]; 
       ?> </h4>
       <H1> SIGN UP </H1>
    </div>
  
      <div class="form-group">        
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <div class="form-group">
        <label for="comparepassword">Re-Enter Password</label>
        <input type="password" class="form-control" id="comparepassword" name="comparepassword" placeholder="Re-enter password">
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-default">Submit</button>
      </div>
      </form>
    
       </div> 
      </div>

      <?php include ('footer.php'); ?>
      </div>
    


  </body>