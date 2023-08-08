<?php
include_once "form.php";

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
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

    </style>
  </head>
  <body class="">

  <div class="bg-slate-800 p-5 w-max">
    <div class="bg-white p-3 shadow-md">
    <h1 class="flex justify-center text-5xl text-black">Dashboard</h1>
    <div class="">
      <ul class="mt-2 flex justify-end">
        <li class="mb-5">
          <a
            href="bbm.php"
            class="text-center text-lg rounded-sm font-semibold text-black border-2 border-black hover:bg-black hover:text-white p-3 ml-3"
            ><i class="fa-solid fa-gas-pump mr-2"></i>BBM</a
          >
        </li>
      </ul>
    </div>
        <table class="w-full my-5 ">
          <tr>
            <td class="border-2 border-black">No</td>
            <td class="border-2 border-black">Nama</td>
            <td class="border-2 border-black">Email</td>
            <td class="border-2 border-black">Password</td>
            <td class="border-2 border-black">Phone</td>
            <td class="border-2 border-black">Address</td>
            <td class="border-2 border-black">Post Code</td>
            <td class="border-2 border-black">Country</td>
            <td class="border-2 border-black">Card Type</td>
            <td class="border-2 border-black">Card Number</td>
            <td class="border-2 border-black">Security Code</td>
            <td class="border-2 border-black">Name On Code</td>
          </tr>
      <?php 
        if (isset($_SESSION['form_sign_up']) && count($_SESSION['form_sign_up']) > 0) {
          echo "<h3>Data Form Registrasi :</h3>";
          $no = 1;
          foreach ($_SESSION['form_sign_up'] as $order) {
              echo "<tr>";
              echo "
              <td class='border-2 border-black'>".$no++."</td>
              <td class='border-2 border-black'>".$order['name']."</td>
              <td class='border-2 border-black'>".$order['email']."</td>
              <td class='border-2 border-black'>".$order['password']."</td>
              <td class='border-2 border-black'>".$order['phone']."</td>
              <td class='border-2 border-black'>".$order['address']."</td>
              <td class='border-2 border-black'>".$order['postcode']."</td>
              <td class='border-2 border-black'>".$order['country']."</td>
              <td class='border-2 border-black'>".$order['cardtype']."</td>
              <td class='border-2 border-black'>".$order['cardnumber']."</td>
              <td class='border-2 border-black'>".$order['securitycode']."</td>
              <td class='border-2 border-black'>".$order['nameoncard']."</td>
              ";
              echo "</tr>";
              //  session_destroy();
          }
        }     
      ?>
      </table>
    </div>
  </div>

  </body>
</html>
