<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $emailid = $_POST['emailid'];
    $section = $_POST['section'];
    $rollno = $_POST['rollno'];
    $regno = $_POST['regno'];
    $math_2 = $_POST['math-2'];
    $dsa = $_POST['dsa'];
    $be = $_POST['be'];
    $chemistry = $_POST['chemistry'];
    $cetc = $_POST['cetc'];
    $subtotal = $_POST['subtotal'];
    $status = $_POST['status'];

    // Handle file upload
    $fileToUpload = $_FILES['fileToUpload'];
    $fileName = $fileToUpload['name'];
    $fileTmpName = $fileToUpload['tmp_name'];
    $fileDestination = '../assets/students/' . $fileName;

    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        // Database connection
        $con = mysqli_connect('localhost', 'root', '', 'student_result_management_system', 3306);
        if (!$con) {
            die("Error in database connection: " . mysqli_connect_error());
        }

        // SQL query to insert data into the database
        $insert = "INSERT INTO `student_info` (`name`, `emailid`, `image`, `section`, `rollno`, `regno`, `math_2`, `dsa`, `be`, `chemistry`, `cetc`, `total`, `status`) VALUES ('$name', '$emailid', '$fileDestination', '$section', '$rollno', '$regno', '$math_2', '$dsa', '$be', '$chemistry', '$cetc', '$subtotal', '$status')";

        if (mysqli_query($con, $insert)) {
            // Data inserted successfully
            echo "Details Added Successfully!";
        } else {
            // Error in database query
            echo "Error: " . mysqli_error($con);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}
?>
