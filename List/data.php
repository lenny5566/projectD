<?php

require ("config.php");

if (isset ($_POST['select']) && isset ($_POST['string']) ) {
    $choose = $_POST['select'];
    $string = $_POST['string'];
    if ($choose == "1") {
        $sql="SELECT * FROM list ORDER BY id ASC";
        $result = mysqli_query($db_link, $sql);
        print_table($result);
    } elseif ($choose == "gender") {
        $sql = "SELECT * FROM list WHERE gender='$string'";
        $result = mysqli_query($db_link, $sql);
        print_table($result);
    } else {
        $sql = "SELECT * FROM list WHERE $choose LIKE '%$string%'";
        $result = mysqli_query($db_link, $sql);
        print_table($result);
    }
    mysqli_close($db_link);
}

function print_table($result)
{
    $num = 1;
    echo "<table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>E-mail</th>
            <th>Edit/Delete</th>
        </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $num . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["birthday"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td> <button> <a href='edit.php?id=".$row["id"]."'> Edit </a> </button>";
        echo "&nbsp";
        echo "<button> <a href='delete.php?id=".$row["id"]."'> Delete </a> </button> </td>";
        echo "</tr>";
        
        $num++;
    }
    echo "</table>";
}
