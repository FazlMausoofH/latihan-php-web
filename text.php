<?php
    $nama = array(
        "1"=>"1",
        2=>"Ratna",
        3=>"Sukma",
        4=>"Anton",
        5=>"Sari");
        
    foreach ($nama as $kunci =>$isi) {
        echo "Urutan ke-".($kunci +1) ."adalah $isi";
        echo "<br />";
    }
?>