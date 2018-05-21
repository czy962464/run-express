<?php
session_start();
$_SESSION=array();

setcookie('PHPSESSID','',time()-3600,'/');
session_destroy();
echo '<script>location="login.php"</script>';
?>