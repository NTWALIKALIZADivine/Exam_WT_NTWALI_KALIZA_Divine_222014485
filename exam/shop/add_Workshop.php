<?php 
include_once("./connection/connection.php");

// Initialize variables to hold workshop data if editing
$workshopId = "Auto";
$workshopName = "";
$description = "";
$duration = "";
$image = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $workshopId = $_GET['id'];
    // Fetch workshop data from the database
    $sql = "SELECT * FROM workshop WHERE workshop_id = $workshopId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $workshopName = $row['workshop_name'];
        $description = $row['description'];
        $duration = $row['duration'];
        $image = $row['image'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Workshop' : 'Add New Workshop'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Workshops</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Workshop' : 'Add New Workshop'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="workshopForm" action="insert_workshop.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="workshopId">Workshop ID:</label>
            <input type="text" id="workshopId" name="workshopId" class="form-control" value="<?php echo $workshopId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="workshopName">Workshop Name:</label>
            <input type="text" id="workshopName" name="workshopName" class="form-control" value="<?php echo $workshopName; ?>">
            <div id="workshopNameError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
            <div id="descriptionError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" class="form-control" value="<?php echo $duration; ?>">
            <div id="durationError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control">
            <div id="imageError" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit"><?php echo isset($_GET['id']) ? 'Update' : 'Submit'; ?></button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
    document.getElementById("workshopForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var workshopName = document.getElementById("workshopName").value.trim();
        var description = document.getElementById("description").value.trim();
        var duration = document.getElementById("duration").value.trim();
        var image = document.getElementById("image").value;

        // Validate workshop name
        if (workshopName === "") {
            document.getElementById("workshopNameError").innerText = "Workshop Name is required";
            document.getElementById("workshopName").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("workshopNameError").innerText = "";
            document.getElementById("workshopName").style.borderColor = "";
        }

        // Validate description
        if (description === "") {
            document.getElementById("descriptionError").innerText = "Description is required";
            document.getElementById("description").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("descriptionError").innerText = "";
            document.getElementById("description").style.borderColor = "";
        }

        // Validate duration
        if (duration === "") {
            document.getElementById("durationError").innerText = "Duration is required";
            document.getElementById("duration").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("durationError").innerText = "";
            document.getElementById("duration").style.borderColor = "";
        }

        // Validate image file type (allow only image files)
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (image !== "" && !allowedExtensions.exec(image)) {
            document.getElementById("imageError").innerText = "Invalid file type. Please upload an image file (jpg, jpeg, png, gif).";
            document.getElementById("image").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("imageError").innerText = "";
            document.getElementById("image").style.borderColor = "";
        }

        return isValid;
    }
</script>
