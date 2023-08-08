<?php 
session_start();
$_SESSION['login'] = false;
header('Location: /pzn/bbmweb/login.php')

?>