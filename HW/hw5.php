<form method="POST" action="">
    <p>Please enter number:
        <input type = "text" name = "number">
    </p>
    <input type = "submit" value = "enter" name = "Submit">
</form>
<?php
    header("Content-Type:text/html; charset=utf-8");
    session_start();
    if (isset ($_POST[Submit])) {
        $number = $_POST[number];
        $array[$number][$number] = "0";
        $key = 1;
        $i = 0; //i,j are coordinates
        $j = ($number-1)/2;
        $array[0][$j] = $key;
        while ($key < $number * $number) {
            $key++;
            if ($i-1 < 0) {
                $i = $number-1;
            } else {
                $i = $i-1;
            }
            
            if ($j-1 < 0) {
                $j = $number-1;
            } else {
                $j = $j-1;
            }
            
            if ($array[$i][$j] == 0) {
                $array[$i][$j] = $key;
            } elseif ($array[$i][$j] != 0) {
                if ($i+2 > $number-1) {
                    $i = $i+2-$number;
                }
                else {
                    $i = $i+2;
                }
                if ($j+1 > $number-1) {
                    $j=0;
                } else {
                    $j = $j+1;
                }
                $array[$i][$j] = $key;
            }
        }
    }
    print_array($array, $number);
    
    function print_array($array, $number) 
    {
        echo "┌─";
        for ($i = 0; $i < $number-1; $i++) {
            echo "┬─";
        }
        echo "┐<br>";
        for ($i = 0; $i < $number; $i++) {
            echo "│";
            $count = $number;
            for ($j = 0; $j < $number; $j++) {
                $count = $count-1;
                if ($array[$i][$j]!=0) {
                    echo $array[$i][$count]."│";
                } else {
                    echo "&nbsp│";
                }
            }
            echo "<br>";
            if ($i < $number-1) {
                echo "├─";
                for ($j = 0; $j < $number-1; $j++) {
                    echo "┼─";
                }
                echo "┤<br>";
            }
        }
        echo "└─";
        for ($i = 0; $i < $number-1; $i++) {
            echo "┴─";
        }
        echo "┘<br>";
    }
?>
