<?php 
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_kmitl";

// เชื่อมต่อกับฐานข้อมูล

$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
ob_start();
/*
if($conn){
    echo "connected";
}else{ echo "not connected";}
*/
?>