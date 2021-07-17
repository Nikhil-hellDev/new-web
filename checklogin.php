<?php 
error_reporting(0);
session_start();
if($_SESSION['id']==true)
{
	echo "<script>location.href='userdash.php'</script>";
}
else
{
    echo "<script>location.href='firstpage.php'</script>";
}

?>