<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==true)
{
$id=$_SESSION['uname'];
}
else
{
echo    "<script>location.href='admin.php'</script>";
}

?>

<html>
    <head>
    <title>Current Ongoing Test</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="sty1.css">
     <style>
         .welcome1{
  background-color:#0048C8;
  margin-top:-2.3%;
  width: 100%;
  height: 2px;
}
.mine
{
    text-align:center;
    margin-top:40px;
    background-color:#E8E9EC;
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
    
    background-color:#ffffff;
}
.rows{
        width:auto;
background-color:#FFFFFF;
    	   box-shadow: 3px 2px 5px 5px  #888888;
            height:auto;
        
    }
    
    .rows a
    {
       height:20px;
        margin-left:30px;
    }
     </style>
</head>
<body>
<nav class="stroke">
    <ul>
        <li><a  href="home1.php">User Registration</a></li>
        <li><a href="showresult1.php">View Result</a></li>
        <li><a style="border-bottom: 3px solid yellow; color:black;" href="delete privious entry.php">Current Ongoing test</a></li>
        <li><a href="entery for test.php">Test timer</a></li>
        <li><a href="showuser.php">List of student</a></li>
        <li><a  href="dashentry.php">User Dashboard</a></li>
    </ul>
</nav>

  <h1 style="margin-top:-2.2%; ">Current Ongoing Test</h1>
      <div style="background:yellow; width:30%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div>    
  
    <div class="rounded float-right" style="margin-top: -84px; margin-right:26px;">
<p style="font-size: 20px;">Enter Test Name To Search</p>
 <input style" float:right;  width:auto; border-color:black;" type="text" name="" id="myInput" placeholder=" Search Testname . ." onkeyup="searchfun()">
 </div>
<form action="" method="Post" enctype="multipart/form-data">
 <center>
 <div class="table-responsive">
 <table class="table table-striped" id="myTable">
  <thead>
    <tr class="mine">
      <th scope="col">S.NO</th>
      <th scope="col">Test name </th>
      <th scope="col">Heading</th>
      <th scope="col">Description</th>
       <th  colspan="2" scope="col">Take Action</th>
       <th scope="col">Sections</th>
       </tr></thead>
  <tbody >
<?php
include("conn.php");
$query="SELECT `id`, `testname`, `heading`, `description` FROM `dashboard` ORDER BY id DESC";
 $result = $connection->query($query);

if ($result->num_rows > 0) {
// output data of each row
$count=1;
while($row = $result->fetch_assoc())
{
?>

<tr class="mine1"><td td class="mine2"><?php echo $count++;?></td>
<td class="mine2"><?php echo $row["testname"];?></td>
<td class="mine2"><?php echo $row["heading"];?></td>
<td class="mine2"><?php echo $row["description"];?></td>

<td class="mine2"><a href="edit dashentry.php?id=<?php echo $row['id']?>"><img src="pencil1.jpg"  height="20" width="15"></a></td>
<td class="mine2"><a href="delete privious entry.php?id=<?php echo $row['id']?>"><img src="Delete.png"  height="20" width="15"></a></td>
<td class="mine2"><button style="background-color:#00FF00; color:black;"><a href="create section.php?id=<?php echo $row['id']?>">EDIT</a></button></td>

  <!--
    <button class="btn-danger btn"><a href="delete.php?sno=<?php?>"class="text-white"> Delete </a></button>
    -<form action="" method ="POST"><input type="hidden" name ="username" value= "$id" ><input type="submit" class="btn btn-sm btn-danger" name="submit" value="Delete"></form>-->

 </tr> 
 <?php
 }
}
else 
{
echo "0 results";
} 
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];

 $sql="DELETE FROM dashboard WHERE `id`='$id'";
$result=mysqli_query($connection,$sql);
if($result){
//echo "delete";
header("Refresh:0; url=delete privious entry.php");
} 

else
{
 echo "nothing";   
}
}
?>
 </tbody>
 </table>
 <script>
  const searchfun = () =>{
      let filter = document.getElementById('myInput').value.toUpperCase();
      let myTable = document.getElementById('myTable');
      let tr = myTable.getElementsByTagName('tr');
      for(var i=0; i<tr.length; i++)
      {
          let td = tr[i].getElementsByTagName('td')[1];
          if(td)
          {
              let textvalue = td.textContent || td.innerHTML;
              if(textvalue.toUpperCase().indexOf(filter)>-1)
              {
                  tr[i].style.display="";
              }
              else
              {
                  tr[i].style.display="none";
              }
          }
      }
      
  }
  </script>
 </form>
 
 </body>
</html>