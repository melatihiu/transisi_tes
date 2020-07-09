<?php

    function enkripsi($pass){
        $abjad = range('A', 'Z');
        $enkripsi = [];
        $int = 0;

        for ($i=0; $i < strlen($pass); $i++) {
            $letak_abjad = array_search($pass[$i], $abjad);
            $int = $int + 1;
            if ($i%2 == 0){
                echo $abjad[$letak_abjad+$int];
            } else {
                echo $abjad[$letak_abjad-$int];
            }
        }
    }

    enkripsi('DFHKNQ');
?>