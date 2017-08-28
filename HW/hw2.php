<form method="POST" action="">
    <p>guess number:
        <input type = "text" name = "guess" size = "4">
        <input type = "submit" value = "enter" name = "Submit">
    </p> 
</form>     
<?php

    session_start();
    $number_a = 0;
    $number_b = 0;
    $number_answer = "1234";
    $guess  = $_POST[guess];
    if (isset ($_POST[Submit]) ) {
        for ($i = 0; $i <= 3; $i++) {
            if ($number_answer[$i] == $guess[$i])
                $number_a ++;
            for ($j = 0; $j <= 3; $j++) {
                if ($number_answer[$i] == $guess[$j] && $i != $j)
                    $number_b ++;
            }
        }
        if ($number_a != 4) {
            $_SESSION[total] = $_SESSION[total].$guess.":".$number_a."A".$number_b."B<br>";
            echo $_SESSION[total];
        } else {
            echo "Right number ! Answer is:".$number_answer;
            session_destroy();
        }
    }
?>
