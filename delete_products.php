<?php
include ('db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $product_Id = $_POST['productId'];
    // Check if the product ID exists
    $check_sql = "SELECT * FROM products WHERE id = '$product_Id'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        // Product exists, proceed with deletion
        $delete_sql = "DELETE FROM products WHERE id = '$product_Id'";
        $delete_result = mysqli_query($conn, $delete_sql);
        if ($delete_result) {
            $response = array(
                'success' => true,
                'message' => 'Item Deleted 
Successfully'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error deleting 
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