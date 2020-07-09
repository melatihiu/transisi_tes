<?php

    function nGram($kalimat){
        for ($h=1; $h < 4; $h++) {
            if ($h == 1){
                $data = str_replace(" ", ",", $kalimat);
                echo 'Unigram : ' . strtolower($data) . '<br>'; 
            } elseif ($h == 2){
                echo 'Bigram : ';
                $spasi = [];
                $int = 0;
                for ($i=0; $i < strlen($kalimat); $i++) {
                    if ($kalimat[$i] == ' ') {
                        $int++;
                        $spasi = $int;
                        
                        if ($spasi%2 == 0) {
                            echo ', ';
                        } else {
                            echo ' ';
                        }
                    } else {
                        echo strtolower($kalimat[$i]);
                    }
                }
                echo "<br>";
            } else {
                echo 'Trigram : ';
                $spasi = [];
                $int = 0;
                for ($i=0; $i < strlen($kalimat); $i++) {
                    if ($kalimat[$i] == ' ') {
                        $int++;
                        $spasi = $int;
                        
                        if ($spasi%3 == 0) {
                            echo ', ';
                        } else {
                            echo ' ';
                        }
                    } else {
                        echo strtolower($kalimat[$i]);
                    }
                }
                echo "<br>";
            }
        }
    }

    nGram('Jakarta adalah ibukota negara Republik Indonesia');
?>