<?php 
include_once("./connection/connection.php");

if (isset($_GET['table']) && isset($_GET['id']) && !isset($_GET['status'])) {
    $table = $_GET['table'];

    if ($table == 'instructor') {
        $id = $_GET['id'];
        $sql = "DELETE FROM instructor WHERE instructor_id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=constructor&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else if ($table == 'worshop') {
        $id = $_GET['id'];
        $sql = "DELETE FROM worshop WHERE workshop_id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=shop&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'attendees') {
        $id = $_GET['id'];
        $sql = "DELETE FROM attendees WHERE attendee_id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=attendees&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'datanalysis') {
        $id = $_GET['id'];
        $sql = "DELETE FROM datanalysis WHERE Id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=dataanalysis&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    } else if ($table == 'supervisor') {
        $id = $_GET['id'];
        $sql = "DELETE FROM supervisor WHERE id =$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page with a success message
            header('location:./?page=superVisor&message=delete');
        } else {
            echo "Error deleting record: " . $conn->error;
        }   
    }
} else if (isset($_GET['status'])) {
    $table = $_GET['table'];
    $status = $_GET['status'];
   
    if ($status == 'block') {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='non_active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        if ($table == 'customer') {
            $id = $_GET['id'];
            $sql = "UPDATE customer SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=customers');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else if ($table == 'employees') {
            $id = $_GET['id'];
            $sql = "UPDATE employees SET status='active' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the same page with a success message
                header('location:./?page=employees');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
} else {
    // Do nothing
}
?>
