<?php
$servername="localhost";
$user="root";
$pass="";
$dbname="rcs_final";

$conn=mysqli_connect($servername,$user,$pass,$dbname);

if($conn->connect_error){
    die("error");
}
?>


