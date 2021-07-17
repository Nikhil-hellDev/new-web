<html>
<?php
session_start();
error_reporting(1);
if($_SESSION['uname']==true)
{
include('conn.php');
 $id=$_REQUEST['id'];

//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `result` WHERE  `S.no`='$id'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
if($row = $result->fetch_assoc())
{
 $Sno = $row["S.no"];
  $Userid = $row["Userid"];
	 $quesno = $row["quesno"];
  $Answer = $row["Answer"];
	$Status = $row["Status"];
	$marks = $row["marks"];
	$testid = $row["testid"];
}
    
}
     else 
{
echo "0 results";
}
}
else
{
echo    "<script>location.href='admin.php'</script>";
}?>
   
<head>
<head>
        <title>Edit user</title>
    <style>
body{
    background-color:#F8F8F8;
    height:auto;
    width:auto;
}

         .welcome1{
  background-color:#0048C8;
  margin-top:-1%;
  width: 100%;
  height: 2px;
}
.rows{
        width:auto;
                   box-shadow: 3px 2px 5px 5px  #888888;
background-color:#FFFFFF;
            height:auto;
        
    }
    
    .rows a
    {
       height:20px;
        margin-left:30px;
    }
    .check2{
     margin-right:70px;
    background:white;
     height:fit-content;
    width:60%;
    margin-left: 25%;
}
.check1{
     margin-right:70px;
    background:white;
     height:fit-content;
    width:60%;
    margin-left: 25%;
}

select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 2px);
    margin-top: 7;
    background-color:lightgrey;
border-radius:15px;
    
}
input.form-control:not([size]):not([multiple]){
 height: calc(2.25rem + 2px);
    margin-top: 12;
    background-color:lightgrey;  
    border-radius:15px;
}

</style>
    </head>
        </head>
    <body>
         <form class="detailbox" method='post'>
        <div class="head"> 
    <h1>Edit Test Question</h1></div>
                    <div style="background:yellow; width:28%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>        
<div class="check">

<form  method="POST" action="" enctype='multipart/form-data'>
    
           <input hidden type="text" name="S.no" value="<?php echo $Sno; ?>">
           <input type="text" name="Userid" value="<?php echo $Userid; ?>">
	 <input type="text" name="quesno" value="<?php echo $quesno; ?>">
           <input type="text" name="Answer" value="<?php echo $Answer; ?>">
	 <input type="text" name="Status" value="<?php echo $Status; ?>">
	<input hidden type="text" name="marks" value="<?php echo $marks; ?>">
	<input hidden type="text" name="testid" value="<?php echo $testid; ?>">
          <center>
            <br>
           
      <br>
            <input type="submit" name="submit" value="submit">
            </center>
            </form>
            <div>
   
        
<?php
include(conn.php);
//echo ($id);
     if(isset($_POST['submit'])){
       $sno=$_POST['S.no'];
       $qusid==$_POST['Userid'];
         $question=$_POST['quesno'];
         $answer=$_POST['Answer'];
       $status=$_POST['Status'];
		 $marks=$_POST['marks'];
        $tn=$_POST['testid'];
         

 $sqk="UPDATE `result` SET `S.no`='$sno',`Userid`='$qusid',`quesno`='$question',`Answer`='$answer',`Status`='$status',`marks`='$marks',`testid`='$tn' WHERE `S.no`='$id' ";
     $result = $connection->query($sqk);
     if($result){
          echo  "<script>alert('sucessfully saved');</script>";
                   // header("Refresh:0; url=view question1.php??testid=$tn");
     }
     else{
         echo "not updated";
     }}
 
    ?>


</body> 
        </html>
