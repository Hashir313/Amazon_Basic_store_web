<?php
include ('db_connection.php');
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<table style="width: 800px; text-align:center">';
    echo "<tr><th>Id</th><th>Name</th><th>Description</th><th>Creation Time</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        // Format the creation time to display in desired format
        $creation_time = date('l, d-F, Y h:i A', strtotime($row['created_at']));
        echo '<tr> 
<td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['description'] . '</t
d><td>' . $creation_time . '</td></tr>';
    }
    echo "</table>";
} else {
    echo "No items found";
}
mysqli_close($conn);
?>