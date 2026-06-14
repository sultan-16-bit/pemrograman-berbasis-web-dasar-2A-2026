<?php
include '../auth/cek_login.php';
include '../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_prepare(
    $conn,
    "SELECT * FROM mahasiswa WHERE id=?"
);

mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $angkatan = htmlspecialchars($_POST['angkatan']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $update = mysqli_prepare(
        $conn,
        "UPDATE mahasiswa
         SET nim=?, nama=?, jurusan=?, angkatan=?, alamat=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param(
        $update,
        "sssisi",
        $nim,
        $nama,
        $jurusan,
        $angkatan,
        $alamat,
        $id
    );

    mysqli_stmt_execute($update);

    header("Location: data.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <head>
    <title>Edit Data Mahasiswa</title>

    <link href="https://://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg, #89D4FF, #ffffff);
            min-height:100vh;
        }

        .card{
            border:none;
            border-radius:25px;
            box-shadow:0 15px 35px rgba(0,0,0,0.1);
            background:white;
        }

        h3{
            font-weight:bold;
            color:#333;
            margin-bottom:25px;
        }

        .form-control{
            border-radius:12px;
            padding:10px;
        }

        textarea.form-control{
            resize:none;
        }

        .btn-primary{
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            border:none;
            border-radius:12px;
            padding:10px 20px;
            font-weight:bold;
        }

        .btn-secondary{
            border-radius:12px;
            padding:10px 20px;
        }

        label{
            font-weight:600;
            margin-bottom:5px;
        }

    </style>

</head>
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h3>Edit Data Mahasiswa</h3>

<form method="POST">

<div class="mb-3">
<label>NIM</label>
<input type="text"
       name="nim"
       class="form-control"
       value="<?= htmlspecialchars($data['nim']) ?>"
       required>
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text"
       name="nama"
       class="form-control"
       value="<?= htmlspecialchars($data['nama']) ?>"
       required>
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text"
       name="jurusan"
       class="form-control"
       value="<?= htmlspecialchars($data['jurusan']) ?>"
       required>
</div>

<div class="mb-3">
<label>Angkatan</label>
<input type="number"
       name="angkatan"
       class="form-control"
       value="<?= htmlspecialchars($data['angkatan']) ?>"
       required>
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat"
          class="form-control"
          required><?= htmlspecialchars($data['alamat']) ?></textarea>
</div>

<button type="submit"
        name="update"
        class="btn btn-primary">

    Update Data

</button>

<a href="data.php" class="btn btn-secondary">
    Kembali
</a>

</form>

</div>

</div>

</body>
</html>