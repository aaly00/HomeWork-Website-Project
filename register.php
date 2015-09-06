<!DOCTYPE html>
<?php
require_once 'baseheaders.php';
require_once 'dblogin.php';
//session and access check

	

    if (isset($_POST['fname']) && isset($_POST['lname'])
		&&isset($_POST['email'])&&isset($_POST['pwd1'])
	   &&isset($_POST['pwd2'])&&isset($_POST['signup-code']))
    {/*
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

     $fname_temp = mysql_entities_fix_string($connection, $_POST['fname']);
	 $lname_temp = mysql_entities_fix_string($connection, $_POST['lname']);
	 $un_temp = mysql_entities_fix_string($connection, $_POST['email']);
	 $pw_temp = mysql_entities_fix_string($connection, $_POST['pw1']);
     $pw2_temp = mysql_entities_fix_string($connection, $_POST['pw2']);
     $inId_temp = mysql_entities_fix_string($connection, $_POST['inId']);
	 $sCode_temp = mysql_entities_fix_string($connection, $_POST['signup-code']);
	
	$query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);
    if ($result != $un_temp)
	{
		
		
	}else 
	{
	//JS JQuery Code goes here
	}
*/
		$new_user= new registration($_POST);
		$new_user->add_user();
	}
$sessionCheck=new sessioncheck();
$sessionCheck->contIfSessionNotOk();

?>
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
    <link href="css/datepicker.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
    .formregister{ }    
</style>
</head>

<body>

  
   <?php
//Including the navbar
	include("navbar.html");
	?>


    <!-- Page Content -->
    <div  class="container">

        <!-- Jumbotron Header -->

        <header class="jumbotron hero-spacer">
			<h1>Register</h1>
	<p>Fill in the form to register.<br>All Fields are Mandatory</p>
                   </header>

        
<form class="" method="post" action=register.php> 
 <div class="form-group col-xs-4" style="">
    <label for="pwd">First Name:</label>
    <input type="text" class="form-control" id="fname"name='fname'>
  </div>
 <div class="form-group col-xs-4" style="float">
    <label for="pwd">Last Name:</label>
    <input type="text" class="form-control" id="lname" name='lname'>
  </div>
 <div class="form-group col-xs-4" style="">
    <div class="row">
		<label for="pwd">Date Of Birth:</label>
            <div class="form-group">
                <div    class='input-group date ' id='datetimepicker1'>

                    <input type='text' class="datepicker form-control" name="dob" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
		</div>
				</div>

 <div class="form-group col-xs-4" >

    <label for="email">Email address:</label>
    <input type="email" class="form-control form-group " id="email" name="email">
  </div>
 <div class="form-group col-xs-4" >
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd1" name="pwd1">
  </div>
 <div class="form-group col-xs-4" >
    <label for="pwd">Password again:</label>
    <input type="password" class="form-control" id="pwd2" name="pwd2">
  </div>
 <div class="form-group col-xs-4" >
    <label for="pwd">Signup Code:</label>
    <input type="text" class="form-control" id="signup-code" name="signup-code">
  </div>		
 <div class="form-group col-xs-4" >
    <label for="pwd">Instituition ID</label>
    <input type="text" class="form-control" id="inId" name="inId">
  </div>		
 <div class="form-group col-xs-4">
    <label for="pwd">Captcha: to be added later with JS & Ajax</label>
  </div>		
  
		<button  type="submit" style="float:left" class="btn btn-primary">submit</button>
    
    </div>
			</form>

		   <hr>

    
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	 <!-- Bootstrap Date time picker -->
	<script src="js/bootstrap-datepicker.js"></script>
       

<script type='text/javascript'>
$(window).load(function(){
$('.datepicker').datepicker();
});

</script>
 
</body>

</html>
