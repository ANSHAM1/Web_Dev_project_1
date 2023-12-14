<?php
$n=$_GET['name'];
$code=$_GET['code'];
$text =$_GET['data'];

$servername = "localhost";
$username = "root";
$password = "A449122@sql";
$dbname = "webform";


session_start();    
$mob=$_SESSION['mob'];
$pass=$_SESSION['pass'];

if($code=='python')
{
    $name="$n".".py";
}
else{
    $name="$n".".java";
}

$con=mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("connection lost due to ". mysqli_connect_error());
}
$sql = "SELECT name FROM user WHERE mobile='$mob' AND password='$pass'";

if($con->query($sql)==true) 
{
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $user_name = $result->fetch_object()->name;
        $folderPath = 'user/'.$user_name;

        if (is_dir($folderPath)) 
        {
            $file = fopen($folderPath."/".$name, 'w');
            fwrite($file, $text);

            fclose( $file );

            echo 'your file has been created and saved in same folder';
        } 
        else 
        {
            mkdir($folderPath);
            $file = fopen($folderPath."/".$name, 'w');
            fwrite($file, $text);

            fclose( $file );

            echo 'your file has been created and saved in same folder';

        }
    } 
    else 
    {
        echo "No user found with the provided mobile number and password.";
    }
}
else 
{
    echo"ERROR: $sql <br>$con->error";
}
?>