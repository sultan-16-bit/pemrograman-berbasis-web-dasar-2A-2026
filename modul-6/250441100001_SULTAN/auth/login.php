<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_prepare($conn, "SELECT * FROM users WHERE username=?");
    mysqli_stmt_bind_param($query, "s", $username);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);
    $data = mysqli_fetch_assoc($result);

    if($data && password_verify($password, $data['password'])){

        $_SESSION['login'] = true;
        $_SESSION['role'] = $data['role'];
        $_SESSION['nama'] = $data['nama'];

        header("Location: ../dashboard/index.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
    background: linear-gradient(135deg, #667eea, #764ba2);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: Arial, sans-serif;
}

.card{
    width:400px;
    border:none;
    border-radius:25px;
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.95);
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
    transition:0.3s;
}

.card:hover{
    transform: translateY(-5px);
}

.btn-primary{
    border-radius:12px;
    padding:10px;
    font-weight:bold;
}

input{
    border-radius:12px !important;
    padding:10px !important;
}
    </style>
</head>

<body>

<div class="card p-4">
    <h2 class="text-center mb-4">LOGIN</h2>

    <?php if(isset($error)) : ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary w-100">
            Login
        </button>

    </form>

    <p class="text-center mt-3">
        Belum punya akun?
        <a href="register.php">Register</a>
    </p>

</div>

</body>
</html>