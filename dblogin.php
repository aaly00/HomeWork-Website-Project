<?php
$db_hostname='localhost';
$db_database='hwsite';
$db_username='root';
$db_password='';

function mysql_entities_fix_string($connection, $string)
{
return htmlentities(mysql_fix_string($connection, $string));
}
function mysql_fix_string($connection, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $connection->real_escape_string($string);
}
function destroy_session_and_data()
{
if (session_status() == PHP_SESSION_NONE) 
{
session_start();
}
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
}
?>

