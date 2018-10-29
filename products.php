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
        <div class ="box">
                <div class="col-lg-12 text-center">

    <form class="horizontal" method="post" action="#">
        <input id="key"  type="text" placeholder="Enter keywords......."/>
        <select id="sub">
        <option>--Select Category--</option>
        <option value="SB">Educational Books</option>
        <option value="HB">HSC Books</option>
        <option value="UB">University Books</option>
        <option value="SB">StoryBooks</option>

</select>
<select id="subca">
    <option>--Select SubCategory--</option>
    <option>Accounting and Banking</option>
    <option>Airlines/Hotel Management</option>
    <option>Bank/Insurance/Leasing </option>
    <option>Commercial/Procurement</option>
    <option>Consultancy & Research </option>

</select>
<button class="large" type="Submit"><i class="fa fa-search"></i>Search</button>
    </form>
 </div>
 </div>
 </div>
 </div>

     <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12" >


                    <table class="table"  cellspacing="0" cellpadding="0">
<thead id="theads"><tr>
    <th style="font-weight:bold;"><b>ProductName</b></th>
    <th style="font-weight:bold"><b>Category</b></th>
    <th style="font-weight:bold"><b>SubCategory</b></th>
</tr></thead>
<tbody>
<?php
$sql="SELECT * FROM productinfo,categories,subcategory WHERE productinfo.SubcategoryID=subcategory.SubcategoryID AND subcategory.CategoryID=categories.CategoryID" ;
$r=mysqli_query($conn,$sql);
while($field=mysqli_fetch_assoc($r))
{ $pname=$field["ProductName"];
  $cname=$field['CategoryName'];
  $sname=$field['Subcategory'];
  $pid=$field['ProductID'];
   $cid=$field['CategoryID'];
    $sid=$field['SubcategoryID'];
  echo "<tr>";
  echo "<td><a href="."'product.php?ProductID=".$pid."'>".$pname."</a></td>";
 echo "<td><a href="."'category.php?CategoryID=".$cid."'>".$cname."</a></td>";
echo "<td><a href="."'subcategory.php?SubcategoryID=".$sid."'>".$sname."</a></td>";
  echo"</tr>";
  }
?>

</tbody></table>


                </div>


                <div class="clearfix"></div>
            </div>
        </div>
</div>
    <!-- /.container -->

    <footer id="cd">
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
</html>
