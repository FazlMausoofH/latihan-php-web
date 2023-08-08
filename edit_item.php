<?php
session_start();

$list = [
    "Pertamax" => 12500,
    "Pertalite" => 10000,
    "Dexalite" => 13000,
    "Solar" => 6000,
  ];

    $_SESSION['bahan_bakar_minyak'][$_GET['key']];
    $key  = $_GET['key'];
    if (strlen(isset($_POST["bbm"])) && strlen($_POST["pembelian"]) >= 4 && strlen($_POST["rupiah"]) >= 4 ) {
        $name = $_POST['bbm'];
        $pembelian = $_POST['pembelian'];
        $rupiah = $_POST['rupiah'];

        // math
        $liter = intval($pembelian) / $list[$_POST["bbm"]] . " Liter";
        $kembalian = "Rp. ". intval($rupiah) - intval($pembelian);
        $tanggal = date('l, d-m-Y');
        $trash = '<span class="hover:text-red-500"><i class="fa-solid fa-trash fa-xl"></i></span>';
        $pen = '<span class="hover:text-yellow-400"><i class="fa-solid fa-pen mr-2 fa-xl"></i></span>';

        // Periksa apakah indeks ada dalam PHP session
        if (isset($_SESSION['bahan_bakar_minyak'][$key])) {
            // Perbarui data sesuai dengan indeks yang dipilih
            $_SESSION['bahan_bakar_minyak'][$key]['nama'] = $name;
            $_SESSION['bahan_bakar_minyak'][$key]['liter'] = $liter;
            $_SESSION['bahan_bakar_minyak'][$key]['rupiah'] = $rupiah;
            $_SESSION['bahan_bakar_minyak'][$key]['pembelian'] = $pembelian;
            $_SESSION['bahan_bakar_minyak'][$key]['kembalian'] = $kembalian;
            $_SESSION['bahan_bakar_minyak'][$key]['tanggal'] = $tanggal;
            $_SESSION['bahan_bakar_minyak'][$key]['pen'] = $pen;
            $_SESSION['bahan_bakar_minyak'][$key]['trash'] = $trash;
            header('Location: /pzn/bbmweb/bbm.php');
            exit();
        }
    }
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
    
    <div class="flex justify-center">
        <div class="flex justify-center w-1/3 mt-36 bg-gray-400">
            <div class="w-full bg-white rounded-md shadow-lg p-5">
                <h2 class="flex justify-center text-4xl font-semibold mb-3">Edit Form BBM</h2>
                <div class="">
                <form action="" method="POST">
                    <label for="" class="text-xl font-semibold">Pilih BBM : </label><br />
                        <input type="radio" id="bbm" name="bbm" value="Pertamax" class="w-3 h-3" />
                        <label for="" class="font-semibold mr-4">
                            <span class="ml-2 text-lg">Pertamax</span></label
                        >
                        <input type="radio" id="bbm" name="bbm" value="Pertalite" class="w-3 h-3"/>
                        <label for="" class="font-semibold mr-4">
                            <span class="ml-2 text-lg">Pertalite</span></label
                        >
                        <input type="radio" id="bbm" name="bbm" value="Dexalite" class="w-3 h-3"/>
                        <label for="" class="font-semibold mr-4">
                            <span class="ml-2 text-lg">Dexalite</span></label
                        >
                        <input type="radio" id="bbm" name="bbm" value="Solar" class="w-3 h-3"/>
                        <label for="" class="font-semibold mr-4">
                            <span class="ml-2 text-lg">Solar</span></label
                        ><br>
                        <label for="" class="text-xl font-semibold mt-2">Nominal Pembelian :</label><br>
                        <input type="text" class="w-full h-10 ring-black ring-1 rounded-sm mt-1" name="pembelian"><br>
                        <label for="" class="text-xl font-semibold mt-2">Nominal Rupiah :</label><br>
                        <input type="text" class="w-full h-10 ring-black ring-1 rounded-sm mt-1 mb-1" name="rupiah"><br>
                        <div class="flex justify-end mt-4">
                            <a href="edit_item.php" 
                            class="bg-red-400 rounded-full text-white p-1 w-28 font-semibold hover:bg-red-500 ml-2"
                            > Cancel </a>
                            <button class="bg-sky-400 rounded-full text-white p-1 w-36 h-10 font-semibold hover:bg-sky-500"
                            type="submit">
                            Save
                            </button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>