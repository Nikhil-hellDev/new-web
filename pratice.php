
<?php
session_start();
error_reporting(0);
if($_SESSION['id']==true)
{
$id=$_SESSION['id'];
}
else
{
echo    "<script>location.href='firstpage.php'</script>";
}

?>

<html>
<head>
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
<style>
.extra {
    
    border:1px solid black;
    margin-top:-10px;
    padding-left: 46px;
    max-width:50%;
    min-width:300px;
    height:fit-content;
    
    
}
.extra1 {
    float:right;
    border:1px solid black;
    max-width:max-content;
    min-width:100px;
    height:fit-content;
}

</style>
  <script  type='text/javascript'>
 window.addEventListener('focus', function(){
     console.log('hi'); 
 });
            // Inactive
        window.addEventListener('blur', function(){ 
               window.close();
            
            } 
        );
       
              </script>
              <script language=JavaScript>
<!--
//Disable right mouse click Script
var message="Function Disabled!";
///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("return false")

function disableCtrlKeyCombination(e)
{
        //list all CTRL + key combinations you want to disable
        var forbiddenKeys = new Array('a', 'c', 'x', 'v');
        var key;
        var isCtrl;
        if(window.event)
        {
                key = window.event.keyCode;     //IE
                if(window.event.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        else
        {
                key = e.which;     //firefox
                if(e.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        //if ctrl is pressed check if other key is in forbidenKeys array
        if(isCtrl)
        {
                for(i=0; i<forbiddenKeys.length; i++)
                {
                        //case-insensitive comparation
                        if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
                        {
                                //alert('Key combination CTRL + ' +String.fromCharCode(key)+' has been disabled.');
                                return false;
                        }
                }
        }
        return true;
}
// --> 
</script>
              
 <!--  
<script type="text/javascript">
    document.onkeydown = function (e) 
    {
        e.preventDefault();	
    }
   </script>
-->
<script type = "text/javascript">

            function timeout()
            {
            var minute=Math.floor(timeleft/60);
            var second="<h2>"+timeleft%60+" Seconds left</h2>";
            if(timeleft<=0){
                location.href="pratice.php";
            clearTimeout(tm);
          return ;
            }
            else
            {
            document.getElementById("time").innerHTML=minute+ " : " +second;
            
            }
            timeleft--;
            
            
            var tm=setTimeout(function (){timeout()},1000);
             
            }
            </script>
    <!--   <script type="text/javascript">
    var timeleft=
    
</script>-->

</head>
<body onkeypress="return disableCtrlKeyCombination(event);" onkeydown = "return disableCtrlKeyCombination(event);" >
    <h3><div id="time"style="margin-left:200px;">timeout</div></h3>

<div class="contanier-fluid">
    <div class="row">
<?php 
error_reporting(1);
$testid=$_SESSION['testid'];
include('conn.php');
$i=$_SESSION['index1'];
 $status="Not attemped";
$no2= $_SESSION['noofqus'];
  $userid=$_SESSION['id'];
 $answer=$_SESSION['answer'];
 $option="";
 $query1="";
 $mark=$_SESSION['mark'];
 $no=$_SESSION['question'][$i-1];
 
     if(isset($_GET['submit']) && isset($_GET['option']))
     {
    array_push($_SESSION['Attempt'],$i);
         $option=$_GET['option'];
         trim($option," ");
         trim($answer," ");
       if(strcasecmp($answer,$option) == 0)
      {
       $status="correct";
      }
      else
      {$status="Wrong";
      }
       $query1="INSERT INTO `result`( `Userid`, `quesno`, `Answer`, `Status`, `marks`, `testid`) VALUES ('$userid','$no','$option','$status','$mark','$testid')"; 
      mysqli_query($connection,$query1);
     }
    /* elseif(isset($_GET['submit']))
        {echo $userid." ".$no." ".$option." ".$status;
             array_push($_SESSION['unattempt'],$i);
        
        $query1="INSERT INTO `result`( `Userid`, `quesno`, `Answer`, `Status`, `marks`, `testid`) VALUES ('$userid','$no','$option','$status','$mark','$testid')"; 
      mysqli_query($connection,$query1);
    }
    elseif(isset($_GET['next']))
    {
         array_push($_SESSION['unattempt'],$i);
        $query1="INSERT INTO `result`( `Userid`, `quesno`, `Answer`, `Status`, `marks`,  `testid`) VALUES ('$userid','$no','$option','$status','$mark','$testid')";
      mysqli_query($connection,$query1);
    }*/
    else
    {if(isset($no))
         {array_push($_SESSION['unattempt'],$i);
        $query1="INSERT INTO `result`( `Userid`, `quesno`, `Answer`, `Status`, `marks`,  `testid`) VALUES ('$userid','$no','$option','$status','$mark','$testid')";
      mysqli_query($connection,$query1);}
    }
   
if($_SESSION['index1']<$no2)
{question($_SESSION['question'][$i],$connection,$testid);
         $_SESSION['index1']=$i+1;
  $i=$_SESSION['index1'];
}
else
{
    unset($_SESSION['Attempt']);
unset($_SESSION['unattempt']);
    echo"<script>location.href='text.html'</script>";   
}


function question($no1,$connection,$testid)
{global $i;
  $count=$i+1;
  if ($no1[0] =='M')
  {
  $query="SELECT * FROM `mcq` WHERE  `qusid`='$no1' AND `testid`='$testid'";
        $result=mysqli_query($connection,$query);
      if($data=mysqli_fetch_assoc($result))
      { $_SESSION['answer']=$data['Answer'];
      $_SESSION['mark']=$data['marks'];
    echo" <script type='text/javascript'> var timeleft=".$data['time']."
    timeout();
</script>
    <div class='extra'><form  method='get'>
   <br>  <pre>".$count." "." : "."    ".$data['Question']." "."MARK : ".$data['marks']."</pre>     <br>
    <input type='radio' name='option' id='o1' value='option1'>".$data['option1']."<br><br>
    <input type='radio' name='option' id='o2' value='option2'>".$data['option2']."<br><br>
    <input type='radio' name='option' id='o3' value='option3'>".$data['option3']."<br><br>
    <input type='radio' name='option' id='o4' value='option4'>".$data['option4']."<br><br>
    <input type='submit' name='submit' value='Submit'>
    <input type='submit' name='next' value='next'>
    </form></div>
    ";
     }}
    elseif($no1[0]=='F')
    {
          $query="SELECT * FROM `filtheblank` WHERE  `qusid`='$no1' AND `testid`='$testid'";
        $result=mysqli_query($connection,$query);
      if($data=mysqli_fetch_assoc($result))
      { $_SESSION['answer']=$data['Answer'];
       $_SESSION['mark']=$data['marks'];
        
    echo"<script type='text/javascript'> var timeleft=".$data['time']."
    timeout();
</script>
    <div class='extra'>
    <form  method='get'>
   <br><br> <Label>".$count."  ".$data['Question']."      "."MARK : ".$data['marks']."</Label><br><br>
   <input type='text' name='option' >
    <input type='submit' name='submit' value='Submit'>
    <input type='submit' name='next' value='next'>
    </form>
    </div> 
    ";
    }
}
    else
    {
       $query="SELECT * FROM `image` WHERE  `qusid`='$no1' AND `testid`='$testid'";
        $result=mysqli_query($connection,$query);
      if($data=mysqli_fetch_assoc($result))
      { $_SESSION['answer']=$data['answer'];
      $image='upload/'.$data['name'];
         $_SESSION['mark']=$data['marks'];
    echo"<script type='text/javascript'> var timeleft=".$data['time']."
    timeout();
</script>
    <div class='extra'>
    <form  method='get'>
   <br><br> <Label>".$count." . </Label>&nbsp;
    <img src='".$image."'  style='width:370px;height:250px;'>
    <label> 	&nbsp;&nbsp;    MARK : ".$data['marks']."  </label><br>
    <br>
    <input type='radio' name='option' id='o1' value='option1'>".$data['option1']."<br><br>
    <input type='radio' name='option' id='o2' value='option2'>".$data['option2']."<br><br>
    <input type='radio' name='option' id='o3' value='option3'>".$data['option3']."<br><br>
    <input type='radio' name='option' id='o4' value='option4'>".$data['option4']."<br><br>
    <input type='submit' name='submit' value='Submit'>
    <input type='submit' name='next' value='next'>
    </form> 
    </div>
   ";
     }  
    }
}

echo "<div class='extra1'>
<p>Attempted Question No  :</p>
";
foreach($_SESSION['Attempt'] as $attempt)
{
    echo "<input style='background-color:#00FF00;' type='button' value='$attempt'>";
    
}
 echo "<br><br>Unattempted Question No :";
foreach($_SESSION['unattempt'] as $unattempt)
{if($unattempt!=0)
    {
            echo "<input style='background-color:#FF0000;' type='button' value='$unattempt'>";
        
    }
}
$rq=$no2-($i-1);
 echo" <br><br>No of Remaining Question :  ".$rq."/".$no2; 
 echo "</div>";
?>

    </div>
</div>
</body>
</html>