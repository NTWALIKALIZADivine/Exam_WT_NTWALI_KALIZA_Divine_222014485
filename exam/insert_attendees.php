<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $names = $_POST["names"];
    $phone = $_POST["phone"];

    // Check if ID is provided for updating
    if ($_POST['attendeeId'] != 'Auto') {
        $id = $_POST['attendeeId'];
        // Update data in the attendees table
        $sql = "UPDATE attendees SET Names='$names', Phone='$phone' WHERE attendee_id=$id";
    } else {
        // Retrieve image name if uploaded
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Insert data into the attendees table
        $sql = "INSERT INTO attendees (Names, Phone, image) VALUES ('$names', '$phone', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to 'allImages' folder if exists
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "allImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }

        // Redirect to the attendees page
        if ($_POST['attendeeId'] != 'Auto') {
            header('location:./?page=attendees&message=edit');
        } else {
            header('location:./?page=attendees&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
