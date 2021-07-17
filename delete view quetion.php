<?php
error_reporting(0);
include "conn.php";
$sno=$_GET['sno'];
$test1=$_GET['test'];
 $sql="DELETE FROM mcq WHERE `id` ='$sno'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0;");
}
?>