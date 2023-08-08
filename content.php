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
        </div>
        </div>
        <div class="p-6">
          <div class="bg-white p-3">
            <label for="" class="text-3xl font-semibold">Details</label>
            <div class="flex justify-end mb-2">
              <button
                id="modal"
                class=" bg-slate-500 rounded-full text-white p-1 w-36 h-10 font-semibold hover:bg-slate-700"
              >
                <i class="fa-solid fa-plus fa-lg"></i>Tambah
              </button>
              <form action="deleteitem.php" method="post">
                <button
                name="delete"
                  class="bg-slate-500 rounded-full text-white p-1 w-36 h-10 font-semibold hover:bg-red-600 ml-3"
                  >
                  <i class="fa-solid fa-trash fa-lg mr-1"></i>Delete All
                </button>
              </form>
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
                    <a href="bbm.php" 
                    class="bg-red-400 rounded-full text-white p-1 w-28 font-semibold hover:bg-red-500 ml-2"
                    > Cancel </a>
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
            <table class="table-auto w-full mt-5 p-2">
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
                  $no = 1;
                  if (isset($_SESSION['bahan_bakar_minyak']) && count($_SESSION['bahan_bakar_minyak']) > 0) {
                    foreach ($_SESSION['bahan_bakar_minyak'] as $key => $order) {
                        echo "<tr>";
                        echo "<td class='border-2 border-black'>" . $no++ . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['nama'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['liter'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['rupiah'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['pembelian'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['kembalian'] . "</td>";
                        echo "<td class='border-2 border-black'>" . $order['tanggal'] . "</td>";
                        echo 
                        "<td class='border-2 border-black'>" . 
                        "<a href='edit_item.php?key=" . $key . "'>" . $order['action']['pen'] . "</a>" .  
                        "<a href='deleteitem.php?key=" . $key . "'>" . $order['action']['trash'] . "</a>" . 
                        "</td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>