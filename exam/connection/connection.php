<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "datp";
$conn = new mysqli($localhost, $username, $password, $dbname);
if($conn->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
}
function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="'.$url.'"</script>';
}
?>