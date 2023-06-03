<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST" action="">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Harga:</label>
        <input type="text" name="price" id="price" required>
        <br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
