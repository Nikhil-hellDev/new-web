<?php
 error_reporting(0);
   include('conn.php');

$ue = $_POST['username'];
$pw = $_POST['password'];
session_start();
$_SESSION['id']=$ue;
        $query =" SELECT * FROM user WHERE username ='$ue' && password ='$pw'";
    $data=mysqli_query($connection,$query);
    $t=mysqli_num_rows($data);
    if($t>0 && $data1=mysqli_fetch_assoc($data))
    {
	$_SESSION['class']=$data1['class'];
    $_SESSION['studentid']=$data1['s.no'];
     echo"<script>location.href='checklogin.php'</script>"; 
    }
    else 
    {
        echo "<script>alert('login failed');</script>";
    }
    
?>