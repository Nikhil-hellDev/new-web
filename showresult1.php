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
     <title>Show Result</title>
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
  margin-top:-2.5%;
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
    background-color:#FFFFFF;
    	   box-shadow: 3px 2px 5px 5px  #888888;
    	height:auto;
    	width:auto;
}

.rows a
{
    margin-left:30px;
}

     </style>
     
 //Download excal format     
<script type="text/javascript">
function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>     
     
     
 </head>
 <body>
        
<nav class="stroke">
    <ul>
        <li><a  href="home1.php">User Registration</a></li>
        <li><a style="border-bottom: 3px solid yellow; color:black;" href="showresult1.php">View Result</a></li>
        <li><a href="delete privious entry.php">Current Ongoing test</a></li>
        <li><a href="entery for test.php">Test timer</a></li>
        <li><a href="showuser.php">List of student</a></li>
        <li><a  href="dashentry.php">User Dashboard</a></li>
    </ul>
</nav>

          
  <h1 style="margin-top:-2%;">View Result</h1>
      <div style="background:yellow; width:18%; margin-bottom:20px; height:5px;" class="welcome1" id="wel">
</div> 
<div class="rounded float-right" style="margin-top: -84px; margin-right:26px;">
<p style="font-size: 20px;">Enter Username To Search</p>
 <input style" float:right;  width:auto; border-color:black;" type="text" name="" id="myInput" placeholder=" Search Username . ." onkeyup="searchfun()">
 <button onclick="exportToExcel('myTable', 'student-details')" class="btn btn-success">Export Table Data To Excel File</button>
 </div>
 <form action="showresult1.php" method="Post" enctype="multipart/form-data">
 <center>
 <div class="table-responsive">
 <table class="table table-striped" id="myTable">
  <thead>
    <tr class="mine">
      <th scope="col">S.NO</th>
      <th scope="col">Username </th>
        <th  colspan="2" scope="col">Name</th>
      <th scope="col">Email</th>
       <th scope="col">PhoneNO</th>
      <th scope="col">School Name</th>
      <th scope="col">Class</th>
      <th scope="col">Right</th>
	  <th scope="col">Wrong</th>
      <th scope="col">Not attempt</th>
      <th scope="col">Total question</th>
      <th scope="col">Total Marks</th>
       <th  colspan="2" scope="col">Take Action</th></tr></thead>
  <tbody>
      
<?php include('conn.php');
 $query="SELECT `uniqueno`, `s.no`, `first_name`, `last_name`, `username`, `schoolname`, `class`, `email`, `phoneNo`, `password` FROM `user`";
 $result1=mysqli_query($connection,$query);
 $count=1;
 $id="";
 while($data1=mysqli_fetch_assoc($result1))
   {$right=0;
    $wrong=0;
    $not=0;
    $total=0;
    $marks=0;
    $id=$data1['username'];
    $email=$data1['s.no'];
    
    $query1="SELECT  `Status`,`marks` FROM `result` WHERE `Userid`='$id'";
    $result=mysqli_query($connection,$query1);
    if(mysqli_num_rows($result)>0)
    {while($data=mysqli_fetch_assoc($result))
    {
        if($data['Status']=='correct')
        {
            $right=$right+1;
            $marks=$data['marks']+$marks;
        }
        if($data['Status']=='Wrong')
        {
			
            $wrong=$wrong+1;
        }
        if($data['Status']=='Not attemped')
        {
            $not=$not+1;
        }
      
    }
    $total=$right+$wrong+$not;
    
?>
<tr class="mine1"><td class="mine2"><?php echo $count++;?></td>
<td class="mine2"><a href="showques.php?id=<?php echo $id ; ?>"><?php echo $id ; ?></a></td>
<td class="mine2"><?php echo $data1['first_name'];?> </td>
<td class="mine2"><?php echo $data1['last_name'];?> </td>
<td class="mine2"><?php echo $data1['email'];?> </td>
<td class="mine2"><?php echo $data1['phoneNo'];?> </td>
<td class="mine2"><?php echo $data1['schoolname'];?> </td>
<td class="mine2"><?php echo $data1['class'];?> </td>
<td class="mine2"><?php echo $right;?></td>
<td class="mine2"><?php echo $wrong;?></td>
<td class="mine2"><?php echo $not;?></td>
<td class="mine2"><?php echo $total;?></td>
<td class="mine2"><?php echo $marks;?></td>

<td class="mine2"><a href="delete.php?sno=<?php echo $email ; ?>"class="text-white"> <img src="Delete.png"  height="20" width="15"> </a></td>
   
</td>
 </tr><?php }}
   ?>  </tbody>
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

 </body></html>
