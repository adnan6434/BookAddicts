<?php
session_start();
//author:ADNAN TAUFIQUE
	include("db.php");?>
	<?php
$x="";
$current='products';
	if(isset($_SESSION['name'])&&($_SESSION['role']=='owner'||$_SESSION['role']=='employee')){
		//echo "YES";
		$login_user=$_SESSION['name'];
		$urole=$_SESSION['role'];
	}
	else
	{
		   header('Location:index.php');
                exit();
	}
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DashBoard</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
		  <link href="css/bookaddicts.css" rel="stylesheet">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="icon" type="image/gif/png" href="icons/book library.ico"/>

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

		<style>
			.ad {
				position: absolute;
				width: 300px;
				height: 250px;
				border: 1px solid #ddd;
				left: 50%;
				transform: translateX(-50%);
				top: 250px;
				z-index: 10;
			}
			.ad .close {
				position: absolute;
				font-family: 'ionicons';
				width: 20px;
				height: 20px;
				color: #fff;
				background-color: #999;
				font-size: 20px;
				left: -20px;
				top: -1px;
				display: table-cell;
				vertical-align: middle;
				cursor: pointer;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$('.close').click(function() {
					$('.ad').css('display', 'none');
				})
			})
		</script>

	</head>
	<body style="background:#eeeeee;">
		<div class="header">
			<div class="logo">
				<i class="fa fa-book"></i>
				<span>BOOKADDICTS</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
			<div class="dropdown">
			 <button class="dropbtn"><?php echo $login_user;?></button>
			 <div class="dropdown-content">
			   <a href="userprofile.php">Profile</a>
			   <a href="logout.php">Logout</a>

			 </div>
			</div>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-book"></i>
				<span>BOOKADDICTS</span>

			</div>
		<?php include("side.php");?>
		</div>
		<div class="main-content">
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
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav"<style="float:right;">
	                    <li>
	                        <a href="addproduct.php">Add a Product</a>
	                    </li>

	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
<div>

<table  class="table"  cellspacing="0" cellpadding="0">
<thead id="thl"><tr>
	<th style="font-weight:bold"><b>ProductID</b></th>
	    <th style="font-weight:bold;"><b>ProductName</b></th>
        <th style="font-weight:bold"><b>Description</b></th>
    	    <th style="font-weight:bold;"><b>stock</b></th>
            <th style="font-weight:bold"><b>Price</b></th>
        	    <th style="font-weight:bold;"><b>SubCategory</b></th>
	</tr></thead>
	<form id="delete_product" method="POST" action="deleteproduct.php">
	<tbody>
		<?php
		$sql="SELECT* from productinfo,subcategory where productinfo.SubcategoryID=subcategory.SubcategoryID";
		$r=mysqli_query($conn,$sql);
		while($field=mysqli_fetch_assoc($r))
		{
			$pid=$field["ProductID"];
			$pname=$field["ProductName"];
            $des=$field["Description"];
            $avail=$field["StockAvailability"];
            $price=$field["Price"];
			$sid=$field["SubcategoryID"];
            $sname=$field["Subcategory"];

			echo "<tr id='fontcus'>";
			echo "<td>".$pid."</td>";
			echo "<td>".$pname."</td>";
            echo "<td>".$des."</td>";
			echo "<td>".$avail."</td>";
            echo "<td>".$price."</td>";
			echo "<td>".$sname."</td>";


			 echo "<td>"."<a href='updateproduct.php?pid=".$pid."'>"."EDIT"."</a></td>";
			 echo "<td>"."<a href='takeorder.php?pid=".$pid."'>"."SELL"."</a></td>";
			 echo "<td>"."<input type='checkbox' name='PID' value='$pid'></input>"."</td>" ;

echo "</tr>";
		}
		?>
	</tbody>
</table>

<input type="submit" name="delete" value="delete" style="float:right;background:#fc464c;color:#67fc87;">
</form>

</div>

 <p style="font-size:20px;">***NOTE:To delete any Category , select corresponding checkbox and click the delete button</p>
		</div>
	</body>
</html>
