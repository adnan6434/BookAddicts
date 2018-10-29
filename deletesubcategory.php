<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$sid=$_POST['SID'];
    if($sid==0||$sid=='')
    {
         header('Location:adminsubcategories.php');
                exit();
    }
	$sql="DELETE FROM subcategory WHERE SubcategoryID=$sid ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:adminsubcategories.php');
                exit();
            }
}

?>
