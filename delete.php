<?php
error_reporting(0);
include "conn.php";
$username=$_GET['sno'];
 $sql="SELECT * FROM `user` WHERE `s.no` ='$username'";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result))
{
 $userid =  $row['username'];
}

 $sql="DELETE FROM result WHERE `Userid` ='$userid'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showresult1.php");
}
?>