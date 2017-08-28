<form method="POST" action="">
    <p>Please enter string:
        <input type = "text" name = "string">
    </p>
    <input type = "submit" value = "enter" name = "Submit">
</form>
<?php

    session_start();
    if (isset ($_POST[Submit])) {
        $string = $_POST[string];
        $count = strlen($string);
        anti_string($count, $string);
    }

    function anti_string($count, $string = [])
    {
        if ($count == 0) {
            return;
        } else {
            echo $string[$count-1];
            anti_string($count-1, $string);
        }
    }
?>
