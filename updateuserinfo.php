<?php
session_start();
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
			if(isset($_GET['uid']))
			{
			$uid=$_GET['uid'];
			$sql="SELECT * from userinfo where userID=$uid";

			$r=mysqli_query($conn,$sql);
			$field=mysqli_fetch_assoc($r);
            $uname=$field["UserName"];
            $fname=$field["FirstName"];
            $lname=$field["LastName"];
            $cn=$field["ContactNo"];
            $pwd=$field["Password"];
			}
            if(isset($_POST['userupdate']))
            {

    				$id=mysqli_real_escape_string($conn,$_POST['id']);
                	$firstname=mysqli_real_escape_string($conn,$_POST['first_name']);
                	$lastname=mysqli_real_escape_string($conn,$_POST['last_name']);
                	$username=mysqli_real_escape_string($conn,$_POST['username']);

                	$contactno=mysqli_real_escape_string($conn,$_POST['contactno']);
                	$password=mysqli_real_escape_string($conn,$_POST['password']);


                	$sql = "UPDATE `userinfo` SET `FirstName` = '$firstname', `LastName` = '$lastname', UserName='$username',
    				 Password='$password', ContactNo='$contactno' WHERE `userID`=$id";
                        if(!mysqli_query($conn,$sql))
                            {
                                echo'Error: '.mysqli_error($conn);
                            }
                            else
                            {
                                header('Location:userprofile.php');
                                exit();
                            }
                }

                ?>
            <form id="add_form" method="POST" action="updateuserinfo.php">
            	<fieldset>
            	<legend>Edit UserInfo</legend>
            	<p>All fields are required</p>
            	<?php if(isset($_GET['error'])): ?>
            				<div class="error"><?php echo $_GET['error'];?></div>
            			<?php endif;?>
						<input id="id"  name="id" type="hidden" required="true"
			 value="<?php echo $uid;?>" />
             <p>
                  <label for="first_name">First Name</label>
                  <input id="first_name"  name="first_name" type="text" value="<?php echo $fname;?>"required="true" />
              </p>
              <p>
                  <label for="last_name">Last Name</label>
                  <input id="last_name"  name="last_name" type="text" value="<?php echo $lname;?>" required="true"/>
              </p>

              <p>
                  <label for="username">UserName</label>
                  <input id="Username"  name="username" type="text" value="<?php echo $uname;?>" required="true"/>
              </p>
              <p>
                  <label for="password">Password</label>
                  <input id="password"  name="password" type="password" value="<?php echo $pwd;?>" required="true" />

              </p>
              <p>
                  <label for="contactno">ContactNo</label>
                  <input id="contactno"  name="contactno" type="text"value="<?php echo $cn;?>"  required="true" />

              </p>




            <p>
            	<input type="submit" value="update" name="userupdate">
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
