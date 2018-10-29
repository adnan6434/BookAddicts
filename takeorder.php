<?php
session_start();
	include("db.php");
    $uid=$_SESSION['id'];
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
            if(isset($_GET['pid']))
            {
            $pid=$_GET['pid'];
            $sql="SELECT * from productinfo where ProductID=$pid";

			$r=mysqli_query($conn,$sql);
			$f=mysqli_fetch_assoc($r);

    		$pname=$f['ProductName'];

            }
            if(isset($_POST['orderregister']))
            {
                $orderid=mysqli_real_escape_string($conn,$_POST['orderid']);
            	$quan=mysqli_real_escape_string($conn,$_POST['quan']);
                $pid1=mysqli_real_escape_string($conn,$_POST['pid']);

            	$sql = "INSERT INTO orderinfo (OrderID,Quantity,ProductID,userID)
                   VALUES ('$orderid','$quan','$pid1','$uid')";
                    if(!mysqli_query($conn,$sql))
                        {
                            echo'Error: '.mysqli_error($conn);
                        }
                        else
                        {
                            header("Location:adminorderlist.php?orderid=$orderid");
                            exit();
                        }
            }

            ?>
            <form id="add_form" method="POST" action="takeorder.php">
            	<fieldset>
            	<legend>Add an Order for <?php echo $pname;?></legend>
            	<p>All fields are required</p>
            	<?php if(isset($_GET['error'])): ?>
            				<div class="error"><?php echo $_GET['error'];?></div>
            			<?php endif;?>
                        <input id="pid"  name="pid" type="hidden" required="true"
             value="<?php echo $pid;?>" />
                        <p>
                            <label for="category">Order ID</label>
                            <input id="category"  name="orderid" type="text" required="true" />
                        </p>
            		<p>
            			<label for="category">Quantity</label>
            			<input id="category"  name="quan" type="text" required="true" />
            		</p>

            <p>
            	<input type="submit" value="register" name="orderregister">
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
