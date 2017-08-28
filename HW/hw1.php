<?php

    $num_1 = 101;
    $count_1 = 1;
    for ($count_2 = 0; $count_2 <= 4; $count_2++) {
        $num_2 = $num_1;
        for ($count_3 = 1; $count_3 <= $count_1; $count_3++) {
            echo $num_2.'&nbsp&nbsp';
            $num_2 += 10;
        }
        $num_1   -= 7;
        $count_1 += 2;
        echo '<br>';
    }
