<?php
session_start();
error_reporting(0);
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
        <title> Edit dashboard entry</title>
        <style>
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

        </style>
        </head>
<?php
include("conn.php");
$id=$_REQUEST['id'];
//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `sections` WHERE  `id`='$id'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc())
{
     echo $row[''];
	break;
}
}
else 
{
echo "0 results";
}

?>
<body>
    <h1 style="margin-top:10px;">Edit Dashboard</h1>
      <div style="background:yellow; width:25%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>   
    <div class="check">
    <form method="post">
        <br> <br> <br>
    <label style=" margin-left:20px; color:#8C8C8C; " for="test-name">no of question in section</label>
    <br>
    <input style="width:45%; margin-left:40px;" type="text" name="testname" value="<?php echo $row['testname']?>">
    <br><br><br>
    
    <label style=" margin-left:20px; color:#8C8C8C;" for="test-heading">marks</label>
    <center>
    <input type="text" name="heading" value="<?php echo $row['heading']?>">
    </center>
    <br><br>
   
    <br><br><br><br>
    <input type="submit" name="submit" value="submit">
</center>
    </form>
   </div>
    <?php
    include("conn.php");
    error_reporting(1);
     if(isset($_POST['submit']))
     {
           
           $noq=$_POST['noofqus'];
           
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
                   
                   
                //$query="INSERT INTO `dashboard`(`testname`, `heading`, `description`) VALUES ('$tn','$heading','$description')";
                $query="UPDATE `dashboard` SET `testname`='$tn',`heading`='$heading',`description`='$description',`noofqus`='$noq' WHERE `id`='$id'";
                
$result=mysqli_query($connection,$query);
                if($result){
                    echo  "<script>alert('sucessfully saved');</script>";
                    header("Refresh:0; url=delete privious entry.php");
                }
         else
         {
             echo "<script>alert('something went wrong');</script>";
         }
     }
    ?>
    </body>
    </html>