<?php
session_start();
include '../../db/dbConnection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $appli_name = $_POST['appli_name'];
    $appli_description = $_POST['appli_description'];
    $id =$_SESSION['user_id'];
    

    // Prepare the SQL query to insert data into the `intern_appli_track` table
    $sql = "INSERT INTO `intern_appli_track` (`appli_name`, `appli_description`, `assigned_by`) 
            VALUES (?, ?, ?)";

    // Prepare and bind parameters to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $appli_name, $appli_description, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
    }

    // Close the connection
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>