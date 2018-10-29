<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$cid=$_POST['CID'];
    if($cid==0||$cid=='')
    {
         header('Location:admincategories.php');
                exit();
    }
	$sql="DELETE FROM categories WHERE CategoryID=$cid ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:admincategories.php');
                exit();
            }
}

?>
