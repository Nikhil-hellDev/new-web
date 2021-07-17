<?php 
session_start();
error_reporting(0);
include('conn.php');
if($_SESSION['uname']==true)
{
    $uname=$_SESSION['uname'];
   
date_default_timezone_set("Asia/Kolkata");
$mind=date("Y/m/d");
$mint=date("H:i");
$todaydate = date("Y/m/d");
//echo $mint , $mind;


}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>


<html>
    <head>
        <title>entry for test</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="sty1.css">
        <style>
body{
    background-color:#FFFFFF;
    height:700px;
    width:auto;
}
.detailbox{
    font-family: Arial, Helvetica, sans-serif;
    width:auto;
    border-radius:10px;
    float:left;
   
}
.vertical{
   
     background-color:#FFFFFF;
    margin-top:20px;
    height:450px;
    width:400px;
    padding:10px;
    margin-left:-130px;
}
.vertical input{
  background-color:#C8C8C8;
  padding:10px;
  width:90%;
   border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}
.vertical select{
  background-color:#C8C8C8;
  padding:10px;
  width:90%;
   border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}

.vertical input[type="submit"]{
 background-color: #3300CC;
 display:center;
  border: none;
  width:150px;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  float:center;
}
         .welcome1{
  background-color:#0048C8;
  margin-top:-2.5%;
  width: 20%;
  height: 2px;
}
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}
   
        </style>
        </head>
<body>
    
   
<nav class="stroke">
    <ul>
        <li><a  href="home1.php">User Registration</a></li>
        <li><a href="showresult1.php">View Result</a></li>
        <li><a href="delete privious entry.php">Current Ongoing test</a></li>
        <li><a style="border-bottom: 3px solid yellow; color:black;" href="entery for test.php">Test timer</a></li>
        <li><a href="showuser.php">List of student</a></li>
        <li><a  href="dashentry.php">User Dashboard</a></li>
    </ul>
</nav>

    <h1  style="margin-top:-18px;">Enter Test Info</h1>
     <div style="background:yellow; width:%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>  
    <form class="detailbox" method='post' style="margin-left:35%;">
                   <center>
<div class="vertical">
    <br>
    <label for='test-name'>Test Name</label>
    <br><br>
    <select id="cars" name="testid">
                     <option >-- Testname --</option>
<?php
$query1="SELECT `id`,`testname`  FROM `dashboard` ORDER BY id DESC ";
$result1=mysqli_query($connection,$query1);
if($result1)
{
while($data1=mysqli_fetch_assoc($result1))
{
   // 
    ?>
       <option value="<?php echo $data1['id']; ?>" ><?php echo $data1['testname']; ?></option>
<?php
}
}
    ?>                
             </select>  
              <br><br>
    <label for='test date'>Test Date</label>
    <br><br>

    <input id ='tes' span="fill"type='date' name='testdate'  min='<?php echo date('Y-m-d') ; ?>' max='2222-05-25' required placeholder="Enter the test date" >
    <br><br>
    <label for='time'>Enter Time</label>
    <br><br>
    <input type="time" name="time" required placeholder="Enter the time of test">
    <br><br>
    <input type="submit" name="submit" value="submit"></div>
    </center>
    </form>
    <script>
        var dt=document.getElementById('tes');
       var rt=new Date();
       if(dt<rt){
        echo "alert('enter the valid date ')"; 
        header("Refresh:0; url=entery for test.php");
       }
      </script>
    <?php
    include("conn.php");
    error_reporting(1);
     if(isset($_POST['submit']))
     {
           
               
               //if($td =$_POST['testdate']<$todaydate){
                 //   echo "<script>alert('enter the valid date');</script>"; 
              // }
              $tid=$_POST['testid'];
              echo $tid;
               $query2="SELECT `testid`  FROM `timer` WHERE `testid`='$tid' ";
               $result2=mysqli_query($connection,$query2);
               while($data2=mysqli_fetch_assoc($result2))
              {
          echo   $testid1=$data2['testid'];
                 }
               if($tid==$testid1)
               {
                   echo "<script>alert('you already give the time of this test');</script>";
               }
               
               else
               {
              $query3="SELECT `testname`  FROM `dashboard` WHERE `id`='$tid' ";
        $result3=mysqli_query($connection,$query3);
while($data3=mysqli_fetch_assoc($result3))
{
$tn=$data3['testname'];
}
              $td =$_POST['testdate'];
                  $tt=$_POST['time'];
                  $TT=explode(":",$tt);
                  $x=$TT[1]-30;
                 if($x<0)
                 {
                     $m=60+$x;
                      $h= $TT[0]-6;

                 }
                 else
                 {
                  
                  $h= $TT[0]-5;
                  $m=$TT[1]-30;
                 }
                   // echo $tn ," ", $heading," ", $description," ";
                $query="INSERT INTO `timer`(`testname`, `testid`,`testdate`, `hours`, `minutes`,`seconds`) VALUES ('$tn','$tid','$td','$h','$m','00')";
$result=mysqli_query($connection,$query);
                if($result){
                    echo "<script>alert('sucessfully saved');</script>"; 
                }
         else
         {
             echo "<script>alert('error');</script>";
         }
               }
               
     }
    ?>
    
    </body>
    </html>
    
    <!-- 
      -->