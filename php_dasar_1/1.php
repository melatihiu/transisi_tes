<?php

    $nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
    $pecah = explode(" ", $nilai);
        
        $total  = array_sum($pecah);
        $jumlah = count($pecah);
        $rata2  = $total / $jumlah;
            echo "Nilai rata - rata = " . round($rata2, 2) . "<br>";
            echo "Nilai tertinggi = " . max($pecah) . "<br>";;
            echo "Nilai terendah = " . min($pecah);
            
?>