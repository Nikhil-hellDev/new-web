
<?php
session_start();
error_reporting(0);
/*if($_SESSION['uname']==true)
{
$id=$_SESSION['uname'];

}
else
{
echo    "<script>location.href='admin.php'</script>";
}*/

?>

<html>
 <head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 <form action="showques.php" method="Post" enctype="multipart/form-data">
 <center>
      <h1 style="margin-top:40px;">MCQ QUESTION </h1>
 <div class="table-responsive">
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Question No </th>
      <th scope="col">Question </th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
	  <th scope="col">Option 3</th>
      <th scope="col">Option 4</th>
      <th scope="col">Correct Answer </th>
      <th scope="col">Answer Given </th>
      <th scope="col">Marks </th>
      <th scope="col">Delete</th>
      </tr></thead>
  <tbody>
<?php 
include('conn.php');
$count=1;
$id=$_REQUEST['id'];
$query="SELECT `S.no`, `Userid`, `quesno`, `Answer`  FROM `result` WHERE `Userid`='$id' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{ $sno=$data['S.no'];
$id=$data['Userid'];
  $no=$data['quesno'];
$AG=$data['Answer'] ;
$query1="SELECT * FROM `mcq` WHERE `qusid`='$no'";
$result1=mysqli_query($connection,$query1);
if(mysqli_num_rows($result1)>0)
{
  while($data1=mysqli_fetch_assoc($result1))
    {  
      $q= $data1['Question'];
    $o1=$data1['option1'];
 $o2=$data1['option2'];
$o3=$data1['option3'];
$o4=$data1['option4'];
$CA=$data1['Answer'];
$ms=$data1['marks'];
	   
        	   
}
?><tr><td><?php echo $count++;?></td>
<td><?php echo $no;?></td>
<td><?php echo $q;?> </td>
<td><?php echo $o1;?></td>
<td><?php echo $o2;?></td>
<td><?php echo $o3;?></td>
<td><?php echo $o4;?></td>
<td><?php echo $CA;?></td>
<td><?php echo $AG;?></td>
<td><?php echo $ms;?></td>
<td class="mine2"><a href="showques.php?sno=<?php echo $sno ; ?> &id=<?php echo $id ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>
 </tr><?php }}
 if(isset($_REQUEST['sno']) and ($_REQUEST['id'])){
     $s=$_REQUEST['sno'];
     $ID=$_REQUEST['id'];
     $sql="DELETE FROM result WHERE `S.no` ='$s'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showques.php?id=$ID");
} 
else{
    echo "error";
}
 }
 ?>  </tbody>

 </table>
 <h1 style="margin-top:40px;">FILL IN THE BLANK QUESTION </h1>
  <div class="table-responsive">
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Question No </th>
      <th scope="col">Question </th>
      <th scope="col">Correct Answer </th>
      <th scope="col">Answer Given </th>
     <th scope="col">Marks</th>
      <th scope="col">Delete</th>
      </tr></thead>
  <tbody>
<?php 
include('conn.php');
$count=1;
$id=$_REQUEST['id'];
$query="SELECT `S.no`, `Userid`, `quesno`, `Answer`  FROM `result` WHERE `Userid`='$id' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{ $sno=$data['S.no'];
$id=$data['Userid'];
  $no=$data['quesno'];
$AG=$data['Answer'] ;
$query1="SELECT * FROM `filtheblank` WHERE `qusid`='$no'";
$result1=mysqli_query($connection,$query1);
if(mysqli_num_rows($result1)>0)
{
  while($data1=mysqli_fetch_assoc($result1))
    {  
      $q= $data1['Question'];
   
$CA=$data1['Answer'];
$ms=$data1['marks'];
	   
        	   
}
?><tr><td><?php echo $count++;?></td>
<td><?php echo $no;?></td>
<td><?php echo $q;?> </td>
<td><?php echo $CA;?></td>
<td><?php echo $AG;?></td>
<td><?php echo $ms;?></td>
<td class="mine2"><a href="showques.php?sno=<?php echo $sno ; ?> &id=<?php echo $id ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>
 </tr><?php }}
 if(isset($_REQUEST['sno']) and ($_REQUEST['id'])){
     $s=$_REQUEST['sno'];
     $ID=$_REQUEST['id'];
     $sql="DELETE FROM result WHERE `S.no` ='$s'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showques.php?id=$ID");
} 
else{
    echo "error";
}
 }
 ?>  </tbody>

 </table>
  <h1 style="margin-top:40px;">IMAGE QUESTION </h1>
 <div class="table-responsive">
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Question No </th>
      <th scope="col">Question </th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
	  <th scope="col">Option 3</th>
      <th scope="col">Option 4</th>
      <th scope="col">Correct Answer </th>
      <th scope="col">Answer Given </th>
      <th scope="col">Marks </th>
      <th scope="col">Delete</th>
      </tr></thead>
  <tbody>
<?php 
include('conn.php');
$count=1;
$id=$_REQUEST['id'];
$query="SELECT `S.no`, `Userid`, `quesno`, `Answer`  FROM `result` WHERE `Userid`='$id' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{ $sno=$data['S.no'];
$id=$data['Userid'];
  $no=$data['quesno'];
$AG=$data['Answer'] ;
$query1="SELECT * FROM `image` WHERE `qusid`='$no'";
$result1=mysqli_query($connection,$query1);
if(mysqli_num_rows($result1)>0)
{
  while($data1=mysqli_fetch_assoc($result1))
    {  
      $q= $data1['name'];
    $o1=$data1['option1'];
 $o2=$data1['option2'];
$o3=$data1['option3'];
$o4=$data1['option4'];
$CA=$data1['Answer'];
$ms=$data1['marks'];
	   
        	   
}
?><tr><td><?php echo $count++;?></td>
<td><?php echo $no;?></td>
<td><?php echo $q;?> </td>
<td><?php echo $o1;?></td>
<td><?php echo $o2;?></td>
<td><?php echo $o3;?></td>
<td><?php echo $o4;?></td>
<td><?php echo $CA;?></td>
<td><?php echo $AG;?></td>
<td><?php echo $ms;?></td>
<td class="mine2"><a href="showques.php?sno=<?php echo $sno ; ?> &id=<?php echo $id ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>
 </tr><?php }}
 if(isset($_REQUEST['sno']) and ($_REQUEST['id'])){
     $s=$_REQUEST['sno'];
     $ID=$_REQUEST['id'];
     $sql="DELETE FROM result WHERE `S.no` ='$s'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showques.php?id=$ID");
} 
else{
    echo "error";
}
 }
 ?>  </tbody>

 </table>
 
</center>
</form>
</body>
</html>

