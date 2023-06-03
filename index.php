<?php
// Koneksi ke database
$host = "localhost";
$username = "nama_pengguna";
$password = "";
$database = "coba";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan data dari database
function getData() {
    global $conn;
    $sql = "SELECT * FROM produk";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

// Fungsi untuk menambah data ke database
function addData($nama, $harga) {
    global $conn;
    $sql = "INSERT INTO produk (nama, harga) VALUES ('$nama', '$harga')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengubah data di database
function updateData($id, $nama, $harga) {
    global $conn;
    $sql = "UPDATE produk SET nama='$nama', harga='$harga' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus data dari database
function deleteData($id) {
    global $conn;
    $sql = "DELETE FROM produk WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Memproses permintaan pengguna
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Tambah data
    if (addData($nama, $harga)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data.";
    }
}

// Mengambil data dari database
$data = getData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Web PHP CRUD</h1>
    </header>

    <section>
        <h2>Daftar Produk</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>Tambah Produk Baru</h2>
        <form action="index.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required><br>

            <label for="harga">Harga:</label>
            <input type="text" name="harga" required><br>

            <input type="submit" name="submit" value="Tambah">
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Web PHP CRUD. Hak cipta dilindungi.</p>
    </footer>
</body>
</html>
