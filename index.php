<?php
include 'db.php';

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

$sql = "SELECT * FROM `user`";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                  echo "<th>issd</th>";
                    echo "<th>idsss</th>";
                      echo "<th>idsss</th>";

            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
                echo "<td>" . $row['Role'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
}
mysqli_close($link);
?>
