<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$eid=$_POST['EID'];
    if($eid==0||$eid=='')
    {
         header('Location:adminemployeelist.php');
                exit();
    }
	$sql="DELETE FROM userinfo WHERE userID=$eid ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:adminemployeelist.php');
                exit();
            }
}

?>
