<?php
session_start();
include "../../db/dbConnection.php"; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you have a database connection in $conn
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Create the SQL query
    $sql = "SELECT * FROM `internship_tbl` WHERE `username` = '$username' AND `password` = '$password' AND `status` = 'Active'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if ($result && mysqli_num_rows($result) > 0) {
        // User found, fetch user data
        $user = mysqli_fetch_assoc($result);
        // Set session variables or return a success response
        $_SESSION['user_id'] = $user['intern_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['intern'] = 'True';
        
        echo json_encode(['success' => true, 'message' => 'Login successful.']);
    } else {
        // Invalid credentials
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }

    // Close the result set
    mysqli_free_result($result);
}
?>
