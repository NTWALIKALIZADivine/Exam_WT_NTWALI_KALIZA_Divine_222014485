<?php 
include_once("./connection/connection.php");

// Initialize variables to hold supervisor data if editing
$supervisorId = "Auto";
$fullName = "";
$email = "";
$address = "";
$age = "";
$gender = "";
$image = "";
$dateAdded = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $supervisorId = $_GET['id'];
    // Fetch supervisor data from the database
    $sql = "SELECT * FROM supervisor WHERE id = $supervisorId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['fullname'];
        $email = $row['email'];
        $address = $row['address'];
        $age = $row['age'];
        $gender = $row['gender'];
        $image = $row['image'];
        $dateAdded = $row['dateAdded'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Supervisor' : 'Add New Supervisor'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Supervisors</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Supervisor' : 'Add New Supervisor'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="supervisorForm" action="insert_supervisor.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="supervisorId">Supervisor ID:</label>
            <input type="text" id="supervisorId" name="supervisorId" class="form-control" value="<?php echo $supervisorId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $fullName; ?>">
            <div id="fullNameError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <div id="emailError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
            <div id="addressError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" class="form-control" value="<?php echo $age; ?>">
            <div id="ageError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
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
    document.getElementById("supervisorForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var fullName = document.getElementById("fullName").value.trim();
        var email = document.getElementById("email").value.trim();
        var address = document.getElementById("address").value.trim();
        var age = document.getElementById("age").value.trim();
        var gender = document.getElementById("gender").value;
        var image = document.getElementById("image").value;

        // Validate full name
        if (fullName === "") {
            document.getElementById("fullNameError").innerText = "Full Name is required";
            document.getElementById("fullName").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("fullNameError").innerText = "";
            document.getElementById("fullName").style.borderColor = "";
        }

        // Validate email
        if (email === "") {
            document.getElementById("emailError").innerText = "Email is required";
            document.getElementById("email").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("emailError").innerText = "";
            document.getElementById("email").style.borderColor = "";
        }

        // Validate address
        if (address === "") {
            document.getElementById("addressError").innerText = "Address is required";
            document.getElementById("address").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("addressError").innerText = "";
            document.getElementById("address").style.borderColor = "";
        }

        // Validate age
        if (age === "") {
            document.getElementById("ageError").innerText = "Age is required";
            document.getElementById("age").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("ageError").innerText = "";
            document.getElementById("age").style.borderColor = "";
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
