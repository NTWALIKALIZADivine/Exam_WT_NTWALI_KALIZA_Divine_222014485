<?php
include"conn.php";
$select="SELECT * FROM datanalysis";
$cc=mysqli_query($conn,$select);



?>


<style type="text/css">
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 90px;
}

td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

</style>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="workshop.php">Workshops</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <table border="1">
        <tr>
            <td>Resource Name</td>
            <td>Upload date</td>
            <td>Description</td>
            <td>Resource Type</td>
            <td>Delete</td>
            <td>Update</td>
        </tr>
        <tr>
            <?php
           while($row=mysqli_fetc_assoc($cc)){
            ?>
            <td><?php echo $row['Id'];?></td>
            <td><?php echo $row['Resource_name'];?></td>
            <td><?php echo $row['Upload_date'];?></td>
            <td><?php echo $row['Desccription'];?></td>
            <td><?php echo $row['Resource_type'];?></td>
            <td>
                <a href="#"><button>Update</button></a>
            </td>
            <form  method="POST">
                <td>
                    <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>">
                    <input type="submit" value="delete">
                </td>

            </form>
            <tr>
                <?php}; ?>
            </tr>


        </tr>
    </table>
