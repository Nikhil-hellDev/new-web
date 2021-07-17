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
      <th scope="col">Question Image </th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
	  <th scope="col">Option 3</th>
      <th scope="col">Option 4</th>
      <th scope="col">Answer </th>
       <th scope="col">Marks </th>
       <th scope="col">Time[seconds] </th>
      <th scope="col">Testname </th>
       <th  colspan="2" scope="col">Take Action</th>
      </tr></thead>
  <tbody>
<?php 
include('conn.php');
$count=1;
  $test=$_REQUEST['testid'];
  $query="SELECT  `id`,`qusid`,`name`,`option1`,`option2`,`option3`,`option4`,`answer`,`testname`,`marks`,`time` FROM `image` WHERE `testid`='$test' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{
   
    $test=$data['testname'];
 $sno=$data['id'];
?><tr><td class="mine2"><?php echo $count++;?></td>
<td class="mine2"><?php echo $data['name'];?></td>
<td class="mine2"><?php echo $data['option1'];?> </td>
<td class="mine2"><?php echo $data['option2'];?></td>
<td class="mine2"><?php echo $data['option3'];?></td>
<td class="mine2"><?php echo $data['option4'];?></td>
<td class="mine2"><?php echo $data['answer'];?></td>
<td class="mine2"><?php echo $data['marks'];?></td>
<td class="mine2"><?php echo $data['time'];?></td>
<td class="mine2"><?php echo $data['testname'];?></td>
<td class="mine2"><a  href="edit view question2.php?sno=<?php echo $sno ; ?>"class="text-white"><img   src="pencil1.jpg"  height="20" width="15"> </a></td>
<td class="mine2"><a href="delete view quetion.php?sno=<?php echo $sno ; ?> & test=<?php echo $test ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>

 </tr><?php 
}
 ?>  </tbody>


 </table>
</body>
</html>

