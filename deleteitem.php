<?php 
session_start();

// print_r($_SESSION['bahan_bakar_minyak'][0]). PHP_EOL;
// print_r();

unset($_SESSION['bahan_bakar_minyak'][$_GET['key']]);
header('Location: /pzn/bbmweb/bbm.php');

if(isset($_POST['delete'])){
    deleteAll();
}
function deleteAll(){
    unset($_SESSION['bahan_bakar_minyak']);
    header('Location: /pzn/bbmweb/bbm.php');
}
?>