<?php
require_once 'dblogin.php';
/*
*Class to create a form
*It takes the label, type, name, placeholder of each item in as an argument
*/
class form 
{
private $fields = array();
private $actionValue;
private $submit = "Submit Form";
private $Nfields=0;
	
	//Constructor that makes the submit button name and function
   function __construct($actionValue,$submit) 
	{
	   $this->actionValue=$actionValue;
	   $this->submit=$submit;	
	}
	
	//Fuction with a loop that creates a Form
	 function displayForm()
	{
	
		echo"\n<form method=\"post\" action=\"{$this->actionValue}\">\n";
		for($j=1;$j<=sizeof($this->fields);$j++)
		{
			echo  "<div style=\"float\" class=\"form-group col-xs-4\">\n";
			echo  "<label for=\"{$this->fields[$j-1]['label']}\">{$this->fields[$j-1]['label']}</label>\n";
			echo  "<input type=\"{$this->fields[$j-1]['type']}\" class=\"form-control\" name=\"{$this->fields[$j-1]['name']}\"></div>\n";
		}
		echo"<div><br><br><br><br><button type=\"submit\" style=\"float:left\" class=\"btn btn-primary\">{$this->submit}</button>\n</div>\n";
		echo"</form>";
	}
/* Function that adds a field to the form. The user needs to
* send the name of the field and a label to be displayed.
*/
	function addField($name,$label,$type)
	{
		$this->fields[$this->Nfields]['name'] = $name;
		$this->fields[$this->Nfields]['label'] = $label;
		$this->fields[$this->Nfields]['type'] = $type;
		$this->Nfields = $this->Nfields + 1;
	}
	
}
/*class To check if session is found or not*/
class sessioncheck{

private $session__status;
	
function __construct(){
if (session_status() == PHP_SESSION_NONE) 
{
session_start();
}
$this->session__status=isset($_SESSION['username']);
}
	function contIfSessionOk()
	{
		if(!($this->session__status))
		{
			
			die("	<script>var path= window.location.pathname.replace(/^.*[\\\/]/, '');if((path!=\"index.php\")){location = \"index.php\"}  </script>
	");
		}
	}
	function contIfSessionNotOk()
	{	
		if(($this->session__status))
		{
			die("<script>var path= window.location.pathname.replace(/^.*[\\\/]/, '');if((path!=\"index.php\")){location = \"index.php\"}  </script>
	");
		}
	
	}
function noAccess()
	{
		die("<script>var path= window.location.pathname.replace(/^.*[\\\/]/, '');if((path!=\"index.php\")){location = \"index.php\"}  </script>
	");
	}
}

/*Registeration function*/
class registration
{
	//variable to hold user info 
	private $user_info=array();
	private $connection;
	function __construct($__POST)
	{
		if(isset($_POST['email']))
		{
			//starting a db connection 
			$this->connection = new mysqli($GLOBALS['db_hostname'], $GLOBALS['db_username'], $GLOBALS['db_password'], $GLOBALS['db_database']);
			
		/*Needs to add condition if database connection fails!!!*/
			
			
//			Looping through the post, santinzing it and assining it to the users info 
//			Values created are fname lname email pwd1 pwd2 signup-code
			
			foreach($__POST as $label=> $value)
			{
				$this->user_info[$label]= mysql_entities_fix_string($this->connection, $value);
				//echo $label.": ".$value."<br>";
			}
		}
		
	}
	
	function check_if_username_exists($username)
	{
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = $this->connection->query($query);
		if($result)
		{
			return 1;echo "username ok";
		}
		else
		{
			return 0;
		}
	}
	function  password_check()
	{
		if($this->user_info['pwd1']==$this->user_info['pwd2'])
		{
			
			if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $this->user_info['pwd1']))
			{
    			return 1;
			}
			else 
		
			{
				return "Password is Weak" ;
			}
		}
		else return "Password Mismatch";
	}
	function add_user()
	{
		if(self::check_if_username_exists($this->user_info['email']))
		{
			if(self::password_check()==1)
		
			{
//				Sql Query
				$query = "INSERT INTO users (username, password, last_access, institcode, 
				first_name, last_name, date_of_birth) VALUES ('".
				($this->user_info['email']."','". $this->user_info['pwd1'].
				 "','". '' ."','". $this->user_info['inId']."','".
				 $this->user_info['fname']."','". $this->user_info['lname'].
				 "','". $this->user_info['dob']."')");
				
				
//			echo $query."<br>";
    			$result = $this->connection->query($query);
				if (!$result) 
				{
				echo ($this->connection->error);
				}
				else
				{
					
					$login=new Login($this->user_info['email'],
						$this->user_info['pwd1'],
						$this->user_info['inId']);
					echo "registered Succefully";
				}

				}
			else return self::password_check();
		
		}
		else
		{
			return"User Name is taken";
		}
		
		
	
	}
}
	/*
	*Login in function
	*/
	class Login
	{
	private $connection;
	private $user_info=array();
	private $query;
		//takes username password inId
		function __construct($username,$password,$inId)
		{
			$this->connection = new mysqli($GLOBALS['db_hostname'], $GLOBALS['db_username'], 
										   $GLOBALS['db_password'], $GLOBALS['db_database']);

			$this->user_info['email'] = mysql_entities_fix_string($this->connection, $username);
			$this->user_info['password']= mysql_entities_fix_string($this->connection, $password);
			$this->user_info['inId'] = mysql_entities_fix_string($this->connection, $inId);
			$this->query = "SELECT * FROM users WHERE username='$username'";
			
		}
		function Loginuser()
		{
			$result = $this->connection->query($this->query);
			if (!$result) return 0; 
  
				elseif ($result->num_rows)
				{
					$row = $result->fetch_array(MYSQLI_NUM);
					$result->close();
					if ($this->user_info['password'] == $row[2]&&$this->user_info['inId']==$row[4])
					{
						$_SESSION['username'] = $this->user_info['inId'];
						$_SESSION['password'] = $this->user_info['password'];
						$_SESSION['inId'] = $row[4];
						return 1;
					}else return 0;
				}	else return 0;
			}
		}

	

?>

