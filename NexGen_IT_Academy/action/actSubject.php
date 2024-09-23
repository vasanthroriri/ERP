<?php
session_start();
include("../../db/dbConnection.php");
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Check if the form has been submitted
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addSubject') {
    // Retrieve form data
    $sub_name = $_POST['sub_name'];
    $sub_duration = $_POST['sub_duration'] ?? '';
    // SQL query to insert data
    $query = "INSERT INTO subject_tbl (subject_name, duration) 
              VALUES ('$sub_name','$sub_duration')";  
    $res = mysqli_query($conn, $query);
    
    // Check query result and set response message
    if ($res) {
        $_SESSION['message'] = "Subject details added successfully!";
        $response['success'] = true;
        $response['message'] = "Subject details added successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in adding Subject details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    // Return response as JSON
    echo json_encode($response);
    exit();
}
// Handle updating Task details
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'hdnEditSubject') {
    $editid = $_POST['editId'];
    $editSub_name = $_POST['editsub_name'];
    $editSub_duration = $_POST['edit_duration'];

    $editQuery1 = " UPDATE subject_tbl SET 
        subject_tbl.duration = '$editSub_duration',
        subject_tbl.subject_name = '$editSub_name'
    WHERE id = '$editid'";
    
    $editRes = mysqli_query($conn, $editQuery1);

    $response = [];
    if ($editRes) {
        $_SESSION['message'] = "Subject details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Subject details updated successfully!";
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
    $fetchId = $_POST['editId'];
   $selQuery = "SELECT subject_tbl.*
      FROM subject_tbl
      WHERE id= $fetchId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        $subjectDetails = array(
            'sub_id'=>$row['id'],
            'edit_duration' => $row['duration'],
            'editsub_name' => $row['subject_name'],
        );
        $aa = json_encode($subjectDetails);
        echo  $aa ;
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}
// Handle deleting a Task
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `subject_tbl` 
    SET status = 'Inactive'
    WHERE id = $id;";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Subject details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Subject details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Topic details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}
$id = $_POST['id'];
$section = $_POST['section'];

// Update the section based on the provided section value
$sql = "UPDATE syllabus SET section = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $section, $id);

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
