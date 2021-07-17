<?php
error_reporting(0);
session_start();
if($_SESSION['uname']==true)
{
$id=$_SESSION['uname'];
}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>

<html>
 <head>
     <title>User Dashboard</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="sty1.css">
     <style>
         .welcome1{
  background-color:#0048C8;
  margin-top:-2%;
  width: 100%;
  height: 2px;
}
.mine
{
    text-align:center;
    margin-top:40px;
    background-color:#E8E9EC;
}
.mine1
{
    
     box-shadow: 5px 4px 5px 5px #F9F9F9;
    outline:none;
    background-color:#ffffff;
}
.mine2
{
    text-align:center;
    
    background-color:#ffffff;
}
.nav_ni
{
  
  border-style:solid;
  border-top: yellow;
  border-left: yellow;
  border-right: yellow;
border-bottom:;
}
.nikhil
{
     background-color: #0048C8;
}
.check
{
     margin-left:40px;
    margin-right:70px;
    background:white;
     box-shadow: 3px 2px 5px 5px  #888888;
     height:500px;
    width:90%;
}
.check input
{
    height:50px;
    width:95%;
    background: #E8E9EC;
    color:#00000;
    border-radius:20px;
}
.check input[type="submit"]
{
    width:30%;
    color:white;
    background-color:#0048C8;
}
.rows{
    width:auto;
    	background-color:#FFFFFF;
    	   box-shadow: 3px 2px 5px 5px  #888888;
    	height:auto;
    
}

.rows a
{
   height:20px;
    margin-left:30px;
}
     </style>
 </head>
 <body>
   
    <nav class="stroke">
        <ul>
            <li><a  href="home1.php">User Registration</a></li>
            <li><a href="showresult1.php">View Result</a></li>
            <li><a href="delete privious entry.php">Current Ongoing test</a></li>
            <li><a href="entery for test.php">Test timer</a></li>
            <li><a href="showuser.php">List of student</a></li>
            <li><a style="border-bottom: 3px solid yellow; color:black;" href="dashentry.php">User Dashboard</a></li>
        </ul>
    </nav>

  
  <h1 style="margin-top:-18px;">User Dashboard</h1>
      <div style="background:yellow; width:25%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>    


<div class="check">
  <form method="post"> 
  
<label style="margin-top:50px; margin-left:20px; color:#8C8C8C;" for="test-name">Test Name</label>

<center>
<input type="text" name="testname" placeholder="Enter the test name">
<br><br>
</center>
<label style=" margin-left:20px; color:#8C8C8C;" for="test-heading">Test Heading</label>

<center>
<input type="text" name="heading" placeholder="Enter the heading of test">
</center>
<br>
<label style=" margin-left:20px; color:#8C8C8C;" for="test-description">About test</label>

<center>
<input type="text" name="description" placeholder="Enter the description of test">

<br><br><br>
<input type="submit" name="submit" value="submit">
</center>
</form>
</div>


 
<?php
include("conn.php");
error_reporting(0);
 if(isset($_POST['submit']))
 {
     
       
            $tn =$_POST['testname'];
           if(empty($tn)){
               echo "test name is required";
               }
            
           $heading =$_POST['heading'];
           if(empty($heading)){
               echo "test heading is required";}
           
           $description =$_POST['description'];
           if(empty($description)){
               echo "description is required";}
               
               //echo $tn ," ", $heading," ", $description," ";
            $query="INSERT INTO `dashboard`(`testname`, `heading`, `description`) VALUES ('$tn','$heading','$description')";
$result=mysqli_query($connection,$query);
            if($result){
                echo "<script>alert('sucessfully saved')</script>"; 
            }
     else
     {
         echo "<script>alert('error')</script>";
     }
 }
?>


    </body>
    
</html>