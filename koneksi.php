<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "coba";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
