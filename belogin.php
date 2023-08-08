<?php
session_start();

$alertpas = "";
$alertname= "";

// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     if(strlen($_POST["username"]) >= 3 ){
//         if(strlen($_POST["password"]) >= 5 ){
//             $_SESSION['login'] = true;
//             header('Location: /pzn/bbmweb/bbm.php');
//             exit();
//         }else{
//             $alertpas = "Masukan Password min 5 digit";
//         }
//     }else{
//         $alertname = "Masukan Username min 3 digit";
//     }
// } else {

// }

if (isset($_SESSION['tmpnama'])) {
    $tmpnama = $_SESSION['tmpnama'];
   }
if (isset($_SESSION['tmpalamat'])) {
    $tmpalamat = $_SESSION['tmpalamat'];
    }

    $tmpnama[] = $_POST['nama'];
    $tmpalamat[] = $_POST['alamat'];

    $_SESSION['tmpnama'] = $tmpnama;
    $_SESSION['tmpalamat'] = $tmpalamat;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/81c3fa1df4.js"
      crossorigin="anonymous"
    ></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-slate-800">
    <form action="" method="POST">
    <div class="container max-w-md mx-auto mt-40 bg-white rounded-2xl shadow-xl">
        <div class="p-6 mx-auto">
            <h1 class="font-semibold text-5xl text-black flex justify-center">Log in</h1>
            <div class="mt-3">
                <label for="" class="font-semibold">Username : </label><br>
                <input type="text" placeholder="Masukan Username" class="rounded-sm w-full h-10 ring-2 ring-black mt-1 p-2 mb-2" name="username" required>
                <label for="" class="text-red-500"><?= $alertname ?></label>
                <br>
                <label for="" class="font-semibold">Password : </label><br>
                <input type="text" placeholder="Masukan Username" class="rounded-sm w-full h-10 ring-2 ring-black mt-1 p-2 mb-2" name="password" required>
                <label for="" class="text-red-500"><?= $alertpas ?></label>
                <button type="submit" class="mt-6 rounded-sm w-full text-white p-4 bg-sky-400 hover:bg-sky-500">Log in</button>
                <a href="form.php" class="flex justify-center text-slate-500 mt-4 font-semibold hover:text-slate-800">or,sign up</a>
            </div>
        </div>
    </div>
    </form>
    <table>
      <tr>
        <td>Nama</td>
        <td>Pass</td>
      </tr>
      <?php 
   // Ambil data dari session
   if (isset($_SESSION['tmpnama'])) {
    $tmpnama = $_SESSION['tmpnama'];
   }
   if (isset($_SESSION['tmpalamat'])) {
    $tmpalamat = $_SESSION['tmpalamat'];
   }
   // End script ambil data

   // Cetak dengan cara uraikan isi arraynya
   for ($i=0; $i < count($tmpnama); $i++) {
    echo "<tr>";
    echo "<td>".$tmpnama[$i]."</td><td>".$tmpalamat[$i]."</td></tr>";
   }
   // End script urai array
   //session_destroy();
?>
    </table>
</body>
</html>