<?php 

function editExecution(){
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
}

?>