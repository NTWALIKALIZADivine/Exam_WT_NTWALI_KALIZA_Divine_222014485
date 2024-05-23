<?php 
include_once("./connection/connection.php");

// Initialize variables to hold data analysis data if editing
$dataAnalysisId = "Auto";
$resourceName = "";
$uploadDate = "";
$description = "";
$resourceType = "";
$image = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $dataAnalysisId = $_GET['id'];
    // Fetch data analysis data from the database
    $sql = "SELECT * FROM datanalysis WHERE Id = $dataAnalysisId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $resourceName = $row['Resource_name'];
        $uploadDate = $row['Upload_date'];
        $description = $row['Desccription'];
        $resourceType = $row['Resource_type'];
        $image = $row['image'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Data Analysis' : 'Add New Data Analysis'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Data Analysis</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Data Analysis' : 'Add New Data Analysis'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="dataAnalysisForm" action="insert_dataanalysis.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="dataAnalysisId">Data Analysis ID:</label>
            <input type="text" id="dataAnalysisId" name="dataAnalysisId" class="form-control" value="<?php echo $dataAnalysisId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="resourceName">Resource Name:</label>
            <input type="text" id="resourceName" name="resourceName" class="form-control" value="<?php echo $resourceName; ?>">
            <div id="resourceNameError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="uploadDate">Upload Date:</label>
            <input type="date" id="uploadDate" name="uploadDate" class="form-control" value="<?php echo $uploadDate; ?>">
            <div id="uploadDateError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
            <div id="descriptionError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="resourceType">Resource Type:</label>
            <input type="text" id="resourceType" name="resourceType" class="form-control" value="<?php echo $resourceType; ?>">
            <div id="resourceTypeError" class="error-message"></div>
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
    document.getElementById("dataAnalysisForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var resourceName = document.getElementById("resourceName").value.trim();
        var uploadDate = document.getElementById("uploadDate").value.trim();
        var description = document.getElementById("description").value.trim();
        var resourceType = document.getElementById("resourceType").value.trim();
        var image = document.getElementById("image").value;

        // Validate resource name
        if (resourceName === "") {
            document.getElementById("resourceNameError").innerText = "Resource Name is required";
            document.getElementById("resourceName").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("resourceNameError").innerText = "";
            document.getElementById("resourceName").style.borderColor = "";
        }

        // Validate upload date
        if (uploadDate === "") {
            document.getElementById("uploadDateError").innerText = "Upload Date is required";
            document.getElementById("uploadDate").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("uploadDateError").innerText = "";
            document.getElementById("uploadDate").style.borderColor = "";
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

        // Validate resource type
        if (resourceType === "") {
            document.getElementById("resourceTypeError").innerText = "Resource Type is required";
            document.getElementById("resourceType").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("resourceTypeError").innerText = "";
            document.getElementById("resourceType").style.borderColor = "";
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
