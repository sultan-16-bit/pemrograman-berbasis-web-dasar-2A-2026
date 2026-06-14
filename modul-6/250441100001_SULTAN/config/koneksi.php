<?php
$conn = mysqli_connect("localhost", "root", "", "kampus_app");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>