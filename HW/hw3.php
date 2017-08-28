<form method="POST" action="">
    <p>Please enter n:
        <input type = "text" name = "n" size = "1">
    </p>
    <p>Please enter k:
        <input type = "text" name = "k" size = "1">
    </p>
    <input type = "submit" value = "enter" name = "Submit">
</form>
<?php

    session_start();
    if (isset ($_POST[Submit])) {
        $all_light[]  = "";
        $number_n     = $_POST[n];
        $number_k     = $_POST[k];
        $light_number = range(1, $number_n);
        foreach ($light_number as $key => $value) {
            $all_light[$key] = "off";
        }
        for ($i = 1; $i <= $number_k ; $i++) {
            for ($j = $i; $j <= $number_n; $j += $i) {
                $count = $j-1;
                if ($all_light[$count] == "on") {
                    $all_light[$count] = "off";
                } else {
                    $all_light[$count] = "on";
                }
            }
        }
        foreach ($all_light as $key => $value) {
            $key++;
            echo $key." is turn ".$value.'<br>';
        }
    }
?>
