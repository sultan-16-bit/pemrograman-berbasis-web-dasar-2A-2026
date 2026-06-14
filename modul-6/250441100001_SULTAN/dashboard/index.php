<?php
include '../auth/cek_login.php';
include '../config/koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
$total = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body{
    background: linear-gradient(135deg, #ffffff, #89D4FF);
    min-height:100vh;
}

.card-dashboard{
    border:none;
    border-radius:25px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    background:white;
}

.navbar{
    background: linear-gradient(90deg, #89D4FF, #ffffff) !important;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.navbar-brand{
    font-size:24px;
    font-weight:bold;
    letter-spacing:1px;
}

.welcome{
    font-size:32px;
    font-weight:bold;
    color:#333;
}

.btn-primary{
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    border:none;
    border-radius:12px;
    padding:10px;
    font-weight:bold;
}

.btn-light{
    border-radius:10px;
}

.card.bg-primary{
    background: linear-gradient(90deg, #667eea, #764ba2) !important;
}

.card.bg-success{
    background: linear-gradient(90deg, #11998e, #38ef7d) !important;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary px-4">

    <span class="navbar-brand fw-bold">
        Kampus App
    </span>

    <div>

        <span class="text-white me-3">
            <?= htmlspecialchars($_SESSION['nama']) ?>
        </span>

        <a href="../auth/logout.php"
           class="btn btn-light btn-sm">

           Logout

        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="card card-dashboard p-5">

        <div class="welcome mb-3">
            Selamat Datang 👋
        </div>

        <p class="text-muted">

            Anda login sebagai:

            <strong>
                <?= htmlspecialchars($_SESSION['role']) ?>
            </strong>

        </p>

        <div class="row mt-4">

            <div class="col-md-6">

                <div class="card bg-primary text-white p-4 border-0 rounded-4">

                    <h5>Total Mahasiswa</h5>

                    <h1><?= $total ?></h1>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card bg-success text-white p-4 border-0 rounded-4">

                    <h5>Status</h5>

                    <h3>Aktif</h3>

                </div>

            </div>

        </div>

        <a href="../mahasiswa/data.php"
           class="btn btn-primary mt-4">

           Kelola Data Mahasiswa

        </a>

    </div>

</div>

</body>
</html>