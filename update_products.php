<?php
include ('db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $product_Id = $_POST['productId'];
    $Product_Name = $_POST['productName'];
    $Product_Description = $_POST['ProductDescription'];
    // Check if the product ID exists
    $check_sql = "SELECT * FROM products WHERE id = '$product_Id'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        // Product exists, proceed with the update
        $update_sql = "UPDATE products SET name ='$Product_Name', description =
'$Product_Description' WHERE id = '$product_Id'";
        $update_result = mysqli_query($conn, $update_sql);
        if ($update_result) {
            $response = array(
                'success' => true,
                'message' => 'Item Updated 
Successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error updating 
item: ' . mysqli_error($conn)
            );
        }
    } else {
        // Product does not exist
        $response = array(
            'success' => false,
            'message' => 'Product does not 
exist'
        );
    }
    echo json_encode($response);
    mysqli_close($conn);
}
?>