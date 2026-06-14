<?php
include '../config/koneksi.php';

if(isset($_POST['register'])){

    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = "user";

    $query = mysqli_prepare(
        $conn,
        "INSERT INTO users(nama,username,password,role)
         VALUES(?,?,?,?)"
    );

    mysqli_stmt_bind_param(
        $query,
        "ssss",
        $nama,
        $username,
        $password,
        $role
    );

    mysqli_stmt_execute($query);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
    background: linear-gradient(135deg, #11998e, #38ef7d);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: Arial, sans-serif;
}

.card{
    width:420px;
    border:none;
    border-radius:25px;
    background:white;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

.btn-success{
    border-radius:12px;
    font-weight:bold;
    padding:10px;
    background: linear-gradient(90deg, #63ff9f, #177635);
    border:none;
}

.btn-secondary{
    border-radius:12px;
    font-weight:bold;
    padding:10px;
    background: linear-gradient(90deg, #177635, #63ff9f);
    border:none;
}

input{
    border-radius:12px !important;
    padding:10px !important;
}
    </style>
</head>

<body>

<div class="card p-4 shadow">

    <h2 class="text-center mb-4">REGISTER</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit"
        name="register"
        class="btn btn-success w-100 mb-2">

    Register

</button>

<a href="login.php"
   class="btn btn-secondary w-100">

   Kembali ke Login

</a>

    </form>

</div>

</body>
</html>