<?php
include '../auth/cek_login.php';
include '../config/koneksi.php';


if(isset($_POST['simpan'])){

    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $angkatan = htmlspecialchars($_POST['angkatan']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $query = mysqli_prepare(
        $conn,
        "INSERT INTO mahasiswa(nim,nama,jurusan,angkatan,alamat)
         VALUES(?,?,?,?,?)"
    );

    mysqli_stmt_bind_param(
        $query,
        "sssis",
        $nim,
        $nama,
        $jurusan,
        $angkatan,
        $alamat
    );

    mysqli_stmt_execute($query);

    header("Location: data.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body{
    background: linear-gradient(135deg, #c5cef9, #89D4FF);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: Arial, sans-serif;
}

.container{
    max-width:700px;
}

.card{
    border:none;
    border-radius:30px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
    padding:20px;
}

h3{
    font-weight:bold;
    color:#5a189a;
    margin-bottom:25px;
    text-align:center;
}

label{
    font-weight:600;
    color:#444;
    margin-bottom:6px;
}

.form-control{
    border-radius:15px;
    padding:12px;
    border:1px solid #ddd;
    transition:0.3s;
}

.form-control:focus{
    border-color:#667eea;
    box-shadow:0 0 10px rgba(102,126,234,0.3);
}

textarea.form-control{
    resize:none;
}

.btn-success{
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    border:none;
    border-radius:15px;
    padding:10px 25px;
    font-weight:bold;
    transition:0.3s;
}

.btn-success:hover{
    transform:translateY(-2px);
}

.btn-secondary{
    background: linear-gradient(90deg, #868f96, #596164);
    border:none;
    border-radius:15px;
    padding:10px 25px;
    font-weight:bold;
}

</style>
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow">

<h3>Tambah Mahasiswa</h3>

<form method="POST">

<div class="mb-3">
<label>NIM</label>
<input type="text" name="nim" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text" name="jurusan" class="form-control" required>
</div>

<div class="mb-3">
<label>Angkatan</label>
<input type="number" name="angkatan" class="form-control" required>
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control" required></textarea>
</div>

<button type="submit" name="simpan" class="btn btn-primary">
Simpan
</button>

</form>

</div>

</div>

</body>
</html>