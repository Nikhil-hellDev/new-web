<?php
error_reporting(0);
include "conn.php";
$username=$_GET['sno'];
 $ID=$_GET['id'];
//echo $username;
//echo $ID;
$sql="DELETE FROM result WHERE `S.no` ='$username'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showques.php?id=$ID");
}
?>