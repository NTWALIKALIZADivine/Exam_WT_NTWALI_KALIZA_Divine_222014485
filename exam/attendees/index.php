<?php include_once("./connection/connection.php"); ?>

<?php 
function validate_image($file){
    $ex_file = explode("?",$file)[0];
    if(!empty($ex_file)){
        if(is_file('allImages/'.$ex_file)){
            return 'allImages/'.$file;
        } else {
            return 'allImages/no-image-available.png';
        }
    } else {
        return 'allImages/no-image-available.png';
    }
}
?>

<div class="page">
    <div class="left">
        <h1>Attendees</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Attendees</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_Attendee" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Attendee</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable">
    <div class="cardHeader">
        <h2>All Attendees</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Names</td>
                <td>Registration Date</td>
                <td>Names</td>
                <td>Phone</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the attendees table
            $sql = "SELECT * FROM attendees";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["Names"]."</td>";
                    echo "<td>".$row["registration_date"]."</td>";
                    echo "<td>".$row["Names"]."</td>";
                    echo "<td>".$row["Phone"]."</td>";
                    echo "<td><div class='image-container'><img src='".validate_image($row["image"])."' alt='Attendee Image'></div></td>";
                    echo "<td><a href='./?page=add_Attendee&id=".$row["attendee_id"]."'>Update</a> | <a href='delete.php?table=attendees&id=".$row["attendee_id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .success-message {
        opacity: 1;
        background-color: lightgreen;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .image-container img {
        border-radius: 50%;
        width: 50px; /* Adjust size as needed */
        height: 50px; /* Adjust size as needed */
    }
    .available {
        background-color: #28a745;
        color: #fff;
    }
    .not-available {
        background-color: #dc3545;
        color: #fff;
    }
</style>

<script>
    // JavaScript to hide success message after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    }, 3000);
</script>
