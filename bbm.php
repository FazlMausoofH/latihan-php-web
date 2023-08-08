<?php 
session_start();



if($_SESSION['login'] != true){
    header('Location: /pzn/bbmweb/login.php');
    exit();
}

$no = "";
$bbm = "";
$liter = "";
$rupiah = "";
$pembelian = "";
$kembalian = "";
$tanggal = "";
$pen = "";
$trash = "";

$fail = "";



$list = [
  "Pertamax" => 12500,
  "Pertalite" => 10000,
  "Dexalite" => 13000,
  "Solar" => 6000,
];

if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(strlen(isset($_POST["bbm"])) && strlen($_POST["pembelian"]) >= 4 && strlen($_POST["rupiah"]) >= 4 ){



  // Inisialisasi array untuk menyimpan data pemesanan tiket
  if (!isset($_SESSION['bahan_bakar_minyak'])) {
    $_SESSION['bahan_bakar_minyak'] = array();
  }
    // Mengambil data dari form
    $name = $_POST['bbm']; // output nama bbm
    $pembelian = $_POST['pembelian']; // output input nominal pembelian
    $rupiah = $_POST['rupiah']; // output input nominal rupiah

    // math
    $liter = intval($pembelian) / $list[$_POST["bbm"]] . " Liter";
    $kembalian = intval($rupiah) - intval($pembelian);
    $tanggal = date('l, d-m-Y');
    $trash = '<span class="hover:text-red-500"><i class="fa-solid fa-trash fa-xl"></i></span>';
    $pen = '<span class="hover:text-yellow-400"><i class="fa-solid fa-pen mr-2 fa-xl"></i></span>';

    // Menambahkan data pemesanan ke dalam array menggunakan array_push()
    $order = [
        "nama" => $name,
        "liter" => $liter,
        "rupiah" => "Rp. ".$rupiah,
        "pembelian" => "Rp. ". $pembelian,
        "kembalian" => "Rp. ". $kembalian,
        "tanggal" => $tanggal,
        "action" => [
          "pen" => $pen,
          "trash" => $trash
        ]
      ];
    array_push($_SESSION['bahan_bakar_minyak'], $order);
  };
    
  }

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smoot">
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/81c3fa1df4.js"
      crossorigin="anonymous"
    ></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style type="text/tailwindcss">
      @layer utilities {
        .form.active {
          @apply opacity-100;
        }
      }
    </style>
  </head>
  <body class="">
    <div class="flex justify-center h-screen bg-slate-800">
      <div class="bg-black w-1/5">
        <?php include_once "sidebar.php"; ?>
      </div>

      <div class="bg-slate-200 w-full ">
      <?php include_once "content.php"; ?>
      </div>
    </div>
    <script>
      let modal = document.getElementById("modal");
      let form = document.getElementById("form");
      modal.addEventListener("click", function () {
        form.classList.toggle("active");
      });
      function cancelAction() {
        // Tambahkan kode aksi batal jika diperlukan
      }

    </script>
  </body>
</html>
