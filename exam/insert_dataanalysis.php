<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $resourceName = $_POST["resourceName"];
    $uploadDate = $_POST["uploadDate"];
    $description = $_POST["description"];
    $resourceType = $_POST["resourceType"];

    // Check if ID is provided for updating
    if ($_POST['dataAnalysisId'] != 'Auto') {
        $id = $_POST['dataAnalysisId'];
        // Update data in the dataanalysis table
        $sql = "UPDATE datanalysis SET Resource_name='$resourceName', Upload_date='$uploadDate', Desccription='$description', Resource_type='$resourceType' WHERE id=$id";
    } else {
        // Retrieve image name if uploaded
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Insert data into the dataanalysis table
        $sql = "INSERT INTO datanalysis (Resource_name, Upload_date, Desccription, Resource_type, image) 
                VALUES ('$resourceName', '$uploadDate', '$description', '$resourceType', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to 'allImages' folder if exists
        if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "allImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }

        // Redirect to the data analysis page
        if ($_POST['dataAnalysisId'] != 'Auto') {
            header('location:./?page=dataanalysis&message=edit');
        } else {
            header('location:./?page=dataanalysis&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>
