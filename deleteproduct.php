n
<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$pid=$_POST['PID'];
    if($pid=='')
    {
         header('Location:adminproducts.php');
                exit();
    }
	$sql="DELETE FROM productinfo WHERE ProductID=$pid ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:adminproducts.php');
                exit();
            }
}

?>
