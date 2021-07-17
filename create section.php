<?php
error_reporting(0);
session_start();
?>
<html>
    <head>
        <title>register student for test</title>
          <style>
          .body
          {
              height:auto;
              width:auto;
          }
.mine
{
    text-align:center;
    margin-top:80px;
    background-color:#E8E9EC;
    height:40px;
}
.mine1
{
    
     box-shadow: 5px 4px 5px 5px #F9F9F9;
    outline:none;
    background-color:#ffffff;
    
}
.mine2
{
    text-align:center;
     height:28px;
    background-color:#ffffff;
}
.check input
{
     border-color:blue;
	border-style:solid;
    width: 70%;
    height:auto;
    margin-bottom: 20px;
}
   .check  input[type="Number"]
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
.check input[type="submit"]
{  
    border: none;
    background: #0048C8;
    outline: #ffc107;
    height: 30px;
    align-items:center;
    width: auto;
    margin-left:40px;
    text-align: center;
    position: absolute;
    color: #FFFFFF;
    
    font-size: 20px;
    border-radius: 10px;
}
.check label 
{
    font-size:20px;
    font-family:Times new roman;
}
         </style>
            </head>
        <body>
            <?php
            include('conn.php');
$id=$_REQUEST['id'];
if($_REQUEST['id']==true)
{
}
else
{
echo    "<script>location.href='delete privious entry.php'</script>";
}
$query="SELECT `testname` , `id`  FROM `dashboard` WHERE `id`='$id' ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{ 
 $tid=$data['id'];   
$tname=$data['testname'];
}
?>
<center>
    <div class="container-fluid" style="background-color:lightgrey; text-align:center;">
        <p class="nav-link active" href="#" style=" font-size: 30px; font-family: Times new roman;">Test Name  ::  <?php echo $tname?></p>
  </div>
  
 <div class="head"> 
<h1>Sections</h1></div>
                <div style="background:black; width:20%;  height:5px;" class="welcome1" id="wel">
</div>
</center>
<form action="" method="Post" enctype="multipart/form-data">
    <center>
    <div class="table-responsive">
    <table style="width:80%; margin-top:40px; height:auto; margin-bottom:40px;"class="table table-striped">
     <thead>
       <tr class="mine">
           <th scope="col">S.NO</th>
         <th scope="col">Test name </th>
         <th scope="col">Qus in section</th>
         <th scope="col">Marks</th>
         <th scope="col">DELETE</th>
          </tr></thead>
     <tbody >

<?php
$query1="SELECT `id`, `sectionqus`, `marks`, `testid` ,'testname' FROM `sections` WHERE `testid`='$id' order by marks";
$result1=mysqli_query($connection,$query1);
if($result1)
{
    $count=1;
    $count1=1;
while($data1=mysqli_fetch_assoc($result1))
{ 
    
    
    ?>
    
   <tr class="mine1"><td td class="mine2"><?php echo $count++;?></td>
   <td class="mine2"><?php echo 'Section'.$count1++;?></td>
   <td class="mine2"><?php echo $data1["sectionqus"];?></td>
   <td class="mine2"><?php echo $data1["marks"];?></td>
 
  <!-- <a href="create section.php?id=<?//php echo $data1['id']?>"></a>-->
   <td class="mine2"><a href="delete section.php?id=<?php echo $data1['id']?>" target="_blank"><img src="Delete.png"  height="20" width="15"></a></td>
  
  <?php
  
 }
}
else 
{
echo "you can not create any section";
} 
$studentid;
?>
</tbody>
</table>   


<?php
if(isset($_REQUEST['id']))
{
    $sid =$_REQUEST['id'];

 $sql="SELECT  `sectionqus`, `marks`, `testid` ,'testname' FROM `sections` WHERE `id`='$sid'";
$result=mysqli_query($connection,$sql);
if($result){
while($data4=mysqli_fetch_assoc($result))

echo "welcome".$newdata=$data4['sectionqus'];
echo $data4['marks'];
} 

else
{
 echo "nothing";   
}
}?>
<script type = "text/javascript">
         <!--
            function getValue() {
               var retVal = prompt("Enter your name : ", "<?php echo $newdata;?>");
              // document.write("You have entered : " + retVal);
            }
         //-->
      </script>      
    
    <div class="check">
            <form method="post">
            <h1>create section for the test<h1>
                <div style="background:black; width:30%;  height:5px; margin-bottom:40px" class="welcome1" id="wel">
</div>
 <div class="rounded float-center" style="width:548px; height:200px;background-color: silver;
    padding-top: 53px;">
        
 <label for="inputCity">enter no of question for the section</label>
 <br>
                 <input required type="Number" name="sectionqus"  placeholder="Ex- 10,15">
                 <br>
                  <label for="inputCity">enter marks for the section</label>
    <br>
                 <input required type="Number" name="marks"  placeholder="Ex - 1,2">
                 <br>
                <input type="submit" name="save" value="submit">
        
        </form>
        
        </div>
        <?php
        if(isset($_POST['save']))
        {
         $tid;
         $tname;
          $secqus=$_POST['sectionqus'];
          $mark=$_POST['marks'];
       
         $query2="INSERT INTO `sections`(`sectionqus`, `marks`, `testid`, `testname`) VALUES ('$secqus','$mark','$tid','$tname')";
$result2=mysqli_query($connection,$query2);
            if($result2){
                echo "<script>alert('sucessfully saved');</script>"; 
              header("Refresh:0;");    
                
            }
     else
     {
         echo "<script>alert('error');</script>";
     }
        }
        
        ?>
            </body>
    </html>