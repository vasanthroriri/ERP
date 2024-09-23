<?php
// include("C:\\xampp\\htdocs\\RORIRI_ERP\\db\\dbConnection.php");
include("../../db/dbConnection.php");
header('Content-Type: application/json');
include "../class.php";

$response = ['success' => false, 'message' => ''];

if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addDepartment') {
    $dept_id = $_POST['dept_id'];
    $departmentName = $_POST['dept_name'];
    $newCoordinatorIds = $_POST['coordinatorName']; // Selected coordinators (new and old)
    $description = htmlspecialchars($_POST['description']); // This contains the TinyMCE HTML content

    $id = $_SESSION['id'];

    // Fetch the existing coordinators from the database
    $existingQuery = "SELECT `log` FROM `coordinator` WHERE `id` = '$dept_id' AND `status` = 'Active'";
    $existingResult = $conn->query($existingQuery);
    $existingCoordinators = [];

    if ($existingResult && $existingResult->num_rows > 0) {
        $row = $existingResult->fetch_assoc();
        $coordinatorsLog = json_decode($row['log'], true); // Decode the current coordinators log into an array

        // Filter the coordinators to include only those with status = 'active'
        foreach ($coordinatorsLog as $coordinator) {
            if ($coordinator['status'] === 'active') {
                $existingCoordinators[] = $coordinator;
            }
        }
    }
    // Array to hold the updated list of coordinators
    $updatedCoordinators = [];

    // Process existing coordinators
    foreach ($existingCoordinators as $coordinator) {
        // If the existing coordinator is no longer in the selected list, mark them as inactive and set change_time
        if (!in_array($coordinator['id'], $newCoordinatorIds)) {
            $coordinator['change_time'] = date('Y-m-d H:i:s');  // Set change time for the replaced coordinator
            $coordinator['status'] = 'inactive';  // Mark as inactive
        }
        // Keep the coordinator if it's unchanged (no need to modify)
        $updatedCoordinators[] = $coordinator;
    }

    
    // Process new coordinators (those not already in the existing list)
    foreach ($newCoordinatorIds as $newCoordinatorId) {
        // Check if the new coordinator ID is already present in the existing coordinators
        $isExisting = false;
        foreach ($existingCoordinators as $existingCoordinator) {
            if ($existingCoordinator['id'] == $newCoordinatorId) {
                $isExisting = true;
                break;
            }
        }

        // If the coordinator is new, add it to the updated coordinators list with assign_time
        if (!$isExisting) {
            $newCoordinator = [
                'id' => $newCoordinatorId,
                'assign_time' => date('Y-m-d H:i:s'),  // Set assign time for the new coordinator
                'change_time' => null,  // No change time for new coordinators
                'status' => 'active',  // Mark as active
                'alter_by' => $id  // User who made the change
            ];
            $updatedCoordinators[] = $newCoordinator;
        }
    }

    // Convert the updated coordinators list to JSON format
    $updatedCoordinatorsJson = json_encode($updatedCoordinators);

    // Update the log in the database with the new coordinator list
    $updateQuery = "UPDATE `coordinator` 
                    SET `log` = '$updatedCoordinatorsJson',
                    `roles_res` = '$description'
                    WHERE `id` = '$dept_id'";

    if ($conn->query($updateQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Coordinator details updated successfully!";
    } else {
        $response['message'] = "Unexpected error in updating Coordinator details! " . $conn->error;
    }

    // Return the response
    echo json_encode($response);
    exit();
}






    // Edit data and load coordinator name
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'getDepartmentDetails') {

    $dept_id = $_POST['dept_id'];

    // Query to get the department and coordinator details
    $query = "SELECT `log`, `roles_res` FROM `coordinator` WHERE `id` = '$dept_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the log data and roles_res
        $row = $result->fetch_assoc();
        $log = json_decode($row['log'], true); // Decode the JSON log data
        $roles_res = $row['roles_res']; // Fetch the roles_res data

        // Prepare response with the details
        $response = [
            'success' => true,
            'coordinator' => $log,        // Log details as JSON array
            'roles_res' => $roles_res     // Add roles_res to the response
        ];
    } else {
        $response = [
            'success' => false,
            'message' => "No coordinator details found for this department!"
        ];
    }

    echo json_encode($response);
    exit();
}


if (isset($_POST['viewId']) && $_POST['viewId'] != '') {

    $dept_id = $_POST['viewId'];

    // Query to get the department and coordinator details
    $queryView = "SELECT `name`, `log`, `roles_res` FROM `coordinator` WHERE `id` = '$dept_id'";
    $resultView = $conn->query($queryView);

    if ($resultView->num_rows > 0) {
        // Fetch the log data and roles_res
        $row = $resultView->fetch_assoc();
        $name = $row['name'];
        $log = json_decode($row['log'], true); // Decode the JSON log data
        $roles_res = $row['roles_res']; // Fetch the roles_res data

        // Initialize an empty string to hold active coordinator IDs
        $idString = '';

        // Check if the log is a valid array and contains coordinators
        if (is_array($log)) {
            // Filter coordinators with 'status' == 'active'
            $activeCoordinators = array_filter($log, function($coordinator) {
                return isset($coordinator['status']) && $coordinator['status'] === 'active';
            });

            // Extract the IDs of active coordinators
            $coordinatorIds = array_column($activeCoordinators, 'id');
            
            // Convert the IDs array to a comma-separated string
            if (!empty($coordinatorIds)) {
                $idString = implode(', ', $coordinatorIds);
            }
        }

        // Prepare response with the details
        $response = [
            'success' => true,
            'dept' => $name,
            'coordinator' => userNameOnly($idString),        // Log details as JSON array
            'roles_res' => $roles_res     // Add roles_res to the response
        ];
    } else {
        $response = [
            'success' => false,
            'message' => "No coordinator details found for this department!"
        ];
    }

    echo json_encode($response);
    exit();
}


