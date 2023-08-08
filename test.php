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
    $trash = '<span class="hover:text-yellow-400"><i class="fa-solid fa-trash fa-xl"></i></span>';
    $pen = '<span class="hover:text-red-500"><i class="fa-solid fa-pen mr-2 fa-xl"></i></span>';

    // Menambahkan data pemesanan ke dalam array menggunakan array_push()
    $order = [
        "no" => 1,
        "nama" => $name,
        "liter" => $liter,
        "rupiah" => $rupiah,
        "pembelian" => $pembelian,
        "kembalian" => $kembalian,
        "tanggal" => $tanggal,
        "action" => [
          "pen" => $pen,
          "trash" => $trash
        ]
      ];
    array_push($_SESSION['bahan_bakar_minyak'], $order);
  };
    
  } else {
    // gagal
    $fail = "Isi Semua Form Pembelian";
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
        <div class="text-white text-4xl font-semibold p-2">
          <label
            for=""
            class="flex justify-center bg-white text-black rounded-sm shadow-md"
            >BBM</label
          >
        </div>

        <ul class="mt-2">
          <li class="mb-5">
            <a
              href="dashboard.php"
              class="w-full text-center text-lg rounded-sm font-semibold text-white border-2 border-white p-2 hover:bg-white hover:text-black"
              ><i class="fa-solid fa-house mr-2"></i>Dashboard
            </a>
          </li>
          <li class="mb-5">
            <a
              href="bbm.php"
              class="text-center text-lg rounded-sm font-semibold text-white border-2 border-white p-2 hover:bg-white hover:text-black"
              ><i class="fa-solid fa-gas-pump mr-2"></i>BBM</a
            >
          </li>
        </ul>
      </div>

      <div class="bg-slate-200 w-full ">
        <div class="bg-slate-700">
          <span class="flex justify-end text-3xl p-3">
            <a href="form.php">
            <i class="fa-solid fa-user text-white hover:scale-125 hover:delay-150 mt-1 mr-2"></i>
            </a>
            <a href="logout.php">
              <i class="fa-solid fa-right-from-bracket text-white hover:scale-125 hover:delay-150 mx-2 "></i>
            </a>
        </span>
        </div>
        <div class="p-4">
          <label class="text-3xl font-semibold mr-2">Bahan Bakar Minyak</label>
          <hr />
          <div class="flex justify-between">
            <label for="" class="text-xl font-semibold text-slate-500"
            >Welcome Fazl</label
            >
            <label class="text-3xl font-semibold mr-2 text-red-500"><?= $fail ?></label>
        </div>
        </div>
        <div class="p-6">
          <div class="bg-white p-3">
            <div class="flex justify-between mb-2">
              <label for="" class="text-2xl font-semibold">Details</label>
              <button
                id="modal"
                class="bg-slate-500 rounded-full text-white p-1 w-36 h-10 font-semibold hover:bg-slate-700"
              >
                <i class="fa-solid fa-plus fa-lg"></i>Tambah
              </button>

              <form
                action=""
                method="post"
                class="form absolute opacity-0 right-64"
                id="form"
              >
                <div class="bg-slate-200 w-full shadow-xl rounded-sm p-3">
                  <div class="flex justify-center mb-2">
                    <label for="" class="text-2xl font-semibold"
                      ><i class="fa-solid fa-gas-pump mr-1"></i>Pembelian
                      BBM</label
                    >
                  </div>
                  <label for="" class="font-semibold">Pilih BBM : </label><br />
                  <input type="radio" id="bbm" name="bbm" value="Pertamax" />
                  <label for="" class="font-semibold mr-4">
                    <span class="ml-2">Pertamax</span></label
                  >
                  <input type="radio" id="bbm" name="bbm" value="Pertalite" />
                  <label for="" class="font-semibold mr-4">
                    <span class="ml-2">Pertalite</span></label
                  >
                  <input type="radio" id="bbm" name="bbm" value="Dexalite" />
                  <label for="" class="font-semibold mr-4">
                    <span class="ml-2">Dexalite</span></label
                  >
                  <input type="radio" id="bbm" name="bbm" value="Solar" />
                  <label for="" class="font-semibold mr-4">
                    <span class="ml-2">Solar</span></label
                  >

                  <br />
                  <label for="" class="font-semibold"
                    >Nominal Pembelian : </label
                  ><br />
                  <input
                    type="number"
                    min="0"
                    placeholder="Masukan Nominal Pembelian"
                    class="rounded-sm w-full h-10 ring-2 ring-black mt-1 p-2 mb-2"
                    name="pembelian"
                  />
                  <label for="" class="font-semibold">Nominal Rupiah : </label
                  ><br />
                  <input
                    type="number"
                    placeholder="Masukan Nominal Rupiah"
                    class="rounded-sm w-full h-10 ring-2 ring-black mt-1 p-2 mb-2"
                    name="rupiah"
                  />
                  <br />
                  <div class="flex justify-end mt-2">
                    <button
                      class="bg-red-400 rounded-full text-white p-1 w-28 font-semibold hover:bg-red-500"
                    >
                      Batal
                    </button>
                    <button
                    name="beli"
                      class="bg-sky-400 rounded-full text-white p-1 w-28 font-semibold hover:bg-sky-500 ml-2"
                    >
                      Beli
                    </button>
                  </div>
                </div>
              </form>











            </div>
            <table class="table-auto w-full mt-5">
              <thead>
                <tr>
                  <th class="border-2 border-black">No</th>
                  <th class="border-2 border-black">Nama BBM</th>
                  <th class="border-2 border-black">Jumlah Liter</th>
                  <th class="border-2 border-black">Rupiah</th>
                  <th class="border-2 border-black">Pembelian</th>
                  <th class="border-2 border-black">Kembalian</th>
                  <th class="border-2 border-black">Tanggal</th>
                  <th class="border-2 border-black">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $x=1;
                $i=-1;
                  if (isset($_SESSION['bahan_bakar_minyak']) && count($_SESSION['bahan_bakar_minyak']) > 0) {
                    foreach ($_SESSION['bahan_bakar_minyak'] as $order) {
                        echo "<tr>";
                        echo "<td class='border-2 border-black'>" . $x++ . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['nama'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['liter'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['rupiah'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['pembelian'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['kembalian'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['tanggal'] . "</td>";
                        echo 
                        "<td class='border-2 border-black'>" . 
                        "<a href=''>" . $order['action']['pen'] . "</a>" .  
                        "<a href='deleteitem.php?no=" . ++$i . "'>" . $order['action']['trash'] . "</a>" . 
                        "</td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script>
      let modal = document.getElementById("modal");
      let form = document.getElementById("form");
      modal.addEventListener("click", function () {
        form.classList.toggle("active");
      });
    </script>
  </body>
</html>
