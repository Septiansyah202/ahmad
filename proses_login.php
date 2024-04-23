<?php
// Informasi koneksi ke database
$host = "ahmad"; // Ganti dengan nama host Anda
$username = "ahmad"; // Ganti dengan nama pengguna database Anda
$password = "ahmad"; // Ganti dengan kata sandi database Anda
$database = "admin_database"; // Ganti dengan nama database Anda

// Membuat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan query ke database untuk memeriksa kecocokan username dan password
$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $koneksi->query($query);

// Memeriksa apakah hasil query mengembalikan baris data atau tidak
if ($result->num_rows > 0) {
    // Pengguna ditemukan, arahkan ke halaman selanjutnya
    header("Location: halaman_selanjutnya.php");
} else {
    // Username atau password salah, arahkan kembali ke halaman login dengan pesan kesalahan
    header("Location: form_login.php?error=1");
}

// Menutup koneksi database
$koneksi->close();
?>
