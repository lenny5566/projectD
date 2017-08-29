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
    $guess  = $_POST['guess'];
    if (!isset ($_SESSION['rand_number']) ) {
        $_SESSION['rand_number'] = rand_number();
    }
    
    if (isset ($_POST['Submit']) ) {
        if ($_POST['guess'] == "" || strlen($_POST['guess']) > 4) {
            echo "Please enter right numbers";
        } else {
            $number_answer = $_SESSION['rand_number'];
            echo "The answer:".$number_answer.'<br>';
            for ($i = 0; $i <= 3; $i++) {
                if ($number_answer[$i] == $guess[$i])
                    $number_a ++;
                for ($j = 0; $j <= 3; $j++) {
                    if ($number_answer[$i] == $guess[$j] && $i != $j)
                        $number_b ++;
                }
            }
            if ($number_a != 4) {
                $_SESSION['total'] = $_SESSION['total'].$guess.":".$number_a."A".$number_b."B<br>";
                echo $_SESSION['total'];
            } else {
                echo "Right number ! Answer is:".$number_answer;
                session_destroy();
            }
        }
    }
    
    function rand_number()
    {
        $answer  = "";
        for ($i = 1; $i <= 4; $i++) {
            $num = rand(0,9);
            for ($j = 1; $j <= $i; $j++) {
                if($num == $a[$j]) {
                    $num = rand(0,9);
                    $j   = 0;
                }
            }
            $a[$i] = $num;
        }
        arsort($a);
        foreach ($a as $value) {
            $answer .= $value;
        }
        return $answer;
    }
?>
