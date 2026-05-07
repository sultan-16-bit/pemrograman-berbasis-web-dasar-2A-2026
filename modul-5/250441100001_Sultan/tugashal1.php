<?php
// Fungsi kustom: memproses dan menampilkan data input
function tampilkanData($framework, $tools, $minat, $skill, $pengalaman) {
    echo "<h3>Hasil Input:</h3>";

    // Tampilkan data utama dalam tabel
    echo "<table border='1' cellpadding='10'>
            <tr><th>Framework/Tools</th><td>" . implode(", ", $framework) . "</td></tr>
            <tr><th>Tools Penunjang</th><td>" . implode(", ", $tools) . "</td></tr>
            <tr><th>Minat Bidang</th><td>$minat</td></tr>
            <tr><th>Tingkat Skill</th><td>$skill</td></tr>
          </table>";

    // Tampilkan pengalaman dalam paragraf
    echo "<h4>Pengalaman:</h4>";
    echo "<p>$pengalaman</p>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Developer</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #fafbf9; }
        table { border-collapse: collapse; }
        th, td { padding: 8px 14px; text-align: left; }
        input[type="text"], textarea, select {
            width: 350px; padding: 6px; margin-top: 4px;
        }
        button { padding: 8px 20px; background: #6366f1; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background: #4f46e5; }
        .pesan-error { color: red; }
        .pesan-sukses { color: green; }
        a { color: #6366f1; }

    </style>
</head>
<body>

<h2>Profil Interaktif Developer Pemula</h2>

<!-- 1. Profil Statis -->
<table border="1" cellpadding="10">
    <tr><td><b>Nama</b></td><td>Sultan</td></tr>
    <tr><td><b>ID Developer</b></td><td>DEV001</td></tr>
    <tr><td><b>Kota/Tgl Lahir</b></td><td>Sidoarjo, 16 Mei 2006</td></tr>
    <tr><td><b>Email</b></td><td>sultan@email.com</td></tr>
    <tr><td><b>No. WhatsApp</b></td><td>08123456789</td></tr>
</table>

<br>

<!-- 2. Form Isian Dinamis -->
<h3>Form Isian</h3>
<form method="POST">

    <label>Framework/Tools (pisahkan dengan koma):</label><br>
    <input type="text" name="framework" placeholder="contoh: Laravel, React, Vue"><br><br>

    <label>Cerita singkat pengalaman membuat aplikasi/website:</label><br>
    <textarea name="pengalaman" rows="4" cols="50"></textarea><br><br>

    <label>Tools Penunjang:</label><br>
    <input type="checkbox" name="tools[]" value="VS Code"> VS Code
    <input type="checkbox" name="tools[]" value="GitHub"> GitHub
    <input type="checkbox" name="tools[]" value="Figma"> Figma
    <input type="checkbox" name="tools[]" value="Postman"> Postman<br><br>

    <label>Minat Bidang:</label><br>
    <input type="radio" name="minat" value="Frontend"> Frontend
    <input type="radio" name="minat" value="Backend"> Backend
    <input type="radio" name="minat" value="Fullstack"> Fullstack<br><br>

    <label>Tingkat Skill Coding:</label><br>
    <select name="skill">
        <option value="">-- Pilih --</option>
        <option value="Dasar">Dasar</option>
        <option value="Cukup">Cukup</option>
        <option value="Profesional">Profesional</option>
    </select><br><br>

    <button type="submit" name="submit">Kirim</button>
</form>

<hr>

<!-- 3. Proses PHP & Logika -->
<?php
if (isset($_POST['submit'])) {

    // Ambil semua data dari form
    $frameworkInput = $_POST['framework'];
    $pengalaman     = $_POST['pengalaman'];
    $tools          = $_POST['tools'] ?? [];   // checkbox bisa kosong
    $minat          = $_POST['minat'] ?? "";   // radio bisa kosong
    $skill          = $_POST['skill'];

    // Validasi: semua wajib diisi
    if (empty($frameworkInput) || empty($pengalaman) || empty($tools) || empty($minat) || empty($skill)) {
        echo "<p class='pesan-error'>Semua input wajib diisi!</p>";
    } else {

        // Proses framework dengan explode (string → array)
        $framework = explode(",", $frameworkInput);

        // Kondisi tambahan: jika framework > 2
        if (count($framework) > 2) {
            echo "<p class='pesan-sukses'>Skill Anda cukup luas di bidang development!</p>";
        }

        // Panggil fungsi kustom untuk menampilkan hasil
        tampilkanData($framework, $tools, $minat, $skill, $pengalaman);
    }
}
?>

<br>
<a href="tugashal2.php">Menuju Timeline →</a>

</body>
</html>