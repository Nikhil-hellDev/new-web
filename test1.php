<?php
include('conn.php');
session_start();
error_reporting(1);
if($_SESSION['id']==true)
{
$id=$_SESSION['id'];
$noofqus=$_SESSION['noofqus'];
$testid=$_SESSION['testid'];

}
else
{
echo    "<script>location.href='login.php'</script>";
}

?>
<html>
  
  <head>
<title>test1_file</title>
 
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

 
 <style>
 body{
        background-color: #DCDCDC;
        height:auto;
        width:auto;
    }
.welcome
iframe{
    
    margin: 0%;
	border-style:;
	width: 98%;
		border-width:5px;
		border-color:blue;
    height: 470px;
    background-color:#ffffff;
		/*box-shadow: 5px 4px 3px 2px #888888;
		border-radius:15px;*/
   
}
.welcome1{
    background-color:#0048C8;
    margin-top:0%;
    width: 100%;
    height: 5%;
}
 
.welcome Label{
    font-size: 30px;
}
.welcome input[type="submit"]
{
    border-color:#0048C8;
    position:  absolute;
   /* border: none;
   */
    background: #0048C8;
    margin: 2%;
    padding:0%;
    outline: #ffc107;
     margin-left:180px;
    height: 40px;
    width: 300px;
    text-align: center;
    color: white;
    font-size: 20px;
    border-radius: 20px;

}
.welcome input[type="button"]
{
    border-color:#ffc107;
    position:  absolute;
   /* border: none;
    background: #fb2525;*/
    margin:02%;
    padding:0%;
    outline: #ffc107;
    height: 40px;
    width: 250px;
   
    text-align: center;
    color: #ffc107;
    font-size: 20px;
    border-radius: 10px;

}
.welcome button{
    border-color:#0048C8;
    position:;
   /* border: none;*/
    background: #0048C8;
    margin: 0%;
    padding:0%;
    margin-top:10px;
    margin-bottom:10px;
    margin-right:200px;
    outline: #ffc107;
    height: 40px;
    width: 300px;
    text-align: center;
    color: white;
    font-size: 18px;
    border-radius: 5px;

}
.welcome input[type="option"]
{
   
   /* border: none;
    background: #fb2525;*/
    margin: 2%;
    padding:0%;
    text-align: center;
    color: #ffffff;
    font-size: 50px;
    

}
.check{
     float:right;
      margin:-4px 10px;
 }
.upbox{
    height: 163px;
    min-width: fit-content;
    max-width: 95%;
    margin: 30px; 
    margin-bottom:-10px;
}
    </style>  
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet"  href="admindash.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
 

</head>
<body >
 

    <div class="welcome1">
</div>
<h2 style="margin-left:1%; ">Class > Test your ability<h3 style=" margin-left:1%; font-family:Brush Script MT, Brush Script Std, cursive; font-size:20px"> all the best </h3></h2>

    

<head>
    
    <!--<title>webcam</title>-->
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

 <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>
 <body >
     <form action='pratice.php'  method='POST' target='votar'>
    <div class="upbox">
        <input class="button1" type="submit" name="submit" value="Enable Quiz" style="
    float: left;
    /* line-height: 163px; */
    margin-top: 58px;
    margin-left: 0px;
    background-color: blue;
    border: 0;
    font-size:18px;
    width: 150px;
    height: 40px;
    color: white;
"></form>
        <center><img src="small logo.png" style="/* width: 95px; */min-width: 70px;max-width: 70px;position: center;margin-left: -130px"></center>
      <form method='POST' action='storreimage.php'>
        <input class="button2" type="submit" name="submit"  value="Finish Quiz"  style="float: right; margin-top: -9px; margin-right: -18px;background-color: blue;
    border: 0;
    width: 150px;
     font-size:18px;
    height: 40px;
    color: white;">
    </div>
     </form>

     <div class="welcome">
     
         <center>
   <iframe name="votar" frameborder="0"></iframe>

    
<?php
include('conn.php');
$_SESSION['question']= array();
 $query1="SELECT * FROM `sections` WHERE `testid`='$testid' ORDER BY `marks`";
       $result1 =mysqli_query($connection,$query1);
while($row =mysqli_fetch_assoc($result1))
{  $no=$row['sectionqus'];
   $mark=$row['marks'];
   $ques=array();
   $i=1;
$query="SELECT `qusid`  FROM `mcq` WHERE `testid`='$testid' AND `marks`='$mark'  UNION ALL SELECT `qusid` FROM `filtheblank`  WHERE `testid`='$testid' AND `marks`='$mark' UNION ALL SELECT `qusid` FROM `image`  WHERE `testid`='$testid' AND `marks`='$mark'";
$result=mysqli_query($connection,$query);
 while($data=mysqli_fetch_assoc($result))
 {
     if($i<=$no)
    {
    if(in_array($data['qusid'],$ques))
    {
      $i=$i;
    }
    else
    {
        array_push($ques,$data['qusid']);
        $i=$i+1;
    }}}
    shuffle($ques);
    foreach ($ques as $value){
        array_push($_SESSION['question'],$value);
    }
}
    $_SESSION['index1']=0;
    $_SESSION['Attempt']=array();
     $_SESSION['unattempt']=array();
    
?> 





</center>
 
  </body>
</html>
