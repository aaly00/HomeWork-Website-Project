<?php
require_once 'dblogin.php';
require_once 'baseheaders.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    if (isset($_POST['uEmail']) && isset($_POST['uPwd'])&&isset($_POST['inId']))
    {
			$login = new Login($_POST['uEmail'],$_POST['uPwd'],$_POST['inId']);
		if($login->Loginuser()==1)
		{}
    
	}else{}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HomeWork Websites</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <!-- jQuery -->
    <script src="js/jquery.js"></script>
</head>

<body>

   <?php
//Including the navbar
	include("navbar.html");
	?>

    <!-- Page Content -->
    <div  class="container">

     <?php
 //<!-- Jumbotron Header -->
echo"<header class=\"jumbotron hero-spacer\">";
      if (isset($_SESSION['username']) && isset($_SESSION['password'])&&isset($_SESSION['inId']))
    {

echo<<<_end
 <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
              <h3>Fast Links</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
<div style"float:center">
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    
                    <div class="caption">
                        <h3>Your Assigned Homeworks</h3>
                        <p>
                            <a href="#" class="btn btn-primary">Homeworks</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                  
                    <div class="caption">
                        <h3>Account Settings<br><br></h3>
                        <p>
                            <a href="#" class="btn btn-primary">Settings</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                   
                    <div class="caption">
                        <h3>Account Dashboard</h3>
                        <p>
                            <a href="#" class="btn btn-primary">Dashboard</a> 
                        </p>

             </div>
_end;
}
else
{
	echo "<h1>Login</h1>\n";
	echo"<div ><p>Use your Email and password along with your institutional code to login. </p><ul style=\"color:#c02929\" class=\"alert alert-error nav \" id=\"message\"></ul></div>\n";
	$login_form=new form("index.php","Login");
	$login_form->addField("uEmail","Email","email");	
	$login_form->addField("inId","Instituition ID","text");	
	$login_form->addField("uPwd","Password","Password");
	$login_form->displayForm();
    }
$connection->close();
  echo "</header>";
        
?>
			
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
              <h3>Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Button</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Button</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Button</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; HW Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
	

<?php 
//printing a message if login is incorrect
if (isset($_POST['uEmail']) && isset($_POST['uPwd'])&&isset($_POST['inId'])){
$login = new Login($_POST['uEmail'],$_POST['uPwd'],$_POST['inId']);
		if($login->Loginuser()==1)
		{}else
echo "<script type=\"text/javascript\">
$(document).ready(function() {
$(\"#message\").append(\"<li>Incorrect Username/Password/ Instituition ID Combination</li>\");
});</script>";
}?>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
