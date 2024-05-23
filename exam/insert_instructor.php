<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $instructorName = $_POST["fullName"];
    $instructorEmail = $_POST["email"];
    $instructorExpertise = $_POST["expertise"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];

    // Check if ID is provided for updating
    if ($_POST['instructorId'] != 'Auto') {
        $id = $_POST['instructorId'];
        // Update data in the instructor table
        $sql = "UPDATE instructor SET instructor_name='$instructorName', instructor_email='$instructorEmail', instructor_expertise='$instructorExpertise', address='$address', gender='$gender' WHERE instructor_id=$id";
    } else {
        // Retrieve image name if uploaded
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Insert data into the instructor table
        $sql = "INSERT INTO instructor (instructor_name, instructor_email, instructor_expertise, address, gender, image) 
                VALUES ('$instructorName', '$instructorEmail', '$instructorExpertise', '$address', '$gender', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to 'allImages' folder if exists
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "allImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }

        // Redirect to the instructors page
        if ($_POST['instructorId'] != 'Auto') {
            header('location:./?page=constructor&message=edit');
        } else {
            header('location:./?page=constructor&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
