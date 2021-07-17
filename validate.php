<?php
    $name="localhost";
$user="id12994044_adminelement";
$password="!|%&j8K^wc?C]<8>";
$db="id12994044_admin";
    $con=mysqli_connect($name,$user,$password,$db);
    


    $user=$_POST['name'];
      $up="VIDEO".rand().$user;
      $inter="upload/$up.mp4";
     $url="$user.mp4";
     $sql="INSERT INTO `video`(`url`) VALUES ('$url')";
   if(mysqli_query($con,$sql)){
  file_put_contents($inter,file_get_contents($user));
         
   }

 
    

    ?>         