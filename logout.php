<?php
require_once 'baseheaders.php';
require_once 'dblogin.php';
//session and access check
$sessionCheck=new sessioncheck();
$sessionCheck->contIfSessionOk();

destroy_session_and_data();

?>
<html>
<script> location = "index.php"; </script>

</html>

