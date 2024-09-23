<?php
session_start();
include("../../db/dbConnection.php");
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Check if the form has been submitted
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addApplication') {
    // Retrieve form data
    $application_name = htmlspecialchars($_POST['application_name']);
    $application_duration = htmlspecialchars($_POST['application_duration']);
    $application_discription = htmlspecialchars($_POST['application_discription']);
    // SQL query to insert data
    $query = "INSERT INTO application_tbl (application_name,application_duration,application_discription) 
              VALUES ('$application_name','$application_duration','$application_discription')";  
    $res = mysqli_query($conn, $query);
    
    // Check query result and set response message
    if ($res) {
        $_SESSION['message'] = "Application added successfully!";
        $response['success'] = true;
        $response['message'] = "Application added successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in adding Application!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    // Return response as JSON
    echo json_encode($response);
    exit();
}
// Handle updating Task details
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'hdnEditAssignApplication') {
    
    $editId = $_POST['editId'];
    $editapplication_name = htmlspecialchars($_POST['edit_application_name']);
    $editapplication_duration = htmlspecialchars($_POST['edit_application_duration']);
    $editapplication_description = htmlspecialchars($_POST['edit_application_discription']);

    $editQuery1 = "UPDATE application_tbl SET 
        application_name = '$editapplication_name',
        application_duration = '$editapplication_duration',
        application_discription = '$editapplication_description'
    WHERE 
        application_id = '$editId';
    ";
    
    $editRes = mysqli_query($conn, $editQuery1);

    if ($editRes) {
        $_SESSION['message'] = "Application details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Application details updated successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    
    echo json_encode($response);
    exit();
}


// ajax edit course
// Handle fetching Tak details for editing
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $fetchId = mysqli_real_escape_string($conn, $_POST['editId']);

    $selQuery = "SELECT * FROM application_tbl WHERE application_id = $fetchId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $studentDetails = array(
            'application_id' => $row['application_id'],
            'application_name' => $row['application_name'],
            'application_duration' => $row['application_duration'],
            'application_discription' => $row['application_discription']
        );

        echo json_encode($studentDetails);
    } else {
        $response = array('message' => "Error executing query: " . mysqli_error($conn));
        echo json_encode($response);
    }
    exit();
}

// Handle deleting a Task
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `application_tbl` 
    SET application_status = 'Inactive'
    WHERE application_id = $id;";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Application details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Application details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Application details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}

?>