
<?php
// include("C:\\xampp\\htdocs\\RORIRI_ERP\\db\\dbConnection.php");
include("../../db/dbConnection.php");
include("../../url.php");  
include("../../assets/function/function.php");
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if (isset($_POST['course_name']) && $_POST['course_name'] != '') {
    
    // Get form data
    $course_name = $_POST['course_name'];
   

    // Initialize file paths
    $aadharPath =  '';
    $aname =  '';

    // Handle Aadhar file upload
    if (!empty($_FILES['course_logo']['tmp_name'])) {
        $aadharFileType = strtolower(pathinfo($_FILES['course_logo']['name'], PATHINFO_EXTENSION));
        $aname = $course_name . "_." . $aadharFileType;
        $aadharPath = $internCourse . $aname;

        if (move_uploaded_file($_FILES['course_logo']['tmp_name'], $aadharPath)) {
            // $response['message'] = "Aadhar uploaded successfully!";
        } else {
            $response['message'] = "Failed to upload Course. Path: $aadharPath";
        }
    }

  

   // Proceed with the database query if image upload was successful or not required
   $insQuery = "INSERT INTO inter_course_tbl (intern_course_name, course_logo) 
                        VALUES ('$course_name', '$aname')";

   // Execute the query and send the appropriate response
   if ($conn->query($insQuery) === TRUE) {
       $response['success'] = true;
       $response['message'] = "Course details added successfully!";
   } else {
       $response['success'] = false;
       $response['message'] = "Error adding Course details: " . $conn->error;
   }

   // Send the response back as JSON
   echo json_encode($response);
   exit();
}




if (isset($_POST['editCourseName']) && $_POST['editCourseName'] != '') {
    
    // Get form data
    $course_id = $_POST['course_id'];
    $course_name = $_POST['editCourseName'];
   

    // Initialize file paths
    $aadharPath =  '';
    $aname =  '';

    // Handle Aadhar file upload
    if (!empty($_FILES['editCourseLogo']['tmp_name'])) {
        $aadharFileType = strtolower(pathinfo($_FILES['editCourseLogo']['name'], PATHINFO_EXTENSION));
        $aname = $course_name . "_." . $aadharFileType;
        $aadharPath = $internCourse . $aname;

        if (move_uploaded_file($_FILES['editCourseLogo']['tmp_name'], $aadharPath)) {
            // $response['message'] = "Aadhar uploaded successfully!";
        } else {
            $response['message'] = "Failed to upload Course. Path: $aadharPath";
        }
    }

  

    $updateQuery = "UPDATE inter_course_tbl 
    SET intern_course_name = '$course_name', 
        course_logo = '$aname' 
    WHERE inte_cou_id = '$course_id'";

   // Execute the query and send the appropriate response
   if ($conn->query($updateQuery) === TRUE) {
       $response['success'] = true;
       $response['message'] = "Course details updated successfully!";
   } else {
       $response['success'] = false;
       $response['message'] = "Error updating course details: " . $conn->error;
   }

   // Send the response back as JSON
   echo json_encode($response);
   exit();
}



//Handles Fetching the Clients details for editing 
if (isset($_POST['editIdCourse']) && $_POST['editIdCourse'] != '') {
    $editId = $_POST['editIdCourse'];

    $clientFetch="SELECT * FROM inter_course_tbl WHERE inte_cou_id='$editId'";
    $fetchResult = mysqli_query($conn, $clientFetch);
    
    if ($fetchResult) {

        $row = mysqli_fetch_assoc($fetchResult);

     
        
        $clientDetails = array(
            'inte_cou_id' => $row['inte_cou_id'],
            'intern_course_name' => $row['intern_course_name'],
            'course_logo' => $row['course_logo'],     
            

        );
        echo json_encode($clientDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}

?>