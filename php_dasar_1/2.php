<?php

    function jumlahHurufKecil($kata){
        $huruf_kecil = [];

            for ($i=0; $i < strlen($kata); $i++) {
                if (ctype_lower($kata[$i])) {
                    $huruf_kecil[$i] = $kata[$i];
                } 
            }
                
            echo "“" . $kata . "”" . " mengandung ". count($huruf_kecil) ." buah huruf kecil.";
    }

    jumlahHurufKecil("TranSISI");
    
?>