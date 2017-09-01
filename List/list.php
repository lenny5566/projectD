<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>List</title>
<?php require("script_css.php") ?>
</head>
<body>
    <h1>Contact List</h1>
    <h2>List View</h2>
    <hr>
    <div>
        <h2>Search:
        <form action="" method="post" id="search"> 
            <select name = "select" id="select">
                <option value = "1">All</option>
                <option value = "name">Name</option>
                <option value = "gender">Gender</option>
                <option value = "phone">Phone</option>
                <option value = "birthday">Birthday</option>
                <option value = "address">Address</option>
                <option value = "email">E-mail</option>
            </select>
            <input name="string" type="text" value="">
            <input type="submit" value="Search">
        </form>
        </h2>
    </div>
    
    <?php
    
    require ("config.php");
    if (isset ($_POST['select']) && isset ($_POST['string']) ) {
        $choose = $_POST['select'];
        $string = $_POST['string'];
        if ($choose == "1") {
            $sql="SELECT * FROM list ORDER BY id ASC";
            $result = mysqli_query($db_link, $sql);
            print_table($result);
        } else {
            $sql = "SELECT * FROM list WHERE '$choose'='$string'";
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
            if ($row["gender"] == 0) {
                echo "<td> Female </td>";
            } else {
                echo "<td> Male </td>";
            }
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
    ?>

    <hr>
    <div style="text-align:center;">
        <button>
            <a href="add.php">Add Record</a>
        </button>
    </div>
</body>
</html>
