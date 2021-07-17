<html>
<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
include('conn.php');
$id=$_REQUEST['id'];


//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `user` WHERE  `s.no`='$id'";
       $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc())
{
     echo "";
	break;
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
}

   ?> 
   
<head>
<head>
        <title>Edit user</title>
    <style>
body{
    background-color:#F8F8F8;
    height:700px;
    width:800px;
}
.loginbox{
    font-family: Arial, Helvetica, sans-serif;
    width:650px;
    
    border-radius:10px;
    float:left;
    padding:;
}
.boxin{
    background-color:#FFFFFF;
    height:500px;
    width:700px;
}
.boxin input{
 width:500px;
  border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}
.horizontal-group input{
    width:300px;
    padding:10px;
     border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
    background-color:#C8C8C8;
}
.head{
    background-color:#EFF0F1;
    text-align:center;
    width:340px;
    border-top-left-radius:40px;
    border-top-right-radius:40px;
     border-bottom-left-radius:40px;
    border-bottom-right-radius:40px;
    border-style:groove;
    border-color:#0000FF;
}
.divdent{
    padding:10px;
    color:blue;
   border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px; 
}
.form-body{
    padding:10px ;
}
.vertical{
    padding:10px;
    margin-bottom:20px;
    
}
.vertical input{
  background-color:#C8C8C8;
  padding:10px;
}
.vertical select{
    width:500px;
    margin-bottom:20px;
    background-color:#C8C8C8;
    padding:10px;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
     border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}
.boxin label{
    color:#8C8C8C;
    font-size:17px;
    /*font-weight:transparent;*/
    display: inline-block;
    padding:10px;

}

.horizontal-group .left{
    float:left;
    width:49%;
}
.horizontal-group .right{
    float:right;
    width:49%;
}
.boxin input[type="submit"]{
 background-color: #3300CC;
 display:center;
  border: none;
  width:150px;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  float:center;
}

</style>
    </head>
        </head>
    <body>
         <h1 style="margin-top:10px;">Edit user Profile</h1>
      <div style="background:yellow; width:30%; margin-bottom:; height:5px;" class="welcome1" id="wel">
</div>    
        <form  class="loginbox" action="" method="post"> <div style="margin:0;paddding:0">
    <table >
        <br>
	<input type="text" placeholder="uniqueno" name="uniqueno" value="<?php echo $row["uniqueno"]?>"hidden>
	<br>
	
	<input type="text" placeholder="s.no" name="sno" value="<?php echo $row["s.no"]?>"hidden>
	<br>
                    <div class="boxin">
                    <div class="form-body">
                     <div class="horizontal-group">
                    <div class="form-group left">
                    

        <label for="male">first_name</label>
	<input required class="form-control" type="text" placeholder="first_name" name="first_name" value="<?php echo $row["first_name"]?>">
	<br></br>
	    </div>
	  <div class="form-group right">
	<label for="male">last_name</label>
	<br>
		<input required class="form-control" type="text" placeholder="last_name" name="last_name" value="<?php echo $row["last_name"]?>">
	<br><br>
	</div>
                    </div>
                    
                    <div class="vertical">
                        <br><br>
	<label required class="form-control" for="male">username</label>
	<br>
		<input type="text" placeholder="username" name="username" value="<?php echo $row["username"]?>">
	<br><br>
	<label for="male">class of student</label>
	<br>
		<input required class="form-control" type="text" placeholder="class of student" name="class" value="<?php echo $row["class"]?>">
	<br><br>
		<label for="male">School Name</label>
	<br>
		<input required class="form-control" type="text" placeholder="class of student" name="schoolname" value="<?php echo $row["schoolname"]?>">
	<br><br>
		<label for="male">Phone No</label>
	<br>
		<input required class="form-control" type="text" placeholder="class of student" name="phoneNo" value="<?php echo $row["phoneNo"]?>">
	<br><br>
	<label for="male">Gmail</label>
	<br>
		<input required class="form-control" type="text" placeholder="Gmail" name="email" value="<?php echo $row["email"]?>">
		<br><br>
	<label for="male">Password</label>
	<br>
		<input required class="form-control" type="text" placeholder="Password" name="password" value="<?php echo $row["password"]?>">
		<br><br>
	<input type="submit" name="update" value="UPDATE">		
</div>
</table>
</form>
        </body>
<?php
     if(isset($_POST['update'])){
         $uni=$_POST['uniqueno'];
         $sno=$_POST['sno'];
         $firstname=$_POST['first_name'];
         $lastname=$_POST['last_name'];
         $username=$_POST['username'];
         $class=$_POST['class'];
         $school=$_POST['schoolname'];
         $phone=$_POST['phoneNo'];
         $email=$_POST['email'];
         $pass=$_POST['password'];
 $query1="UPDATE `user` SET `uniqueno`='$uni',`s.no`='$sno',`first_name`='$firstname',`last_name`='$lastname',`username`='$username',`class`='$class',`schoolname`='$school',`phoneNo`='$phone',`email`='$email',`password`='$pass' WHERE `s.no`='$sno' ";
    $result1 =mysqli_query ($connection,$query1);
    if ($result1){
    echo "<script>alert('Record updated successfully');</script>";
    header("Refresh:0; url=showuser.php");
}
else {
    echo "<script>Error updating record:</script>" ;
   // header("Refresh:0; url=showresult1.php");
}
         
     }
     
    ?>

</html>
