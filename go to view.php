<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
$uname=$_SESSION['uname'];
}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>
<html>
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="sty1.css">

    <script>
        function changeLanguage(language) {
            var element = document.getElementById("url");
            element.value = language;
            element.innerHTML = language;
        }

        function showDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        function openLeftMenu() {
            document.getElementById("leftMenu").style.display = "block";
        }

        function closeLeftMenu() {
            document.getElementById("leftMenu").style.display = "none";
        }
    </script>
        <style>
body{
    background-color:#F8F8F8;
    height:700px;
    width:auto;
}
  iframe{
    
   
    width: 100%;
    height: 100%;
    background-color:#ffffff;
		
   
}
        </style>
        </head>
<body>
    
      
<div class="header">
    <!-- three dot menu -->
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;" id="leftMenu">
        <button onclick="closeLeftMenu()" class="w3-bar-item w3-btn w3-large">Close &times;</button>
        <a href="question entry.php" class="w3-bar-item w3-btn">Enter MCQ Question</a>
        <a href="fil up entry.php" class="w3-bar-item w3-btn">Fill in the blank Question</a>
        <a href="image question.php" class="w3-bar-item w3-btn">Enter Image Question</a>
            <a href="go to view.php" class="w3-bar-item w3-btn">View All Questions</a>
            <a href="admin dashboard.php" class="w3-bar-item w3-btn">Go to dashboard</a>
    </div>
     <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
    </div>
    
        <div style="margin-top:5px; float: right;"> 
                              <i style=" margin-right:2px;  font-size: xx-large; color:white;" title="Username Of Admin"  class="mr-1" aria-hidden="true">(<?php echo $uname;?>)</i>
                                
                  <a href=""><i style=" margin-right:2px;  font-size: xx-large; " title="profile" class="mr-1" aria-hidden="true"><img src="down.png" width="30" height:"30"></i></a>
                    
                    <a href="logout1.php">  <i style="margin-right:2px; font-size: xx-large; color:red;" title="Logout" class="fa fa-sign-out" class="mr-1"aria-hidden="true" ></i></a>
                    </div>
    <span><img src="FRS.png" width="200" height="65" alt="" loading="lazy"></span>
    
</div>
<iframe frameborder="0" style="height: 100%; overflow:scroll; width: 100%" src="view question.php" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless"  frameborder="0" allowtransparency="true"></iframe>
<!--<iframe src = "entery for test.php ">
    Sorry your browser does not support inline frames.
 </iframe> -->
</body>
</html>>