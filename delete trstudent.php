<?php
error_reporting(0);
include "conn.php";
$id=$_GET['id'];
 $sql="DELETE FROM testregisterstudent WHERE `id` ='$id'";
$result=mysqli_query($connection,$sql);
if($result){
echo "<script>window.close();</script>";
}
?>