<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
    include("conn.php");
$id=$_SESSION['uname'];
}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>user Registration</title>
         <title>Show Result</title>
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
    background-color:#F8F8F8;
    height:700px;
    width:auto;
}
.welcome1{
  background-color:#0048C8;
  margin-top:5px;
  width: 100%;
  height: 2px;
}
.loginbox{
    font-family: Arial, Helvetica, sans-serif;
    width:650px;
        border-radius:10px;
    float:left;
    
}
.boxin{
    background-color: #FFFFFF;
    height: 700px;
    width: 1000px;
    position: relative;
    margin-left: 287px;
    margin-top: 205px;
    padding: 43px;
}
.check2{
     margin-right:70px;
    background:white;
     height:fit-content;
    width:60%;
    margin-left: 25%;
    padding: 36px;
}

.welcome1{
  background-color:#0048C8;
  margin-top:-2.2%;
  width: 100%;
  height: 2px;
}
input.boxin{
    background-color:lightgrey;
    border-radius:5px;
}
.select{
    width:100px;
}
.form-group col-md-6 input{
    border:2px solid black;

}
</style>
    </head>
    <body>
      
<nav class="stroke">
    <ul>
        <li><a style="border-bottom: 3px solid yellow; color:black;" href="home1.php">User Registration</a></li>
        <li><a href="showresult1.php">View Result</a></li>
        <li><a href="delete privious entry.php">Current Ongoing test</a></li>
        <li><a  href="entery for test.php">Test timer</a></li>
        <li><a href="showuser.php">List of student</a></li>
        <li><a  href="dashentry.php">User Dashboard</a></li>
    </ul>
</nav>
       <h1  style="margin-top:-18px;">Enter Test Info</h1>
     <div style="background:yellow; width:20%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>       
<form method="POST">
  
            <br>
            <div class="check2">
            	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First name</label>
      <input required type="text" name="first_name" class="form-control" id="inputEmail4" placeholder="enter your first name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last name</label>
      <input  required  type="text" name="last_name" class="form-control" id="inputPassword4" placeholder="enter your last name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="class">Choose your class</label>
      <br>
      <select  required  id="class" name="class" style="width: 413px; height: 35px; border-radius: 4px;
    border-color: silver;">
          <option >-- Class --</option>
          <option value="1" >Class 1</option> 
          <option value="2" >Class 2</option>
          <option value="3" >Class 3</option>
          <option value="4" >Class 4</option>
          <option value="5" >Class 5</option>
                    <option value="6" >Class 6</option>
                    <option value="7" >Class 7</option>
                    <option value="8" >Class 8</option>
                    <option value="9" >Class 9</option>
                    <option value="10">Class 10</option>
                    <option value="11">Class 11</option>
                    <option value="12">Class 12</option>
                    <option value="other" >other</option>
      </select>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">User name</label>
      <input  required  type="text" name="username" class="form-control" id="inputPassword4" placeholder="enter your user name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Phone no</label>
    <input  required  type="Number" name="phoneNo" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">School name</label>
    <input  required  type="text" name="schoolname" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
    <div class="form-group ">
      <label for="inputCity">Email</label>
      <input  required  type="text" name="email" class="form-control" id="inputCity">
    </div>
    <input type="submit" name="create" value="submit">
            </div>
  
            </form>
            </div>
             <?php
                   include("conn.php");
            if(isset($_POST['create'])){
                
                
                $firstname =$_POST['first_name'];
                   
               $lastname =$_POST['last_name'];
               $username =$_POST['username'];
               $class =$_POST['class'];
                   $pn =$_POST['phoneNo'];
                    $sn =$_POST['schoolname'];
                     $email =$_POST['email'];
                $string="1234567890";            
                  $password= substr(str_shuffle($string),0,8);
                $query="INSERT INTO `user`(`first_name`, `last_name`, `username`,`class`,`phoneNo`,`schoolname`, `email`, `password`) VALUES ('$firstname','$lastname','$username',' $class','$pn','$sn','$email','$password')";
                 $result= mysqli_query($connection,$query);
                if($result){
                   
                  $to = $email;
                  $subject = 'FIZ Robotic Solutions (Aero modeling Asessment)';
                  $message =
          'Dear Students, 

Greetings from FIZ Robotic Solutions. 
The following are your details for the Mega Test Scheduled for 13th June 2020:
Date: 13th June 2020
Time: 12-1 PM 
Reporting Time: 11:40 AM 
URL: http://aiolympiad.fizrobotics.com/login.php
User ID:'. $username.' 
Password:' .$password .'

Kindly follow the link and visit the website by 11:45 AM and read the instructions properly before starting the test. 

For any technical issue please contact on : online.fizrobotics@gmail.com 

With Best Regards

Exam Team | FIZ Robotic Solutions';
                  $headers ="From: online.fizrobotics@gmail.com ";

                  if(mail($to,$subject,$message,$headers))
        {
                              echo "<script>alert('sucessfully saved and mail send');</script>"; 
        }
              else
      {
      echo "<script>alert('mail not send');</script>";	
      }
              

                   
                }else{
                  echo "<script>alert('not saved something wrong');</script>";
                }
            }
            ?>
            </body>
    </html>
    </body>
</html>
