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
            <style>
                      .check{
                          margin-top:7%;
                      }
                        input{
                            
                            width:70%;
                            height:30px;
                            border-width:0;
                             border-radius:20px;
                            border-color:black;
                            outline:solid black;
                        }
                input[type="submit"]
                {
                    width:10%;
                    height:25px;
                    background-color:;
                    
                }
.check select{
    width:250px;
    height:30px;
    margin-right:20px;
}
            
            </style>
        
        </head>
        <body>

   
<form  action="" method="POST" >
<center>
     <h1 align="center" style="margin-top: 40px">Enter <span style="color: orangered;opacity: 0.8;">Testname</span> to for view <span style="color: orangered;opacity: 0.8;">Question</span></h1>

 <div class="check">
 <label for="inputAddress">Choose Testname : </label>
 <select id="cars" name="testid">
                     <option >-- Testname --</option>
<?php
include('conn.php');
$query3="SELECT `id`,`testname`  FROM `dashboard` ORDER BY id DESC ";
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
<br>
<label for="inputAddress">Choose Type : </label>
    <select id="cars" name="qustype">
                     <option >-- Question Type --</option>
                     <option value="mcq">Text Mcq Questions</option>
                     <option value="filtheblank">Fill in The blanks</option>
                     <option value="image">Image Mcq Questions</option>
</select>
<br>
<br>
    <input type="submit" name="create" value="View">
</div>
</table>
</center>
            </form>
                   <?php
            if(isset($_POST['create'])){
                
                $tn =$_POST['testid'];
                $qt=$_POST['qustype'];
             // echo "<script>alert($qt);</script>";
              if($qt==mcq)
              {
                header("Refresh:0; url=view question1.php?testid=$tn");
                }

            if($qt==filtheblank) {
                header("Refresh:0; url=view question2.php?testid=$tn");
            }
            if($qt==image)
            {
                header("Refresh:0; url=view question3.php?testid=$tn");
            }
            
            }
             else
                {
                  echo '';
                }
            ?>
  
        </body>
</html>