
<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
include('conn.php');
 $id=$_REQUEST['sno'];

//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `image` WHERE  `id`='$id'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
if($row = $result->fetch_assoc())
{
 $image='upload/'.$row["name"];
    $row["qusid"];
    
}
    
    
}
     else 
{
echo "0 results";
}
}
else
{
echo    "<script>location.href='admin.php'</script>";
}?>
   <html>
<head>
        <title>Edit user</title>
    <style>
body{
    background-color:#efe9e9;
    height:auto;
    width:auto;
}

   #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto;
    background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.9);
}


.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}


#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}


.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}


.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}


@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

   
         .welcome1{
  background-color:#0048C8;
  margin-top:1%;
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


.head{
    background-color:white;
}
input.form-control:not([size]):not([multiple]){
 height: calc(2.25rem + 2px);
    margin-top: 12;
    background-color:lightgrey;  
    border-radius:15px;
}

</style>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body style="background:#efe9e9;">
         
        <div> 
    <h1 style="margin-top:20px;">Edit Image Question</h1></div>
                    <div style="background:yellow; width:28%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>



<form  method="POST" action="" enctype='multipart/form-data'>
    <div class="check">
           <input hidden type="text" name="id" value="<?php echo $row["id"]; ?>">
           <input hidden type="text" name="qusid" value="<?php echo $row["qusid"]; ?>">
          </div>
            <br>
           <br>
      <div class="check2" style="height:fit-content;">
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;">Question </label>
    <div class="col-sm-9">
         <img id="myImg" src="<?php echo $image ?>" alt="Snow" style='width:370px;height:200px;'>
    <pre><?php echo $row["name"]; ?></pre>
         <input type="file" class="form-control" name="Question"  style="margin-top:20px;" id="colFormLabel" placeholder="change by the new file">
      
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;"> option1</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="option1"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["option1"]; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;"> option2</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="option2"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["option2"]; ?>">
    </div>
    </div>
    <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;"> option3</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="option3"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["option3"]; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;"> option4</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="option4"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["option4"]; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;"> Answer</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="Answer"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["answer"]; ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;">Marks</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="marks"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["marks"]; ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;">Time</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="time"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["time"]; ?>" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label " style="text-align: center;line-height: 4;">Testname</label>
    <div class="col-sm-9">
      <input Requird type="text" class="form-control" name="testname"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["testname"]; ?>">
    </div>
  </div>
  <br>
   <input type="text" name="testid"  class="col-sm-10 col-form-label"value="<?php echo $row["testid"]; ?>" hidden>
  <input class="btn btn-primary mb-2 rounded float-right " type="submit" name="submit" value="submit" style="margin-top: -36px;
    margin-right: 30%;
    width: 167px;">
        <br>
    
   
  
      </div>
   </form>
   
   <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

        </body> 
        </html>

<?php
$file = fopen($image,"w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);
unlink($image);
?>

<?php
include('conn.php');
//echo ($id);
     if(isset($_POST['submit'])){
       /*$sno=$_POST['id'];      
       
       $file = fopen($image,"w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);*/


       $qusid==$_POST['qusid'];
         $question=$_POST['name'];
         $option1=$_POST['option1'];
         $option2=$_POST['option2'];
         $option3=$_POST['option3'];
         $time=$_POST['time'];
         $option4=$_POST['option4'];
         $answer=$_POST['answer'];
        $marks=$_POST['marks'];
        $tn=$_POST['testid'];
         $testname=$_POST['testname'];
$cimage=$_FILES['timage']['name'];
$pimage=$_FILES['timage']['tmp_name'];
$newfile=uniqid().$cimage;
$store="upload/".$newfile;
if(move_uploaded_file($pimage,$store))
{
   unlink($image);
}
else
{
    echo '0';
}

 $sqk="UPDATE `mcq` SET `qusid`='$qusid' ,`name`='$newfile',`option1`='$option1',`option2`='$option2',`option3`='$option3',`option4`='$option4',`answer`='$answer',`marks`='$marks',`time`='$time',`testid`='$tn',`testname`='$testname' WHERE `id`='$id' ";
     $result = $connection->query($sqk);
     if($result){
          echo  "<script>alert('sucessfully saved');</script>";
                    header("Refresh:0; ");
     }
     else{
         echo "<script>alert('not updated');</script>";
     }}
 
    ?>


