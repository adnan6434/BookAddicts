<?php
include ('db.php');
if(isset($_POST['preorder']))
{
    $name=mysqli_real_escape_string($conn,$_POST['cname']);
    $cno=mysqli_real_escape_string($conn,$_POST['contact']);
    $q=mysqli_real_escape_string($conn,$_POST['quantity']);
    $pid=mysqli_real_escape_string($conn,$_POST['pid']);



    $sql = "INSERT INTO preorder (ProductID,Name,ContactNO,Quantity,time)
       VALUES ('$pid','$name','$cno','$q',CURRENT_TIMESTAMP)";
        if(!mysqli_query($conn,$sql))
            {
                echo'Error: '.mysqli_error($conn);
            }
            else
            {
                header("Location:product.php?ProductID=$pid");
                exit();
            }
}

?>
