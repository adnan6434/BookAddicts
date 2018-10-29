<?php
	include("db.php");
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

<body>

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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="products.php">Products</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>

                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>





    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
					<?php
					$pid=$_GET["ProductID"];
					$sql="SELECT* FROM productinfo,categories,subcategory where ProductID=$pid and productinfo.SubcategoryID=subcategory.SubcategoryID AND subcategory.CategoryID=categories.CategoryID";
					$r=mysqli_query($conn,$sql);
					$field=mysqli_fetch_assoc($r);
					$pn=$field["ProductName"];
					$pc=$field["CategoryName"];
					$ps=$field["Subcategory"];
					$price=$field["Price"];
					$av=$field["StockAvailability"];
					$des=$field["Description"];
					$img=$field["imgurl"];
					$cid=$field["CategoryID"];
					$sid=$field["SubcategoryID"];
                    echo '<h2 class="intro-text text-center"><strong>'.$pn.'</strong></h2><hr></div>';

                echo'<div class="col-md-6">';
                echo'    <img class="img-responsive img-border-left" src="'.$img.'" alt=""></div>';


            echo  '<div class="col-md-4" id="pfont">';
                    echo"<p>Category: <a href="."'category.php?CategoryID=".$cid."'>".$pc."</a></td>";
					echo "<p>Subcategory: <a href="."'subcategory.php?SubcategoryID=".$sid."'>".$ps."</a></td>";
					if($av<10){
						echo'<p>Price :'.$price.'<div id="red"></div></p>';
					}
					else if($av>=10)
					{
						echo'<p>Price :'.$price.'<div id="green"></div></p>';
					}
					echo'<p>Availability :'.$av.' </p>';
                echo'</div><div class="col-md-6"><h3>Description</h3>
                    <p>'.$des.'</p></div>';
					?>
                <div class="clearfix"></div>
            </div>
        </div>
		<div class="row">
		    <div class="box">
		        <div class="col-lg-12">
		            <hr>
		            <h2 class="intro-text text-center"><strong>Pre Order</strong>
		                form
		            </h2>
		            <hr>
		            <p class="intro-text text-center">please Fill out the form to Reserve This Product. </p>
		            <form method="POST" action="preorder.php">
		                <div class="row">
		                    <div class="form-group col-lg-6">
		                        <label>Name</label>
		                        <input type="text" name="cname"  class="form-control">
		                    </div>

		                    <div class="form-group col-lg-6">
		                        <label>Phone Number</label>
		                        <input type="tel" name="contact" class="form-control">
		                    </div>
		                    <div class="clearfix"></div>

		                    <div class="form-group col-lg-6">
		                        <label>Quantity</label>
		                        <input type="text" name="quantity" class="form-control">
		                    </div>
		                    <div class="form-group col-lg-12">
		                        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
		                        <button type="submit" name="preorder" class="btn btn-default">Submit</button>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>

</div>

    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p id="foot">Copyright &copy; BookAddicts-2017 All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
