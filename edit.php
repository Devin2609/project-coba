<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
        <br>
        <label for="price">Harga:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>" required>
        <br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required><?php echo $description; ?></textarea>
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
