<?php

    function tabelAngka(){
        $tabel = '<table width="350px" cellspacing="0">';
        $angka = [];
        $int = 0;
        $tabel .= '<tr>';

            for ($i=1; $i <= 64; $i++) { 
                $int++;
                $angka = $int;
                if ($i%3 == 0 || $i%4 == 0) {
                    $tabel .= '<td align="center" style="background-color: white; height: 25px;">';
                    $tabel .= $angka;
                } else {
                    $tabel .= '<td align="center" style="background-color: black; color:white; height: 25px;">';
                    $tabel .= $angka;
                }
                if ($i%8 == 0) {
                    $tabel .= '</td></tr>';
                }
            }

        $tabel .= '</table>';

        return $tabel;
    }
    
    echo tabelAngka();
?>