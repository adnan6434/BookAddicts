<?php
session_start();
	include("db.php");
    $uid=$_SESSION['id'];
$gtotal=0;
if(isset($_POST['confirm']))
{
	$oid=$_POST['OID'];
    if($oid=='')
    {
         header("Location:adminorderlist.php?oid=$oid");
                exit();
    }
    $sql="SELECT* from orderinfo,productinfo,userinfo
     where orderinfo.ProductID=productinfo.ProductID
    and orderinfo.userID=userinfo.userID
    and OrderID=$oid";
    $r=mysqli_query($conn,$sql);
    while($field=mysqli_fetch_assoc($r))
    {
        $price=$field["Price"];
        $quan=$field["Quantity"];
        $total=$price*$quan;
        $gtotal=$gtotal+$total;
    }
	$sql1="INSERT into transactioninfo (OrderID,TotalPrice,TimeofTransaction,userID)
    VALUES ('$oid','$gtotal',CURRENT_TIMESTAMP,'$uid')  ";
	  if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header('Location:admintransactionlist.php');
                exit();
            }
}

?>
