<?php 
include_once("./connection/connection.php");

// Initialize variables to hold instructor data if editing
$instructorId = "Auto";
$fullName = "";
$email = "";
$expertise = "";
$address = "";
$gender = "";
$status = "";
$image = "";

// Check if ID is provided for editing
if(isset($_GET['id'])) {
    $instructorId = $_GET['id'];
    // Fetch instructor data from the database
    $sql = "SELECT * FROM instructor WHERE instructor_id = $instructorId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign fetched data to variables
        $fullName = $row['instructor_name'];
        $email = $row['instructor_email'];
        $expertise = $row['instructor_expertise'];
        $address = $row['address'];
        $gender = $row['gender'];
        $status = $row['status'];
        $image = $row['image'];
    }
}
?>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Instructor' : 'Add New Instructor'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Instructors</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Instructor' : 'Add New Instructor'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="instructorForm" action="insert_instructor.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="instructorId">Instructor ID:</label>
            <input type="text" id="instructorId" name="instructorId" class="form-control" value="<?php echo $instructorId; ?>" readonly>
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
            <label for="expertise">Expertise:</label>
            <input type="text" id="expertise" name="expertise" class="form-control" value="<?php echo $expertise; ?>">
            <div id="expertiseError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
            <div id="addressError" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="active" <?php if($status == 'active') echo 'selected'; ?>>Active</option>
                <option value="non_active" <?php if($status == 'non_active') echo 'selected'; ?>>Non Active</option>
            </select>
            <div id="statusError" class="error-message"></div>
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
    document.getElementById("instructorForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var isValid = true;

        var fullName = document.getElementById("fullName").value.trim();
        var email = document.getElementById("email").value.trim();
        var expertise = document.getElementById("expertise").value.trim();
        var address = document.getElementById("address").value.trim();
        var gender = document.getElementById("gender").value;
        var status = document.getElementById("status").value;
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

        // Validate expertise
        if (expertise === "") {
            document.getElementById("expertiseError").innerText = "Expertise is required";
            document.getElementById("expertise").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("expertiseError").innerText = "";
            document.getElementById("expertise").style.borderColor = "";
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

        // Validate gender
        if (gender === "") {
            document.getElementById("genderError").innerText = "Gender is required";
            document.getElementById("gender").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("genderError").innerText = "";
            document.getElementById("gender").style.borderColor = "";
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

        // Validate status
        if (status === "") {
            document.getElementById("statusError").innerText = "Status is required";
            document.getElementById("status").style.borderColor = "red";
            isValid = false;
        } else {
            document.getElementById("statusError").innerText = "";
            document.getElementById("status").style.borderColor = "";
        }

        return isValid;
    }
</script>
