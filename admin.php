
<!DOCTYPE html>
<html>
<head>
    <style>
.row:after {
  content: "";
    display:table-row;
  clear: both;
}

    body{
        color:black;
    margin: 0;
    padding: 0;
    background-image: url("");
    background-size: cover;
    background-position: center;
    width:auto;
    height:auto;
    font-family: sans-serif;
}


.avatar{
    width: 85px;
    height: 85px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    color: #0000CD;
    font-size: 22px;
    
}

.welcome{
    
    margin: 0%;
	border-bottom-color:blue;
	border-style:solid;
	border-width:0px;
    width: 840px;
    height: auto;
}

    </style>
    
    
<title>Login Form </title>
<meta charset="utf-8">
  <link rel="stylesheet"  href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<body>
    
   

    
     <!--  <div class="col-sm-3"></div>
    -->

        <div class="loginbox" >
           
                <img src="avatar.png" class="avatar">
            <center>
            <h1>Welcome Back</h1>
            <p>Hello there , sign in to continue!</p>
            </center>
            <form method="post">
                <label for="first_name"><b>Email or username</b></label>
                <input type="text" name="uname" required placeholder="   Enter username">
            <label for="first_name"><b>Password</b></label>
            <input type="password" name="upass" required placeholder="   Enter Password">
           <br>
            
           <input type="submit" name="submit" value="             submit               ">
           
        </form>
        </div>

         <?php
         session_start();
         error_reporting(0);
   include('conn.php');
if(isset($_POST['submit']))
{
    $ue = $_POST['uname'];
    $pw= $_POST['upass'];
    $_SESSION['uname']=$ue;
    
        $query =" SELECT * FROM admin WHERE uname ='$ue' && upass ='$pw'";
    $data=mysqli_query($connection,$query);
    $t=mysqli_num_rows($data);
    if($t>0 && $data1=mysqli_fetch_assoc($data))
    {$_SESSION['class']=$data1['class'];
    echo"<script>location.href='admin dashboard.php'</script>";  
    }
    else 
    {
        echo "login failed";
    }
    

}
        ?>

      
</body>
</html>
  