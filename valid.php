<?php
error_reporting(0);
$servername="localhost";
$user="id12994044_adminelement";
$password="!|%&j8K^wc?C]<8>";
$db="id12994044_admin";
$con=mysqli_connect($servername,$user,$password,$db);
       if(isset($_POST['end']))
       {
           $et=$_POST['end'];
           echo "$et";
           $up="VIDEO".$et.".mp4";
           $inter="upload/$up";
          $url="https://ficmis.000webhostapp.com/$et.mp4";
       
           $query="INSERT INTO `video`(`url`) VALUES ('$url')";
        mysqli_query($con,$query);
       
        file_put_contents($inter,base64_decode($et));
       
       }
       
       ?>