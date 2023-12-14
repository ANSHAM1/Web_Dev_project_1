<?php
$servername = "localhost";
$username = "root";
$password = "A449122@sql";
$dbname = "webform";


$name = $_GET['name'];
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$qual = $_GET['qua'];
$pass = $_GET['pass'];

$con=mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("connection lost due to ". mysqli_connect_error());
}

$sql = "INSERT INTO user (name, email, mobile, qualification, password) VALUES ('$name','$email','$mobile','$qual','$pass')";
if($con->query($sql)==true) {
    echo '<script type="text/javascript">
    window.open("index.html");
    </script>';
}
else {
    echo "error: $sql <br> $con->error";
}


$con->close();
?>