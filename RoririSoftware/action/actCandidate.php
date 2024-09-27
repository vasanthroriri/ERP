<?php
session_start();
// include("C:\\xampp\\htdocs\\RORIRI_ERP\\db\\dbConnection.php");
include("../../db/dbConnection.php");
include("../../url.php");  
include("../../assets/function/function.php");
include "function.php";

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Add Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addCandidate') {


     // Get form data
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $mode = $_POST['mode'];
     $gender = $_POST['gender'];
     $join_date = $_POST['joiningDate'];
     $address = $_POST['address'];
     $course_id = $_POST['course'];
     $duration = $_POST['fullDuration'];
     $fees = $_POST['fees'];
     $username = $_POST['username'];
     $password = $_POST['password'];

     // Initialize file paths
     $aadharPath = $panPath = $bankPath = '';
     $aname = $pname = $bname = '';
 
     // Handle Aadhar file upload
     if (!empty($_FILES['image']['tmp_name'])) {
         $aadharFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
         $aname = $username . "_." . $aadharFileType;
         $aadharPath = $internImage . $aname;
 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $aadharPath)) {
             // $response['message'] = "Aadhar uploaded successfully!";
         } else {
             $response['message'] = "Failed to upload Aadhar. Path: $aadharPath";
         }
     }

   

    // Proceed with the database query if image upload was successful or not required
    $insQuery = "INSERT INTO `internship_tbl`
        (`name`
        , `phone`
        , `email`
        , `mode`
        , `gender`
        , `joining_date`
        , `address`
        , `image`
        , `inte_cou_id`
        , `duration`
        , `payment`
        , `username`
        , `password`) 
        VALUES 
        ('$name'
        , '$phone'
        , '$email'
        , '$mode'
        , '$gender'
        , '$join_date'
        , '$address'
        , '$aname'
        , '$course_id'
        , '$duration'
        , '$fees'
        , '$username'
        , '$password')";

    // Execute the query and send the appropriate response
    if ($conn->query($insQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Candidate details added successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error adding candidate details: " . $conn->error;
    }

    // Send the response back as JSON
    echo json_encode($response);
    exit();
}




// Edit Employee
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'EditCandidate') {
    // Get form data
    $id = $_POST['EditId']; // Assuming you have the employee ID to update
    $name = $_POST['nameEdit'];
    $phone = $_POST['phoneEdit'];    
    $email = $_POST['emailEdit'];
    $modeEdit = $_POST['modeEdit'];
    $gender = $_POST['genderEdit'];
    $join_date = $_POST['joiningDateEdit'];
    $address = $_POST['addressEdit'];
    $course_id = $_POST['courseEdit'];
    $duration = $_POST['fullDuration'];
    $fees = $_POST['feesEdit'];
    $usernameEdit = $_POST['usernameEdit'];
    $password = $_POST['passwordEdit'];

    // Initialize file path and existing image variable
    $aadharPath = '';
    $existingImage = ''; // Variable to store the existing image path


    // Handle Aadhar file upload if a new file is uploaded
    if (!empty($_FILES['imageEdit']['tmp_name'])) {
        $aadharFileType = strtolower(pathinfo($_FILES['imageEdit']['name'], PATHINFO_EXTENSION));
        $aname = $usernameEdit . "_." . $aadharFileType;
        $aadharPath = $internImage . $aname;

        // Move uploaded file and check for success
        if (move_uploaded_file($_FILES['imageEdit']['tmp_name'], $aadharPath)) {
            // If the upload was successful, set the new image name
            $aadharPath = $aname; 
        } else {
            $response['message'] = "Failed to upload Image. Path: $aadharPath";
            echo json_encode($response);
            exit();
        }
    } else {
        // If no new image is uploaded, keep the existing image path
        $aadharPath = $existingImage; 
    }

    // Prepare the update query
    // Only update the image field if a new image was uploaded
    $updQuery = "UPDATE `internship_tbl` SET 
        `name` = '$name', 
        `phone` = '$phone', 
        `email` = '$email', 
        `mode` = '$modeEdit', 
        `gender` = '$gender', 
        `joining_date` = '$join_date', 
        `address` = '$address', 
        `inte_cou_id` = '$course_id', 
        `duration` = '$duration', 
        `payment` = '$fees', 
        `password` = '$password' 
        WHERE intern_id = '$id'";

    // Check if a new image was uploaded, if so include it in the update
    if (!empty($_FILES['imageEdit']['tmp_name'])) {
        $updQuery = "UPDATE `internship_tbl` SET 
            `name` = '$name', 
            `phone` = '$phone', 
            `email` = '$email', 
            `mode` = '$modeEdit', 
            `gender` = '$gender', 
            `joining_date` = '$join_date', 
            `address` = '$address', 
            `image` = '$aname', 
            `inte_cou_id` = '$course_id', 
            `duration` = '$duration', 
            `payment` = '$fees', 
            `password` = '$password' 
            WHERE intern_id = '$id'";
    }

    // Execute the query and send the appropriate response
    if ($conn->query($updQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Candidate details updated successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating candidate details: " . $conn->error;
    }

    // Send the response back as JSON
    echo json_encode($response);
    exit();
}



//Handles Fetching the Clients details for editing 
if (isset($_POST['editIdClient']) && $_POST['editIdClient'] != '') {
    $editId = $_POST['editIdClient'];

    $clientFetch="SELECT * FROM internship_tbl WHERE intern_id='$editId'";
    $fetchResult = mysqli_query($conn, $clientFetch);
    
    if ($fetchResult) {

        $row = mysqli_fetch_assoc($fetchResult);

        // Assume you fetched the duration from the database
    $fullDuration = $row['duration']; // Example value from the database

// Split the duration into number and unit
    list($durationNo, $durationUnit) = explode(" ", $fullDuration, 2);
        
        $clientDetails = array(
            'id' => $row['intern_id'],
            'name' => $row['name'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'mode' => $row['mode'],
            'gender' => $row['gender'],
            'join_date' => $row['joining_date'],
            'address' => $row['address'],
            // 'image' => $row['image'],
            'course_id' => $row['inte_cou_id'],
            'durationNO' => $durationNo,
            'duration' => $durationUnit,
            'fees' => $row['payment'],
            'username' => $row['username'],
            'password' => $row['password'],


            
            

        );
        echo json_encode($clientDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}
//Handles Deleting the client

if (isset($_POST['clientdeleteId'])) {
    $id = $_POST['clientdeleteId'];
    $queryDel = "UPDATE `internship_tbl` SET status ='Inactive'
    WHERE intern_id='$id'";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Condidate details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Condidate details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Employee details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}



// Handles Fetching the Clients details for View page 
if (isset($_POST['viewIdClient']) && $_POST['viewIdClient'] != '') {
    $editId = $_POST['viewIdClient'];

    // Fetch client details with course name
    $clientFetch = "SELECT a.*, b.intern_course_name 
                    FROM internship_tbl as a 
                    LEFT JOIN inter_course_tbl as b 
                    ON a.inte_cou_id = b.inte_cou_id 
                    WHERE intern_id='$editId'";
    $fetchResult = mysqli_query($conn, $clientFetch);
    
    if ($fetchResult) {
        $row = mysqli_fetch_assoc($fetchResult);

        // Split the duration into number and unit
        $fullDuration = $row['duration']; 
        list($durationNo, $durationUnit) = explode(" ", $fullDuration, 2);

        // Fetch the payment details (sum of amount and balance, status, and amount status)
        $paymentFetch = "SELECT SUM(inter_amount) AS totalAmount, 
                                tranx_id,
                                received_date,
                                received_by, 
                                pay_mode,
                                inter_paym_id 
                         FROM intern_payment 
                         WHERE intern_id='$editId'";
        $paymentResult = mysqli_query($conn, $paymentFetch);

        if ($paymentResult) {
            $paymentRow = mysqli_fetch_assoc($paymentResult);
            
            // Prepare the response data with both client and payment details
            $clientDetails = array(
                'id' => $row['intern_id'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'mode' => $row['mode'],
                'gender' => $row['gender'],
                'join_date' => $row['joining_date'],
                'address' => $row['address'],
                'image' => $row['image'],
                'course_id' => $row['intern_course_name'],
                'durationNO' => $durationNo,
                'duration' => $durationUnit,
                'fees' => $row['payment'],
                'username' => $row['username'],
                'password' => $row['password'],
                
                // Payment details
                'totalAmount' => $paymentRow['totalAmount'],
                'tranx_id' => $paymentRow['tranx_id'],
                'received_date' => $paymentRow['received_date'],
                'received_by' => $paymentRow['received_by'],
                'pay_mode' => $paymentRow['pay_mode'],
                'inter_paym_id' => $paymentRow['inter_paym_id']
            );

            echo json_encode($clientDetails);
        } else {
            $response['message'] = "Error fetching payment details: " . mysqli_error($conn);
            echo json_encode($response);
        }
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}


//Handles Add the payment details 
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'TraineePayment') {
    $intern_id = $_POST['TraineePay'];
    $amount = $_POST['balance'];
     $date = $_POST['date'];
    $payMode = $_POST['payMode'];
    $receivedBy = $_SESSION['id'];
    $transId = $_POST['trans'];
    // $entity = 3; // or assign the correct entity ID

    $insertPayment = "INSERT INTO `intern_payment`
    ( `intern_id`
    , `inter_amount`
    , `tranx_id`
    , `received_date`
    , `pay_mode`
    , `received_by`) 
     VALUES 
     ('$intern_id'
     ,'$amount'
     ,'$transId'
     ,'$date'
     ,'$payMode'
     ,'$receivedBy')";

    // Log the query
    error_log($insertPayment);

    if ($conn->query($insertPayment) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Payment details added successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Unexpected error in adding Payment details! " . $conn->error;
    }
    echo json_encode($response);
    exit();
}


// payment table data -----------------
if (isset($_POST['internId'])) {
    $internId = $_POST['internId'];

    // Query to fetch payment details for the intern
    $query = "SELECT 
                inter_paym_id,
                intern_id,
                received_date,
                inter_amount,
                received_by,
                pay_mode
              FROM intern_payment 
              WHERE intern_id = '$internId'
              ORDER BY received_date DESC";

    $result = mysqli_query($conn, $query);

    $payments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Format the date and amount
        $row['formatted_date'] = date('d-M-Y', strtotime($row['received_date']));
        $row['formatted_amount'] = number_format($row['inter_amount'], 2, '.', ',');
        $row['received_by'] = userName($row['received_by']); // Assuming userName() is a helper function
        
        $payments[] = $row;
    }

    echo json_encode($payments); // Send the JSON response back to the client
}