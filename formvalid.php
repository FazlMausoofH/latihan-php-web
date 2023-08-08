<?php 

function formExecution(){
  session_start();

  if (!isset($_SESSION['form_sign_up'])) {
    $_SESSION['form_sign_up'] = array();
  }
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];
    $cardtype = $_POST['cardtype'];
    $cardnumber = $_POST['cardnumber'];
    $securitycode = $_POST['securitycode'];
    $nameoncard = $_POST['nameoncard'];

    // Menambahkan data ke dalam array menggunakan array_push()
    $order = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "phone" => $phone,
        "address" => $address,
        "postcode" => $postcode,
        "country" => $country,
        "cardtype" => $cardtype,
        "cardnumber" => $cardnumber,
        "securitycode" => $securitycode,
        "nameoncard" => $nameoncard,
    ];
    array_push($_SESSION['form_sign_up'], $order);
    header('Location: /pzn/bbmweb/login.php');
    exit();
}

?>