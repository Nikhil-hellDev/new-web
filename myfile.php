<?php
error_reporting(1);
session_start();
if($_SESSION['id']==true)
{include('conn.php');
$id=$_SESSION['id'];
$qus=0;
$tid=$_REQUEST['testid'];
 $_SESSION['testid']=$tid;
 $query="SELECT * FROM `result` WHERE `Userid`='$id' AND `testid`='$tid'; ";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0)
{echo "<script>alert('You already given test');</script>";
echo"<script>location.href='userdash1.php';</script>";}
 $query1="SELECT * FROM `sections` WHERE `testid`='$tid'; ";
$result1=mysqli_query($connection,$query1);
while($data1=mysqli_fetch_array($result1))
{
$qus=$data1['sectionqus']+$qus;
//$noofqus=$_SESSION['noofqus'];
}
$_SESSION['noofqus']=$qus;    
}

else
{
echo    "<script>location.href='firstpage.php'</script>";
}


?>
<html>
     <style>
body, html {
  height: auto;
  width:auto;
  margin: 0;
}

.bg {
  background-image: url("");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.welcome1
{ 
background-color:#0048C8;
margin-top:0%;
width: 100%;
height: 25px;
}
.check {
    float:right;
    margin:-140px 0px;
}
.checkbox
{
    margin-left:32%;
    font-size:25px;
}
.checkbox input{
    width:5%;
    height:3%;
}
</style>
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

         <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>//
        <script type="text/javascript">
        $(function()
        {
            $("#idchk").change(function(){
                
            var st=this.checked;
            if(st){
                $("#btn").prop("disabled",false);
            }
            else
            {
                $("#btn").prop("disabled",true);
            }
            });
            
        });
        </script>
       
   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>-->

   <body>
       
       <div class="bg">
               <center>
                    <br>
                   <text style=" align-itmes:center; margin-top:2%; font-style: italic; font-style: bold; font-size: 30px;">Instruction</text>
           <div style="background-color:#000000 ;margin-top:1%; width: 11%; height: 0.5%; margin-bottom:20px">
                   </div>
           </center>
            

     <p style=" align-itmes:center; margin-top:2%;margin-left:10px; margin-bottom:20px; font-family: Arial, Helvetica, sans-serif;   font-size:20px;">
         
           1.Total duration of time for each question will be 1 minute.After one minute question will be change.
       <br><br>
       2.There will be total <?php echo $qus?> questions.
       <br><br>
       3 Each page can have only one multiple choice question with four options. You will have to click for the correct option.
       <br><br>
       4.The clock will be set at the top of screen and the times shown in clock go in descending sequence to show you the remaining time
       <br><br>
       5. You will not open any other tab other than this one or else you will receive an warning.
       <br><br>
       6. You must close all other programs or windows on your testing computer before you begin the exam.
      <br>
       <br>
       7.  If your tab shuts down due to some network error, it will take you to the same question where you have left saving all the previous answers.
      <br>
       <br>
       8. Click Enable Quiz Button to view the questions.
      <br><br>
       9. Click Submit Button to save/attempt the question, if you submit the question you can not see it again.
      <br>
       <br>
       10. Click Next Button to view new question , if you only press next so your question will not attempt.
      <br>
      <br>
       11. Click Finish Test Button after you attempt the  quiz to return to the  dashboard.
       <br>
       <br>
       12.The answer can not be changed at any time during the examination if you are submit succesfuly.
       <br>
       
       </p>
      <p class="checkbox">  <input type="checkbox" id="idchk" checked="checked"/> I Agree With All Terms And Condition<br> [It is compalsary to click the check box for going Test page]</p>
      <br>
       <div class="welcome1" id="wel">
    </div>
           <center>
            <text style=" align-itmes:center; font-size: 25px; font-style: bold;">Now,You Start......</text>
            <br>
            <button style=" height: 50px;width: 360px;border-radius: 20px; background:#0048C8; color:#FFFFFF" onclick="openWin()" id="btn">Start the test</button>
   </center>
   <script>
     var newWindow;
  
                function openWin() { 
                    newWindow = window.open("rightclick.php", "_blank", "width=2000, height=1800"); 
                }
    </script>

</div>
   </body>
   </html>
    