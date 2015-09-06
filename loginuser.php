<?php
echo $_POST['uPwd'];
if (isset($_POST['uEmail'])&&isset($_POST['uPwd']))
{
    echo $_POST['uEmail'];
    $_SERVER['PHP_AUTH_USER'] =$_POST['uEmail'];
    $_SERVER['PHP_AUTH_PW']=$_POST['uPwd'];
}
?>