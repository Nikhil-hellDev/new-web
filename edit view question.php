
<?php
session_start();
error_reporting(1);
if($_SESSION['uname']==true)
{
include('conn.php');
 $id=$_REQUEST['sno'];

//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `mcq` WHERE  `id`='$id'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
if($row = $result->fetch_assoc())
{
 $row["Question"];
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
textarea.form-control:not([size]):not([multiple]){
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
    <h1 style="margin-top:20px;">Edit MCQ Test Question</h1></div>
                    <div style="background:yellow; width:32%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
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
        <textarea Requird type="text" class="form-control" name="Question"  style="margin-top:20px;" id="colFormLabel"><?php echo $row["Question"]; ?></textarea>
      
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
      <input Requird type="text" class="form-control" name="Answer"  style="margin-top:20px;" id="colFormLabel" value="<?php echo $row["Answer"]; ?>" >
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
        </body> 
        </html>

<?php
include('conn.php');
//echo ($id);
     if(isset($_POST['submit'])){
       //$sno=$_POST['id'];      
       $qusid==$_POST['qusid'];
         $question=$_POST['Question'];
         $time=$_POST['time'];
         $option1=$_POST['option1'];
         $option2=$_POST['option2'];
         $option3=$_POST['option3'];
         $option4=$_POST['option4'];
         $answer=$_POST['Answer'];
        $marks=$_POST['marks'];
        $tn=$_POST['testid'];
         $testname=$_POST['testname'];

 $sqk="UPDATE `mcq` SET `qusid`='$qusid' ,`Question`='$question',`option1`='$option1',`option2`='$option2',`option3`='$option3',`option4`='$option4',`Answer`='$answer',`marks`='$marks',`time`='$time',`testid`='$tn',`testname`='$testname' WHERE `id`='$id' ";
     $result = $connection->query($sqk);
     if($result){
          echo  "<script>alert('sucessfully saved');</script>";
                    header("Refresh:0; ");
     }
     else{
         echo "<script>alert('not updated');</script>";
     }}
 
    ?>


