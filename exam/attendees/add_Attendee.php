<?php 
include_once("./connection/connection.php");

// Initialize variables to hold attendee data if editing
$attendeeId = "Auto";
$names = "";
$phone = "";
$image = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $attendeeId = $_GET['id'];
    // Fetch attendee data from the database
    $sql = "SELECT * FROM attendees WHERE attendee_id = $attendeeId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $names = $row['Names'];
        $phone = $row['Phone'];
        $image = $row['image'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Attendee' : 'Add New Attendee'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Attendees</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Attendee' : 'Add New Attendee'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="attendeeForm" action="insert_attendee.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="attendeeId">Attendee ID:</label>
            <input type="text" id="attendeeId" name="attendeeId" class="form-control" value="<?php echo $attendeeId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="names">Names:</label>
            <input type="text" id="names" name="names" class="form-control" value="<?php echo $names; ?>">
            <div id="namesError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>">
            <div id="phoneError" class="error-message"></div>
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
    document.getElementById("attendeeForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var names = document.getElementById("names").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var image = document.getElementById("image").value;

        // Validate names
        if (names === "") {
            document.getElementById("namesError").innerText = "Names are required";
            document.getElementById("names").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("namesError").innerText = "";
            document.getElementById("names").style.borderColor = "";
        }

        // Validate phone
        if (phone === "") {
            document.getElementById("phoneError").innerText = "Phone is required";
            document.getElementById("phone").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("phoneError").innerText = "";
            document.getElementById("phone").style.borderColor = "";
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