<?php 
session_start();
include_once "formvalid.php";
$name = "";
$alertname = "";
$alertemail = "";
$alertpassword = "";
$alertphone = "";
$alertcardtype = "";
$alertcardnumber = "";



if($_SERVER["REQUEST_METHOD"] == "POST" ){
  if (strlen($_POST['name']) >= 10 ){
    if(strlen(isset($_POST["email"]))){ //remmake
      if(strlen($_POST['password']) >= 5){
        if(strlen($_POST['phone']) >= 11){
          if(strlen($_POST['address']) <= 500){
            if(isset($_POST['cardtype'])){
              if(strlen($_POST['cardnumber']) >= 7 ){
                //sukses
                echo '<script type ="text/JavaScript">';  
                echo 'alert("Kirim Data Sukses!")';  
                echo '</script>';
                formExecution();
               
              }else{
              $alertcardnumber = "Card Number Minimal 7 Digit";
              }
            }else{
            $alertcardtype = "Card Type Tidak Boleh Kosong";
            }
          }else{
            $alertaddress = "Address Max 500 Char";
          }
        }else{
          $alertphone = "Phone Minimal 11 Digit";
        }
      }else{
        $alertpassword = "Password Minimal 5 Digit";
      }
    }else{
      $alertemail = "Email Tidak Boleh Kosong";
    }
  }else{
    $alertname = "Nama Minimal 10 Digit";
  }
}else{
  
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form2</title>
  </head>
  <body class="bg-slate-800">
    <form action="" method="post">
    <div
      class="container max-w-lg mx-auto bg-white mt-5 p-5 rounded-lg font-mono"
    >
      <h2 class="text-xl text-black font-semibold mb-2">
        Step 1: Your details
      </h2>
      <div class="border-2 border-black bg-slate-300 p-2 rounded-md mb-1">
      <div
        class="flex w-full"
      >
        <label for="" class="font-semibold w-1/3">Name </label>
        <div class="flex justify-center w-full">
          <input
            type="text"
            placeholder="First and last name"
            class="h-7 w-4/5 rounded-sm"
            min="1"
            name="name"
          />
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertname?>
      </div>
      </div>

      <div class="border-2 border-black bg-slate-300 p-2 rounded-md mt-1">
      <div
        class=" flex  w-full"
      >
        <label for="" class="font-semibold w-1/3">Email </label>
        <div class="flex justify-center w-full">
          <input
            type="email"
            placeholder="example@gmail.com"
            class="h-7 w-4/5 rounded-sm"
            name="email"
          />
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertemail?>
      </div>
      </div>
      
      <div class="border-2 border-black bg-slate-300 p-2 rounded-md mt-1">
      <div
        class=" flex  w-full"
      >
        <label for="" class="font-semibold w-1/3">Password </label>
        <div class="flex justify-center w-full">
          <input
            type="password"
            placeholder="Masukan Password"
            class="h-7 w-4/5 rounded-sm"
            name="password"
          />
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertpassword?>
      </div>
      </div>
      <div class="border-2 border-black bg-slate-300 p-2 rounded-md mt-1">
      <div
        class=" flex  w-full "
      >
        <label for="" class="font-semibold w-1/3">Phone </label>
        <div class="flex justify-center w-full">
          <input type="number" placeholder="+62 829136138" class="h-7 w-4/5 rounded-sm" name="phone"/>
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertphone ?>
      </div>
      </div>

      <h2 class="text-xl text-black font-semibold mt-3 mb-2">
        Step 2: Delivery addres
      </h2>
      <div
        class="border-2 border-black bg-slate-300 p-2 rounded-md flex  w-full mb-1"
      >
        <label for="" class="font-semibold w-1/3">Address</label>
        <div class="flex justify-center w-full">
          <textarea
          id=""
          cols="22"
          rows="4"
          class="resize-none w-4/5 rounded-sm"
          name="address"
          ></textarea>
        </div>
      </div>
      <div
        class="border-2 border-black bg-slate-300 p-2 rounded-md flex  w-full"
      >
        <label for="" class="font-semibold w-1/3">Post code </label>
        <div class="flex justify-center w-full">
          <input type="number" placeholder="" class="h-7 w-4/5 rounded-sm" name="postcode" />
        </div>
      </div>
      <div
        class="border-2 border-black bg-slate-300 p-2 rounded-md flex  w-full mt-1"
      >
        <label for="" class="font-semibold w-1/3">Country </label>
        <div class="flex justify-center w-full">
          <input type="text" placeholder="" class="h-7 w-4/5 rounded-sm" name="country" />
        </div>
      </div>

      <h2 class="text-xl text-black font-semibold mt-3 mb-2">
        Step 2: Delivery addres
      </h2>

      <div class="border-2 border-black bg-slate-300 p-2 rounded-md mb-1">
      <div class="">
        <div class="font-semibold">Card type</div>
        <div class="ml-8">
          <input type="radio" id="cardtype" name="cardtype" value="visa" />
          <label for="visa" class="font-semibold mr-4"
            ><i class="fa-brands fa-cc-visa"></i
            ><span class="ml-2">VISA</span></label
          >
          <input type="radio" id="cardtype" name="cardtype" value="amex" />
          <label for="amex" class="font-semibold mr-4"
            ><i class="fa-brands fa-cc-mastercard"></i
            ><span class="ml-2">AmEx</span></label
          >
          <input type="radio" id="cardtype" name="cardtype" value="mastercard" />
          <label for="mastercard" class="font-semibold"
            ><i class="fa-brands fa-cc-mastercard"></i
            ><span class="ml-2">Mastercard</span></label
          >
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertcardtype ?>
      </div>
      </div>

      <div class="border-2 border-black bg-slate-300 p-2 rounded-md">
      <div
        class=" flex  w-full"
      >
        <label for="" class="font-semibold w-1/3">card number </label>
        <div class="flex justify-center w-full">
          <input type="number" placeholder="" class="h-7 w-4/5 rounded-sm" name="cardnumber"/>
        </div>
      </div>
      <div class="flex justify-center text-red-500">
        <?= $alertcardnumber ?>
      </div>
      </div>
      <div
        class="border-2 border-black bg-slate-300 p-2 rounded-md flex  w-full mt-1"
      >
        <label for="" class="font-semibold w-2/5">security code </label>
        <div class="flex justify-center w-full">
          <input type="number" placeholder="" class="h-7 w-5/6 mr-4 rounded-sm" name="securitycode" />
        </div>
      </div>
      <div
        class="border-2 border-black bg-slate-300 p-2 rounded-md flex  w-full mt-1"
      >
        <label for="" class="font-semibold w-1/3">name on card </label>
        <div class="flex justify-center w-full">
          <input type="text" placeholder="" class="h-7 w-4/5 rounded-sm" name="nameoncard"/>
        </div>
      </div>

      <div class="flex justify-center">
        <button
        type="submit"
          class="mt-4 font-semibold text-xl bg-sky-400 hover:bg-sky-500 text-white rounded-3xl p-2 w-1/3 font-mono"
          name="submit"
        >
          Konfirmasi
        </button>
      </div>
      <div class="flex justify-center mt-3 ">
        <label for="" class="font-semibold cursor-pointer hover:scale-105"><a href="login.php"><span class="">Already have an account?</span><span class="text-red-500"> Sign in</span></a></label>
      </div>
    </div>
    </form>
  </body>
</html>
