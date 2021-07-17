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
    height:auto;
    width:auto;
}

         .welcome1{
  background-color:#0048C8;
  margin-top:-2.2%;
  width: 100%;
  height: 2px;
}
.rows{
        width:auto;
                   box-shadow: 3px 2px 5px 5px  #888888;
background-color:#FFFFFF;
            height:auto;
        
    }
    
    .rows a
    {
       height:20px;
        margin-left:30px;
    }
    .check2{
     margin-right:70px;
    background:white;
     height:fit-content;
    width:60%;
    margin-left: 25%;
}
.check1{
     margin-right:70px;
    background:white;
     height:fit-content;
    width:60%;
    margin-left: 25%;
}

select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 2px);
    margin-top: 7;
    background-color:lightgrey;
border-radius:15px;
    
}
input.form-control:not([size]):not([multiple]){
 height: calc(2.25rem + 2px);
    margin-top: 12;
    background-color:lightgrey;  
    border-radius:15px;
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
            <a href="go to view.php" class="w3-bar-item w3-btn">View All Question</a>
             <a href="admin dashboard.php" class="w3-bar-item w3-btn">Go to Dashboard</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
    </div>
    
        <div style="margin-top:5px; float: right;"> 
                              <i style=" margin-right:2px;  font-size: xx-large; color:white;" title="Username Of Admin"  class="mr-1" aria-hidden="true">(<?php echo $uname;?>)</i>
                                
                  <a href=""><i style=" margin-right:2px;  font-size: xx-large; " title="profile" class="mr-1" aria-hidden="true"><img src="down.png" width="30" height:"30"></i></a>
                    
                    <a href="logout1.php">  <i style="margin-right:2px; font-size: xx-large; color:red;" title="Logout" class="fa fa-sign-out" class="mr-1"aria-hidden="true" ></i></a>
                    </div>
    <span><img src="FRS.png" width="auto" height="65" alt="" loading="lazy"></span>
    
</div>
<!--<form class="detailbox" method='post'>-->
        <div class="head"> 
    <h1 style="margin-top:-2%">Enter of Test Question</h1></div>
                    <div style="background:yellow; width:28%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="check1">
        <div class="form-group row">
            <label style="text-align: center; line-height: 4;" class="col-sm-2" for="inputState">Test Name</label>
            <div class="col-sm-9">
      <select id="inputState"  name="testid" style="margin-top:20px;" class="form-control">
        <option >Choose...</option>
        <?php
        include('conn.php');
$query3="SELECT `id`,`testname`  FROM `dashboard` ";
$result3=mysqli_query($connection,$query3);
if($result3)
{
while($data3=mysqli_fetch_assoc($result3))
{
    ?>
       <option value="<?php echo $data3['id']; ?>" ><?php echo $data3['testname']; ?></option>
<?php
}
}
     ?>                

       
      </select>
      <br>
      </div>
      </div>
      </div>
      <br>
      <div class="check2">
        <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Question NO.</label>
    <div class="col-sm-9">
      <input requird type="text" class="form-control" name="qusid"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter question no.">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Enter Question</label>
    <div class="col-sm-9">
      <input requird type="file" class="form-control" name="timage" accept="image/*"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter Question">
    </div>
  </div>
          <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Enter Option1</label>
    <div class="col-sm-9">
      <input requird type="text" class="form-control" name="option1"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter Option 1">
    </div>
  </div>
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Enter Option2</label>
    <div class="col-sm-9">
      <input requird type="text" class="form-control" name="option2"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter Option 2">
    </div>
  </div>
 <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Enter Option3</label>
    <div class="col-sm-9">
      <input requird type="text" class="form-control" name="option3"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter Option 3">
    </div>
  </div>
   <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 " style="text-align: center;line-height: 5;">Enter Option4</label>
    <div class="col-sm-9">
      <input requird type="text" class="form-control" name="option4"  style="margin-top:20px;" id="colFormLabel" placeholder="Enter Option 4">
    </div>
  </div>            
           <div class="form-group row">
    <label  style="text-align: center;line-height: 5;" for="colFormLabel" class="col-sm-2 ">Enter Answer</label>
    <div class="col-sm-9">
       <select id="inputState"  name="Answer" class="form-control">
        <option >--Answer--</option>
        <option value='option1'>option1<option>
<option value='option2'>option2<option>
<option value='option3'>option3<option>
<option value='option4'>option4<option>
    </select>
    </div>
  </div>
            
             <div class="form-group row">
    <label for="colFormLabel" style="text-align: center;line-height: 5;" class="col-sm-2 ">Marks</label>
    <div class="col-sm-9">
      <input type="Number" class="form-control"  name="marks" id="colFormLabel" placeholder="Enter marks of question">
    </div>
  </div>
   
             <div class="form-group row">
    <label for="colFormLabel" style="text-align: center;line-height: 5;" class="col-sm-2 ">Time</label>
    <div class="col-sm-9">
      <input type="Number" class="form-control"  name="time" id="colFormLabel" placeholder="Enter time in second">
    </div>
  </div>
            <input class="btn btn-primary mb-2 rounded float-right " type="submit" name="submit" value="submit" style="margin-top: -10px;
    margin-right: 30%;
    margin-bottom:20px;
    width: 167px;">          
            <br>
            <br>
            </div>
</form>

   <?php
       error_reporting(0);
 include('conn.php');

if(isset($_POST['submit'])){
    $quesid=$_POST['qusid'];
  $tid=$_POST['testid'];
     $query3="SELECT `testname`  FROM `dashboard` WHERE `id`='$tid' ";
     $result3=mysqli_query($connection,$query3);
while($data3=mysqli_fetch_assoc($result3))
{
$tn=$data3['testname'];
}
$time=$_POST['time'];
  $option1=$_POST['option1'];
      $option2=$_POST['option2'];
       $option3=$_POST['option3'];
        $option4=$_POST['option4'];
         $answer=$_POST['Answer'];
          $marks=$_POST['marks'];
      $image=$_FILES['timage']['name'];
$pimage=$_FILES['timage']['tmp_name'];
$newfile=uniqid().$image;
$store="upload/".$newfile;
if(move_uploaded_file($pimage,$store))
{
   // echo '1';
}
else
{
    echo '0';
}
 $sql="INSERT INTO `image` ( `qusid`, `name`, `option1`, `option2`, `option3`, `option4`, `Answer`, `marks`, `testname`, `testid`, `time`) VALUES ('I_$quesid','$newfile','$option1','$option2','$option3','$option4','$answer','$marks','$tn','$tid','$time')";
 
 $result = $connection->query($sql);
if($result){
    echo "<script>alert('Successfully saved');</script>";
}
else{
    echo "<script>alert('not saved');</script>";
}

 
}
?>


</body>
</html>