<?php 
session_start();
error_reporting(0);
include('conn.php');
$id = $_SESSION['id'];

?>


<html>
    <head>
        <title>Dashboard</title>
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
.row{
    margin:0 -5px;
}
.row:after{
    content:"";
    display:table;
    clear:both;
}
@media screen and (max-width:100px){
    .column{
        width:50%;
        display:block;
        margin-bottom:20px;
    }
}
.abc{
    padding-left:3em;
}
.tooltip-wrap {
  position: relative;
}
.tooltip-wrap .tooltip-content {
  display: none;
  position: absolute;
  bottom: 3%;
  left: 5%;
  background-color: #fff;
  border-radius:3px;
  margin-top:30px;
 
}
.tooltip-wrap:hover .tooltip-content {
  display: block;
}

.pad{
    padding-right:40px;
   padding-top:10px;
}
.pad2{
    margin-top:10px;
} 
.forborder{
    box-shadow:-1px 1px 1px 1px lightgrey;
    background-color:#ffffff;
}
        </style>
        </head>
<body>
    
      
<div class="header" style="height:90px;">
    <!-- three dot menu -->
   
            <div style="margin-top:15px; float: right;"> 
                              <i style=" margin-right:10px;  font-size: xx-large; color:white; "  title="Username"  class="mr-1" aria-hidden="true">(<?php echo $id;?>)</i>
                              
                  <a href="profile.php">   <i style=" margin-right:10px;  font-size: xx-large; " class="fa fa-user" title="profile" class="mr-1" aria-hidden="true"></i></a>
                    
                    <a href="logout.php">  <i style="margin-right:10px; font-size: xx-large; color:red;" class="fa fa-sign-out" title="Logout"  class="mr-1"aria-hidden="true" ></i></a>
                    </div>
    <span><img src="FRS.png" width="auto" height="85" alt="" loading="lazy"></span>
    
</div>

<br>
<br>

  &nbsp;
<div class='container-fluid '> 
<div class='row abc'>
         
<?php 
error_reporting(0);

$classname=$_SESSION['class'];
 $id=$_SESSION['id'];
$studentid=$_SESSION['studentid'];


   
    
   $query1="SELECT `testid`  FROM `testregisterstudent` WHERE `studentid`='$studentid'";

$result1=mysqli_query($connection,$query1);
while($row1=mysqli_fetch_array($result1))
{
    $td= $row1['testid'];
   $query="SELECT `id`,`testname`, `heading`, `description` FROM `dashboard` WHERE `id`='$td'";

$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($result))
{
  
          $test=$row['testname'];
         $tid=$row['id'];
         
        
        echo " 
        <div class='col-xl-3  col-sm-6'>
         <div class='card' style='width:300px; height:fit-content;'>
          <center><img src='group.png' alt='Card image cap'  class='card-img-top' style='width:210px; height:180px;' ></center>
          <div class='card-body'>
            <h4 class='card-title'><center>". $row['testname'] ."</center></h4>
            <h5 class='card-title'><center>". $row['heading'] ."</center></h5>
            <center> <p style='color: #808080;  font-size: 10px;'>". $row['description'] ."</p></center>
           <center><a href='myfile.php?testid=$tid' class='btn btn-primary' width='auto'>Go for the test</a></center>
          </div>
          </div>
          <br>
          </div>";
         
}
                
}

?>
          
          </div>
          </div>
    
    </body>
    </html>
    
