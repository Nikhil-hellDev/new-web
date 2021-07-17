<?php
error_reporting(0);
echo "<form method='POST'><input type='submit' name='starttest' value='Starttest'></form>";
if(isset($_POST['starttest']))
{
$i=1;
$_SESSION['question']= array();
 while($i<=10)
    {$no=random_int(1,10);
    if(in_array($no,$_SESSION['question']))
    {
      $i=$i;
    }
    else
    {
        array_push($_SESSION['question'],$no);
        $i=$i+1;
    }}
    $_SESSION['index1']=0;
    $_SESSION['time']=60;
    $_SESSION['Attempt']=array();
     $_SESSION['unattempt']=array();
echo "<script>location.href='pratice.php'</script>";
}
?>
