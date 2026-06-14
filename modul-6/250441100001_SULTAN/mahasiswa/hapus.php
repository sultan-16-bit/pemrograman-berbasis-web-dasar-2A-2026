<?php
include '../auth/cek_login.php';
include '../config/koneksi.php';

if($_SESSION['role'] != 'admin'){
    header("Location: data.php");
    exit;
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = mysqli_prepare(
        $conn,
        "DELETE FROM mahasiswa WHERE id=?"
    );

    mysqli_stmt_bind_param($query, "i", $id);

    mysqli_stmt_execute($query);
}

header("Location: data.php");
exit;
?>