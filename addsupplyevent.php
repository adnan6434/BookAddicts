<?php
session_start();
	include("db.php");

    $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>  BookAddicts </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/bookaddicts.css" rel="stylesheet">
		<link href="main.css" rel="stylesheet">
    <link rel="icon" type="image/gif/png" href="icons/book library.ico"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/kickstart.js"></script> <!-- KICKSTART -->
 <link rel="stylesheet" href="css/kickstart.css" media="all" />  <!-- KICKSTART -->

</head>
<body style="background:#808080;">

    <div class="brand" id="logo"><a href="index.php">BOOKADDICTS</a></div>


    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">BOOKADDICTS</a>
            </div>
					</div>
					<!-- /.container -->
			</nav>


            <?php
            if(isset($_POST['supplyregister']))
            {
            	$pid=mysqli_real_escape_string($conn,$_POST['productid']);
                $sid=mysqli_real_escape_string($conn,$_POST['supplierid']);
                $price=mysqli_real_escape_string($conn,$_POST['price']);
                $quan=mysqli_real_escape_string($conn,$_POST['quan']);


            $sql="INSERT INTO `supplyinfo` (`ProductID`, `SupplierID`, `userID`, Quantity,`BuyingPrice`, `time`)
             VALUES ('$pid','$sid','$id','$quan','$price',CURRENT_TIMESTAMP)";
                    if(!mysqli_query($conn,$sql))
                        {
                            echo'Error: '.mysqli_error($conn);
                        }
                        else
                        {
                            $sql2="SELECT* FROM productinfo where ProductID=$pid";
                            $r2=mysqli_query($conn,$sql2);
                            $f2=mysqli_fetch_assoc($r2);
                            $quan2=$f2["StockAvailability"];
                            $suid=$f2["SubcategoryID"];
                            $quan3=$quan+$quan2;
                            $sql3="UPDATE `productinfo` SET `StockAvailability` = $quan3 WHERE `productinfo`.`ProductID` = $pid AND `productinfo`.`SubcategoryID` = $suid ";
                            $r3=mysqli_query($conn,$sql3);

                            header('Location:adminsupplylist.php');
                            exit();
                        }
            }

            ?>
            <form id="add_form" method="POST" action="addsupplyevent.php">
            	<fieldset>
            	<legend>Add a product</legend>
            	<p>All fields are required</p>
            	<?php if(isset($_GET['error'])): ?>
            				<div class="error"><?php echo $_GET['error'];?></div>
            			<?php endif;?>
            		<p>
            			<label for="productid">ProductID</label>
            			<input id="productid"  name="productid" type="text" required="true" />
            		</p>

                    <p>
                        <label for="productid">supplierID</label>
                        <input id="productid"  name="supplierid" type="text" required="true" />
                    </p>
                    <p>
            			<label for="price">BuyingPrice</label>
            			<input style="margin-left:0px;" id="price"  name="price" type="text" required="true" />
            		</p>

                    <p>
            			<label for="sid">Quantity</label>
            			<input style="margin-left:20px;" id="sid"  name="quan" type="text" required="true" />
            		</p>



            <p>
            	<input type="submit" value="register" name="supplyregister">
            </p>
            </fieldset>
            	</form>

            </div>
            	<div class="clearfix"></div>
	    <footer id="cd" >
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12 text-center">
	                    <p id="foot">Copyright &copy; BookAddicts-2017 All rights reserved</p>
	                </div>
	            </div>
	        </div>
	    </footer>


</body>
</html>
