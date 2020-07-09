<?php
    function cari($array, $huruf){
        $data_array[] = [];
        $cari_huruf = 0;
        
        foreach($array as $subArray){
            foreach($subArray as $val){
                array_push($data_array, $val);
            }
        }

        for ($h=0; $h < strlen($huruf); $h++) {
            $a = array_search($huruf[$h], $data_array);
            if ($a) {
                $cari_huruf = $cari_huruf + 1;
            }
        }

        if ($cari_huruf == strlen($huruf)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    $arr = [
        ['f', 'g', 'h', 'i'], 
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u']
    ];

    cari($arr, 'fjrstp');
?>