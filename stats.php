<?php session_start();
 $_SESSION["redirect"]="stats.php";
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
  <link rel="stylesheet" href="css/font-awesome.min.css">
  
  <style type="text/css">

  .container{
      width: 80%;
      margin-bottom: 40px
      
  }

    .form-group{
       width:40%;
       margin:20px auto;
       }

        #currency{
          width:100% ;
          clear:both;
       }

       #placeholder{
          width:100%;
          height:300px;
          margin:0 auto;
          

       }

  </style>

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
          }),
        $('#timepicker1').datetimepicker({
          format:'LT'
          });
        
               
     $('form').submit(function (event) {
    $.ajax({
        url: 'actionplot.php',
        method: 'POST',
        data : $('form').serialize(),
        processData:false,
        dataType:'json'
        
            })
                .done(function(response){
                  console.log(response);
                  var series=[];
                                  
                  $.each(response, function(i,val){
                
                    series[i]=[i,val];
                  // console.log("series:",series);
                     });console.log("x:",Math.floor((series[series.length-1][0])+1));
                
            

                  var options = {
              series:{
                        lines:{show:true},
                        points: {show: false},
                        color:"blue",
                        label:"first",
                        hoverable:true
              },
              xaxis :{
                show:true,
                position: "bottom",
                max:Math.floor((series[series.length-1][0])+1)
              },
               yaxis :{
                show:true,
                position:"left",
                max:Math.floor((series[series.length-1][1])+1)
              }
             
         };
                  $.plot($('#placeholder'), [

            { data: series  },

               ],

               options
           );
         


                  
                })
                .fail(function(data,status){
                  console.log("error: " +  status);
                })
         event.preventDefault();
         
          });
   

      });     

 </script>

   <script src="js/flashcanvas.js"></script>
  <script src="js/jquery.flot.min.js"></script>
  <script type="text/javascript">
   
  </script>


   <!--[if lte IE 8]>
  <script language="javascript" type="text/javascript" src="excanvas.min.js"></script>
  <![endif]-->

</head>
<body>
  
  <?php include ('header.php');?>

<div class="container">

 <form role="form" class="form-inline" action="actionplot.php" method="post" >
       <input type="hidden" value="stats" name="activate" >
      <div class="form-group" id="currency">
        <label for="Currency">Currency</label>
        <input type="text" class="form-control" id="currency" name="currency" placeholder="enter currency">
        </div>

        <div class="form-group" >
        <label for="Date">Beginning Date</label>
        <div class="input-group date" id="datepicker">
        <input  type="text" class="form-control"  name="datebegin" placeholder="Enter Date" >
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
       </div>
       </div>

       <div class="form-group" >
        <label for="Date">Ending Date</label>
        <div class="input-group date" id="datepicker1">
        <input  type="text" class="form-control"  name="dateend" placeholder="Enter Date" >
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
       </div>
       </div>

       <div class="form-group">
        <label for="time">Beginning Time</label>
        <div class="input-group date" id="timepicker">
        <input type="text" class="form-control" id="time" name="timebegin" placeholder="enter time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        </div>
    </div>

    <div class="form-group">
        <label for="time">Ending Time</label>
        <div class="input-group date" id="timepicker1">
        <input type="text" class="form-control" id="time" name="timeend" placeholder="enter time">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        </div>
    </div>
 <div class="form-group">
          <button type="submit" class="btn btn-default">Submit</button>
      </div>


 </form>
</div>

 <div id="placeholder" >
  
 

 </div>
  


<?php include ('footer.php');?>

</body>



</html>