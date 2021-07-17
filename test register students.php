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
    <head>
        <title>register student for test</title>
   <style>
            .body
          {
              height:auto;
              width:auto;
          }
.mine
{
    text-align:center;
    margin-top:40px;
    background-color:#E8E9EC;
    height:40px;
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
     height:28px;
    background-color:#ffffff;
}
</style>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        </head>
        <body>
            
<div class="container-fluid" style="background-color:lightgrey; text-align:center;">
        <p class="nav-link active" href="#" style=" font-size: 30px; font-family: cursive;">Student Test Information</p>
  </div>
  <div class="table-responsive">
      <table class="table table-striped">
          <tr class="mine">
         <th scope="col">FirstName</th>
         <th scope="col">LastName</th>
         <th scope="col">UserName</th>
         <th scope="col">Class</th>
          </tr></thead>
      <tbody>
          
       
            
            <?php
            include('conn.php');
$studentid=$_REQUEST['studentid'];
$query="SELECT `first_name`, `last_name`, `username`, `class`  FROM `user` WHERE `s.no`='$studentid' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{
    $user=$data['username'];
?>
   <!--- echo $data['first_name'];

echo $data['last_name'];

echo $data['username'];
echo $data['class'];-->


          <tr class="mine1"><td td class="mine2"><?php echo $data['first_name'];?></td>
   <td class="mine2"><?php echo $data['last_name'];?></td>
   <td class="mine2"><?php echo $data['username'];?></td>
   <td class="mine2"><?php echo $data['class'];?></td>
<?php
}
?>
</tbody>
</table>
</div>
<br>
<br>
<form action="" method="Post" enctype="multipart/form-data">
    <center>
     <div class="container-fluid" style="background-color:lightgrey; text-align:center; width:80%;margin-top:-40px;">
        <p class="nav-link active" style=" font-size: 20px; font-family: cursive;">Student Already Register For Test</p>
  </div>
    <div class="table-responsive">
    <table class="table table-striped" style="width:80%;">
     <thead>
       <tr class="mine">
         <th scope="col">S.NO</th>
         <th scope="col">Test name </th>
         <th scope="col">DELETE</th>
          </tr></thead>
     <tbody >

<?php
$query1=$query1="SELECT * FROM `testregisterstudent` WHERE `studentid`='$studentid' ";

$result1=mysqli_query($connection,$query1);
if($result1)
{
    $count=1;
while($data1=mysqli_fetch_assoc($result1))
{ 
    
    
    ?>
    
   <tr class="mine1"><td class="mine2"><?php echo $count++;?></td>
   <td class="mine2"><?php echo $data1["testname"];?></td>
   <td class="mine2"><a href="delete trstudent.php?id=<?php echo $data1['id']?>" target="_blank"><img src="Delete.png"  height="20" width="15"></a></td>
  <?php
 }
}
else 
{
echo "student not register for any test";
} 
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];

 $sql="DELETE FROM testregisterstudent WHERE `id`='$id'";
$result=mysqli_query($connection,$sql);
if($result){

} 

else
{
 echo "nothing";   
}
}$studentid;
?>
</tbody>
</table>   
    <div class="rounded float-center" style="width:548px; height:200px;background-color: silver;
    padding-top: 53px;">
            <form  class="register" method="post">
            <div class="contanier" style="background-color:lightgrey; width:252px; height:30px;" ><h1 style="font-size:20px;">Register student for test<h1></div>
            <br>
            
                <select id="cars" name="testid" style="width:150px; height:30px;">
                     <option >-- Testname --</option>
<?php
$query3="SELECT `id`,`testname`  FROM `dashboard` ORDER BY id DESC ";
$result3=mysqli_query($connection,$query3);
if($result3)
{
while($data3=mysqli_fetch_assoc($result3))
{
    ?>
       <option value="<?php echo $data3['id']; ?>" ><?php echo $data3['testname']; ?></option>
<?php
}
}
     ?>                
             </select>   
                <input type="submit" name="save" value="submit" style="border:0; width:60px">
        </form>
        </div>
        <?php
        if(isset($_POST['save']))
        {
          $testid=$_POST['testid'];
          $query3="SELECT `testname`  FROM `dashboard` WHERE `id`='$testid' ";
        $result3=mysqli_query($connection,$query3);
while($data3=mysqli_fetch_assoc($result3))
{
$tn=$data3['testname'];
}
         $query2="INSERT INTO `testregisterstudent`(`studentid`, `username`, `testid`, `testname`) VALUES ('$studentid','$user','$testid','$tn')";
$result2=mysqli_query($connection,$query2);
            if($result2){
                echo "<script>alert('sucessfully saved');</script>"; 
                header("Refresh:0;");   
            }
     else
     {
         echo "<script>alert('error');</script>";
     }
        }
        
        ?>
            </body>
    </html>
