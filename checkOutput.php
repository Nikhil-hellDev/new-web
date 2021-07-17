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
 <head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
	 <div class="rounded float-right" style="margin-top: -84px; margin-right:26px;">
    <p style="font-size: 20px;">Enter Username To Search</p>
     <input style" float:right;  width:auto; border-color:black;" type="text" name="" id="myInput" placeholder=" Search Username . ." onkeyup="searchfun()">
     </div>
 <form action="showques.php" method="Post" enctype="multipart/form-data">
 <center>
      <h1 style="margin-top:40px;">MCQ QUESTION </h1>
 <div class="table-responsive">
 <table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">User Id </th>
      <th scope="col">Question No </th>
      <th scope="col"> Answer </th>
      <th scope="col">Status </th>
      <th scope="col">Marks </th>
      <th scope="col">Edit</th>
      </tr></thead>
  <tbody>
<?php 
include('conn.php');
$count=1;

$query="SELECT * FROM `result` WHERE 1 ";
$result=mysqli_query($connection,$query);
while($data=mysqli_fetch_assoc($result))
{ 
	
$id=$data['Userid'];
  $no=$data['quesno'];
$AG=$data['Answer'] ;
	$sno=$data['Status'];
	$marks=$data['marks'];

?><tr><td><?php echo $count++;?></td>
<td><?php echo $id;?></td>
<td><?php echo $no;?> </td>
<td><?php echo $AG;?></td>
<td><?php echo $sno;?></td>
<td><?php echo $marks;?></td>
	  <td class="mine2"><a  href="EditOutput.php?id=<?php echo $data['S.no']; ?>"class="text-white"><img   src="pencil1.jpg"  height="20" width="15"> </a></td>

 </tr><?php }
 if(isset($_REQUEST['sno']) and ($_REQUEST['id'])){
     $s=$_REQUEST['sno'];
     $ID=$_REQUEST['id'];
     $sql="DELETE FROM result WHERE `S.no` ='$s'";
$result=mysqli_query($connection,$sql);
if($result){
header("Refresh:0; url=showques.php?id=$ID");
} 
else{
    echo "error";
}
 }
 ?>  </tbody>

 </table>
	 </div>
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
</center>
</form>
</body>
</html>