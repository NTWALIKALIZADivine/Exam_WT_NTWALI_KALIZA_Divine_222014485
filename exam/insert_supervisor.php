<?php
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];

    // Retrieve image name if uploaded
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

    // Insert data into the supervisor table
    $sql = "INSERT INTO supervisor (fullname, email, address, age, gender, image) 
            VALUES ('$fullName', '$email', '$address', '$age', '$gender', '$image')";

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to 'allImages' folder if exists
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "allImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }

        // Redirect to the supervisors page with success message
        header('location:./?page=supervisor&message=insert');
    } else {
        // If an error occurs, display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the request method is not POST, redirect to the supervisors page
    header('location:./?page=supervisor');
}
?>
