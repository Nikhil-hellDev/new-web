
<!--// session_start();-->
<!--// $id=$_SESSION['id'];-->
<!--// error_reporting(0);-->
<!--// $servername="localhost";-->
<!--// $user="id13792556_compdatabase";-->
<!--// $password="//nkP~w9aj9iFSnO";-->
<!--// $db="id13792556_admin";-->
<!--// $con=mysqli_connect($servername,$user,$password,$db);-->
    

<!--//     $img = $_POST['video'];-->

<!--//     $folderPath = "upload/";-->

  

<!--//     $image_parts = explode(";base64,", $img);-->

<!--//     $image_type_aux = explode("image/", $image_parts[0]);-->

<!--//     $image_type = $image_type_aux[1];-->

  

<!--//     $image_base64 = base64_decode($image_parts[1]);-->

<!--//     $fileName = uniqid() . '.png';-->
<!--//     $fileName1 = uniqid() . '.mp4';-->
<!--// $w="https://aiquiz.000webhostapp.com/".$fileName1;-->

<!--// $query="INSERT INTO `video`(`testname`, `username`,`url`) VALUES ('AI','$id','$w')";-->
<!--// mysqli_query($con,$query);-->

<!--//     $file = $folderPath . $fileName;-->

<!--//     file_put_contents($file, $image_base64);-->

  
<?php
session_start();
error_reporting(0);
if($_SESSION['id']==true)
{
$id=$_SESSION['id'];
echo"<script type='text/javascript'>window.close()</script>";
}
else
{
echo    "<script>location.href='firstpage.php'</script>";
}

     
?>