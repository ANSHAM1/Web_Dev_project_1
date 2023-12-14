<?php
$host = "localhost";
$user = "root";
$pass = "A449122@sql";
$dbname = "webform";


$con=mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die("connection lost due to ". mysqli_connect_error());
}

session_start();
$_SESSION['mob']=$_GET['mobile'];
$mob=$_SESSION['mob'];

$_SESSION['pass']=$_GET['pass'];
$pass=$_SESSION['pass'];

$sql="SELECT * FROM user WHERE mobile='$mob' AND password='$pass'";
$result = $con->query($sql);
if($result==true) 
{
    if ($result->num_rows > 0)
    {
        echo '<script type="text/javascript">
        window.open("p4.html");
        </script>';
    }
    else 
    {
        echo "no account is registered through this mobile and pass";
    }
}

$con->close();
?>
