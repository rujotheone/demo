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
        $('#datepicker1').datetimepicker({
          format:'DD/M/YYYY',
          showTodayButton:true
          }),


        $('#timepicker').datetimepicker({
          format:'LT'
          });
        $('#timepicker1').datetimepicker({
          format:'LT'
          });
        

      });     

 </script>

   <script src="js/flashcanvas.js"></script>
  <script src="js/flot.demo.js"></script>
  <script src="js/jquery.flot.min.js"></script>


   <!--[if lte IE 8]>
  <script language="javascript" type="text/javascript" src="excanvas.min.js"></script>
  <![endif]-->

</head>
<body>
  
  <?php include ('header.php');?>

 <form role="form" action="/rexcheck/actioncreate.php" method="post" >

      <div class="form-group">
        <label for="Currency">Currency</label>
        <input type="text" class="form-control" id="currency" name="currency" placeholder="enter currency">
        </div>


        <label for="Date">Date</label>
        <div class="input-group date" id="datepicker">
        <input  type="text" class="form-control"  name="date" placeholder="Enter Date" >
        <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
       </div>
       </div>

       <div class="form-group" >
        <label for="Date">Date</label>
        <div class="input-group date" id="datepicker1">
        <input  type="text" class="form-control"  name="date" placeholder="Enter Date" >
        <span class="input-group-addon"><span class="glyphicon glyphicon-calender"></span></span>
       </div>
       </div>

       <div class="form-group">
        <label for="time">time</label>
        <div class="input-group date" id="timepicker">
        <input type="text" class="form-control" id="time" name="time" placeholder="enter time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        </div>
    </div>

    <div class="form-group">
        <label for="time">time</label>
        <div class="input-group date" id="timepicker1">
        <input type="text" class="form-control" id="time" name="time" placeholder="enter time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        </div>
    </div>



 </form>

  set currency
set dates
set times
get values


<?php include ('footer.php');?>

</body>



</html>