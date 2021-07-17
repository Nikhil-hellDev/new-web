
<?php
 session_start();
error_reporting(0);
if($_SESSION['id']==true)
{
    include('conn.php');
$id=$_SESSION['id'];
$tid=$_SESSION['testid'];
 $query="SELECT * FROM `result` WHERE `Userid`='$id' AND `testid`='$tid'; ";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0)
{echo "<script>alert('You already given test');</script>";
echo"<script>window.close();</script>";}
}
else
{
echo    "<script>location.href='firstpage.php'</script>";
}

?>

<html>
    
 
<head>
<title>right/click/disable</title>
<SCRIPT LANGUAGE="JavaScript">
    var message="Sorry,Right click disabled";
    function clickIE() {if (document.all) {alert(message);return false;}}
    function clickNS(e) {if 
    (document.layers||(document.getElementById&&!document.all)) {
    if (e.which==2||e.which==3) {alert(message);return false;}}}
    if (document.layers) 
    {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
    else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
    
    document.oncontextmenu=new Function("return false") 
    </script>

    
<script type="text/javascript">
    document.onkeydown = function (e) 
    {
        e.preventDefault();	
    }
   </script>

</head>

<style>
    body{
        background-color: #ffffff;
    }
.welcome{
    
    margin: 2%;
	border-style:;
	border-width:10px;
    width: 1000px;
    height: 450px;
    background-color:#ffffff;
		box-shadow: 5px 4px 3px 2px #888888;
		border-radius:15px;
   
}
.welcome1{
    background-color:#0048C8;
    margin-top:0%;
    width: 100%;
    height: 40px;
}
.start{
    margin-top:20%;
}
.start text{
    height: 50px;
    width: 360px;
    font-family:Brush Script MT, Brush Script Std, cursive; 
    font-size: 30px;
    background: #ffffff;
    color: #000000;
    
}

.check {
    float:right;
    margin-top:30px;
     margin:-140px 0px;
}
.start button{
    height: 50px;
    width: 360px;
    border-radius: 5px;
    background: #0048C8;
    color: transparent;
    text-shadow: 0 0 5px rgba(0,0,0,0.5);
}

</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet"  href="admindash.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <center>
<h1>
<?php 
error_reporting(0);
$id=$_SESSION['id'];
$noofqus=$_SESSION['noofqus'];
$testid=$_SESSION['testid'];

$_SESSION['testname']=$test;
echo "WELCOME";
include("conn.php");
    $query="SELECT * FROM `timer` WHERE  `testid`='$testid'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc())
{      
       $testname=$row['testname'];
        $date=$row['testdate'];
         $h=$row['hours'];
          $m=$row['minutes'];
           $s=$row['seconds'];
        //   echo $h;
	break;
}
}
else 
{
echo "Not a Test";
} 
?>
</h1>
 </center>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<body >
    
     
  
    <h3><a href="userdash.php">Back</a></h3>

      <div class="welcome1" id="wel">
    </div>
     <br>
    <div class="start">
        <center>
             <h1 id="demo"></h1>
            <text> Test will start on <?php echo $h?>:<?php echo $m?> Wait!!</text>
          <br>
            <button disabled>Start the test</button>
        </center>
</div>
    
  

 <script>

     
     var d=<?php echo strtotime("$date $h:$m:$s")?> * 1000;
    var now=<?php  echo time() ?> * 1000;
   // document.write(d);
    //var w="06:00 PM";
   // document.write(w);
    var x=setInterval(function(){
        now=now+1000;
    var timediff=d-now;
    var days=Math.floor(timediff/(1000*60*60*24));
    var hours=Math.floor((timediff%(1000*60*60*24))/(1000*60*60));
    var minutes=Math.floor((timediff%(1000*60*60))/(1000*60));
    var seconds=Math.floor((timediff%(1000*60))/(1000));
document.getElementById("demo").innerHTML="Days : "+days+" Hours : "+hours+" Minutes : "+minutes+" Seconds : "+seconds;
 
    if(timediff<=0){
    clearInterval(x);
   // document.write(w);
   document.getElementById("demo").style.display="none";
    window.location="test1.php";
    //window.open("myfile.php", "_blank", "width=2000, height=1800"); 
//   document.write('\n Now,You start the test');
//     document.write('\n <button style=" height: 50px;width: 360px;border-radius: 20px; margin: 300px 500px; background: #ADD8E6;" onclick="openWin()" id="btn">Start the test</button>');
    }
      
    },1000);
  
            
    </script>
   
    
   <br><br><br><br><br><br><br><br><br><br><br><br><br>            
  
 
 
</body>
</html>


