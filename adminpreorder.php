<?php
session_start();
//author:ADNAN TAUFIQUE
	include("db.php");?>
	<?php
$x="";
$current='preorder';
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

<div>

<table  class="table"  cellspacing="0" cellpadding="0">
<thead id="thl"><tr>
	<th style="font-weight:bold"><b>PreorderID</b></th>
	<th style="font-weight:bold;"><b>Customer Name</b></th>
    <th style="font-weight:bold"><b>ProductName</b></th>
	<th style="font-weight:bold;"><b>Quantity</b></th>
    <th style="font-weight:bold;"><b>ContactNO</b></th>
	<th style="font-weight:bold;"><b>OrderTime</b></th>
	</tr></thead>

	<tbody>
		<?php
		$sql="SELECT* from preorder,productinfo WHERE preorder.ProductID=productinfo.ProductID";
		$r=mysqli_query($conn,$sql);
		while($field=mysqli_fetch_assoc($r))
		{
			$preid=$field["PreorderID"];

			$cname=$field["Name"];
			$pname=$field["ProductName"];
            $quan=$field["Quantity"];
            $con=$field["ContactNO"];
			$time=$field["time"];

			echo "<tr>";
            echo "<td>".$preid."</td>";
            echo "<td>".$cname."</td>";
			echo "<td>".$pname."</td>";
			echo "<td>".$quan."</td>";
			echo "<td>".$con."</td>";
			echo "<td>".$time."</td>";


echo "</tr>";
		}
		?>
	</tbody>
</table>



</div>


		</div>
	</body>
</html>
