
<?php
session_start();
if($_SESSION['id']==true)
{
include('conn.php');
$id=$_SESSION['id'];
//echo "WELCOME "."  ". $id;
$query="SELECT * FROM `user` WHERE  `username`='$id'";
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
    echo "<script>location.href='login.php'</script>";
}

        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>user Registration</title>
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
    
}
.boxin{
    background-color:#FFFFFF;
    margin-top:10px;
    height:500px;
    width:900px;
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
    background-color:;
    text-align:center;
    width:340px;
    /*border-top-left-radius:10px;
    border-top-right-radius:40px;
     border-bottom-left-radius:40px;
    border-bottom-right-radius:40px;
    border-style:;
    border-color:yellow;
    */
    
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
    color:blue;
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
    <body>
       
                 
            <form  class="loginbox" action="home1.php" method="post"> <div style="margin:0;paddding:0">
             
                    
                        <table>
                            <div class="head">
                    <h1>Users Profile</h1></div>
                    <div style="background:blue; width:55%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>  
                    
                    <br>
                    <div class="boxin">
                    <div class="form-body">
                     <div class="horizontal-group">
                    <div class="form-group left">
                    <label for="first_name"><b>First name</b></label>
                    <br>
                   <input  required class="form-control" type="text" name="first_name" value="<?php echo $row["first_name"]?>"/>
                    <br></br>
                    </div>
                    <div class="form-group right">
                    <label for="last_name"><b>Last name</b></label>
                    <br>
                    <input  required class="form-control" type="text" name="last_name" value="<?php echo $row["last_name"]?>"/>
                    <br></br>
                    </div>
                    </div>
                    </div>
                    <div class="vertical">
                    <label for="username"><b>User name</b></label>
                    <br>
                    <input  required class="form-control" type="text" name="username" value="<?php echo $row["username"]?>"/>
                    <br></br>
                    <label for="class"><b>Choose your class</b></label>
                    <br>
                        <input  required class="form-control" type="text" name="class" value="<?php echo $row["class"]?>"/>
                
 <br></br>
                    <label for="email"><b>Email</b></label>
                    <br>
                    <input  required class="form-control" type="text" name="email"  value="<?php echo $row["email"]?>"/>
</div>                
              
        <!--    <input type="submit" name="create" value="submit" hidden>
            --></div>
            </table>
            </form>
                   <?php
            if(isset($_POST['create'])){
                
                
                $firstname =$_POST['first_name'];
               if(empty($firstname)){
                   echo "first name is required";
                   }
                   
               $lastname =$_POST['last_name'];
               if(empty($lastname)){
                   echo "last name is required";}
               $username =$_POST['username'];
               if(empty($username)){
                   echo "username is required";}
               $class =$_POST['class'];
               if(empty($class)){
                   echo "class is required";}
                   $email =$_POST['email'];
               if(empty($email)){
                   echo "email is required";}
                $string="1234567890";            
                  $password= substr(str_shuffle($string),0,8);
                $query="INSERT INTO `user`(`first_name`, `last_name`, `username`,`class`, `email`, `password`) VALUES ('$firstname','$lastname','$username',' $class','$email','$password')";
                //$query="INSERT INTO `user`(, `first_name`, `last_name`, `username`, `class`, `email`, `password`) VALUES ($firstname, $lastname,$username,$class,$email,$password)";
                $result= mysqli_query($connection,$query);
                if($result){
                    echo "sucessfully saved"; 
                    $to = $email;
                    $subject = 'this is your password';
                    $message = 'hi here is your password'.$password;
                    $headers ="From: the sender  name <ficmis.000webhost.com>\r\n";
                    $headers="Reply-to: kritaghya.figwl@gmail.com\r\n";
                    $headers="Content-type:text/html\r\n";
                    mail($to,$subject,$message,$headers);
                
                
                   
                }else{
                  echo 'error';
                }
            }
            ?> 
    </body>
</html>
