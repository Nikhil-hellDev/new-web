
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
.col-sm-4{
    justify-content:center;
		align-items:center;
    		background-color:#FFFFFF;
    		background-size:cover;
    position: absolute;
    margin: 0 auto;
    box-sizing: border-box;
    padding: 40px 50px;
		box-shadow: 5px 4px 3px 2px #888888;
		height:auto;
		width: 500px; 
margin-top:200px;
  margin-left:500px;
  margin-right:500px;

		border-radius:10px;
		
}

.col-sm-4 input{
    border-color:blue;
	border-style:solid;
    width: 100%;
    height:auto;
    margin-bottom: 20px;
}

.col-sm-4 input[type="text"] , input[type="password"]
{  border-color:grey;
    /*border: none;*/
   
    border-bottom: 1px solid blue;
    background: transparent;
    outline: none;
    height: 40px;
    color: black;
    font-size: 16px;
    border-radius: 70px;
}
.col-sm-4 input[type="submit"]
{       position:  absolute;
   /*border-color:#ffc107;
    margin: 10%;
    padding:1%;
*/
    border: none;
    background: #0048C8;
    outline: #ffc107;
    height: 30px;
    align-items:center;
    width: auto;
    margin-left:80px;
    text-align: center;
    position: absolute;
    color: #FFFFFF;
    
    font-size: 20px;
    border-radius: 10px;
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
  <link rel="stylesheet"  href="style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<body>
    
   

    
     <!--  <div class="col-sm-3"></div>
    -->

        <div class="loginbox" >
           
                <img src="avatar.png" class="avatar">
            
            <h1>WELCOME</h1>
            <p style="text-align: center;">sign in blow to see all amazing quiz</p>
            <form method="post">
                <input type="text" name="username" required placeholder="   Enter username">
            <input type="password" name="password" required placeholder="   Enter Password">
           <br>
            
           <input type="submit" name="submit" value="             submit               ">
           
        </form>
        </div>

         <?php
         error_reporting(0);
   include('conn.php');
if(isset($_POST['submit']))
{
    $ue = $_POST['username'];
    $pw= $_POST['password'];
    $_SESSION['id']=$ue;
        $query =" SELECT * FROM user WHERE username ='$ue' && password ='$pw'";
    $data=mysqli_query($connection,$query);
    $t=mysqli_num_rows($data);
    if($t>0 && $data1=mysqli_fetch_assoc($data))
    {$_SESSION['class']=$data1['class'];
    $_SESSION['studentid']=$data1['s.no'];
    echo"<script>location.href='userdash.php'</script>";  
    }
    else 
    {
        echo "login failed";
    }
    
}

        ?>

        <script>
            
            
                function openWin() { 
                var newWindow;
                    newWindow = header("location:rightclick.html"); 
        } 
        </script>

</body>
</html>
  