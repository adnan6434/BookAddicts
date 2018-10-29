<?php
session_start();
	include("db.php");

if(isset($_POST['delete']))
{
	$suid=$_POST['SUID'];
    if($suid==0||$suid=='')
    {
         header('Location:adminsupplier.php');
                exit();
    }
	$sql="DELETE FROM supplierinfo WHERE SupplierID=$suid ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:adminsupplier.php');
                exit();
            }
}

?>
