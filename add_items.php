<?php
echo "Add Items Page";
include ('db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $Product_Name = $_POST['productName'];
    $Product_Description = $_POST['ProductDescription'];

    // Check if data is received properly
    echo "Product Name: $Product_Name, Description: $Product_Description";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO products (name, description, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $Product_Name, $Product_Description);
    if ($stmt->execute()) {
        echo "Item Added Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    mysqli_close($conn);
}
?>