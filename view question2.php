<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
$uname=$_SESSION['uname'];
}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>
<html>
 <head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <style>
 .mine
{
    text-align:center;
    margin-top:40px;
    background-color:#E8E9EC;
}

 .mine2
{
    text-align:center;
    
    background-color:#ffffff;
}

 </style>
 </head>
 <body>
 <form action="" method="Post" enctype="multipart/form-data">
 <center>
 <div class="table-responsive">
 <table class="table table-striped">
  <thead>
    <tr class="mine">
      <th scope="col">S.NO</th>
      <th scope="col">Question </th>
      <th scope="col">Answer</th>
       <th scope="col">Marks </th>
       <th scope="col">Time[seconds] </th>
      <th scope="col">Testname </th>
       <th  colspan="2" scope="col">Take Action</th>
      </tr></thead>
  <tbody>
<?php 
error_reporting(0);
include('conn.php');
$count=1;
 $test=$_REQUEST['testid'];
$query="SELECT  `id`,`Question`,`Answer`,`testid`,`testname`,`marks`,`time` FROM `filtheblank` WHERE `testid`='$test' ";
$result=mysqli_query($connection,$query);

while($data=mysqli_fetch_assoc($result))
{
    $test=$data['testname'];
 $sno=$data['id'];
?><tr><td class="mine2"><?php echo $count++;?></td>
<td class="mine2"><?php echo $data['Question'];?></td>
<td class="mine2"><?php echo $data['Answer'];?></td>
<td class="mine2"><?php echo $data['marks'];?></td>
<td class="mine2"><?php echo $data['time'];?></td>
<td class="mine2"><?php echo $data['testname'];?></td>
<td class="mine2"><a  href="edit view question1.php?sno=<?php echo $sno ; ?>"class="text-white"><img   src="pencil1.jpg"  height="20" width="15"> </a></td>
<td class="mine2"><a href="view question2.php?sno=<?php echo $sno ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>

 </tr><?php 
    
} 

if(isset($_REQUEST['sno'])){
     $s=$_REQUEST['sno'];
     $sql="DELETE FROM filtheblank WHERE `id` ='$s'";
$result=mysqli_query($connection,$sql);
if($result){
    //echo "<script>alert('delete');</script>";
//header("Refresh:0; url=view question1.php?testid=$test");
} 
else{
    echo "error";
}
 }
?>  </tbody>


 </table>
</body>
</html>

