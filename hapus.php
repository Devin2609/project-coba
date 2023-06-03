<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
