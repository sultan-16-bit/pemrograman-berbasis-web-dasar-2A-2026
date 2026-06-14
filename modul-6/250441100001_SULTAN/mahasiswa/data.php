<?php
include '../auth/cek_login.php';
include '../config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body{
    background: linear-gradient(135deg, #ffffff, #89D4FF);
    min-height:100vh;
}

.card{
    border:none;
    border-radius:25px;
    background:white;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
}

.table{
    border-radius:15px;
    overflow:hidden;
}

.table thead{
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    color:white;
}

.table-hover tbody tr:hover{
    background:#f1f7ff;
    transition:0.3s;
}

.btn{
    border-radius:10px;
    font-weight:500;
}

.btn-success{
    background: linear-gradient(90deg, #11998e, #38ef7d);
    border:none;
}

.btn-warning{
    color:white;
    border:none;
    background: linear-gradient(90deg, #f7971e, #ffd200);
}

.btn-danger{
    border:none;
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
}

h3{
    font-weight:bold;
    color:#333;
}

#searchInput{
    border-radius:12px;
    padding:10px;
    border:1px solid #ccc;
}

</style>

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <div class="d-flex justify-content-between mb-3">

            <h3>Data Mahasiswa</h3>

            <a href="tambah.php" class="btn btn-success">
                Tambah Data
            </a>

        </div>

        <input type="text"
               id="searchInput"
               class="form-control mb-3"
               placeholder="Cari mahasiswa...">

        <table class="table table-bordered table-hover">

            <thead>

                <tr class="table-primary">

                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no = 1; ?>

            <?php while($row = mysqli_fetch_assoc($data)) : ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= htmlspecialchars($row['nim']) ?></td>

                <td><?= htmlspecialchars($row['nama']) ?></td>

                <td><?= htmlspecialchars($row['jurusan']) ?></td>

                <td><?= htmlspecialchars($row['angkatan']) ?></td>

                <td><?= htmlspecialchars($row['alamat']) ?></td>

                <td>

                    <a href="edit.php?id=<?= $row['id'] ?>"
                       class="btn btn-warning btn-sm">

                       Edit

                    </a>

                    <?php if($_SESSION['role'] == 'admin') : ?>

                        <a href="hapus.php?id=<?= $row['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data?')">

                           Hapus

                        </a>

                    <?php endif; ?>

                </td>

            </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

<script>

document.getElementById('searchInput').addEventListener('keyup', function() {

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll('tbody tr');

    rows.forEach((row) => {

        let text = row.innerText.toLowerCase();

        row.style.display = text.includes(value)
            ? ''
            : 'none';

    });

});

</script>

</body>
</html>