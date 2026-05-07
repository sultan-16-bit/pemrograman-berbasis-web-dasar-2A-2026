<?php
// Array artikel blog
$artikel = [
    [
        "judul"     => "Belajar HTML Pertama Kali",
        "tanggal"   => "2026-01-10",
        "isi"       => "Di awal tahun 2026, saya mulai belajar HTML untuk pertama kalinya setelah masuk kuliah Sistem Informasi. Awalnya bingung kenapa tulisan tidak muncul di browser, ternyata file belum disimpan dengan ekstensi .html. Dari situ saya sadar bahwa detail kecil sangat penting. Belajar HTML mengajarkan saya cara membuat struktur halaman web seperti heading, paragraf, tabel, dan link.",
        "gambar"    => "pertama.png",
        "referensi" => "https://www.w3schools.com/html/"
    ],
    [
        "judul"     => "Error Pertama yang Bikin Panik",
        "tanggal"   => "2026-02-05",
        "isi"       => "Masih di tahun 2026, saat mencoba membuat halaman dengan CSS, seluruh tampilan malah berantakan. Panik? Tentu. Setelah diteliti, ternyata ada kurung kurawal yang lupa ditutup. Dari pengalaman ini saya belajar bahwa error bukan musuh, melainkan petunjuk bahwa ada yang perlu diperbaiki. Sekarang saya justru lebih tenang kalau melihat error.",
        "gambar"    => "error.png",
        "referensi" => "https://developer.mozilla.org/id/docs/Web/CSS"
    ],
    [
        "judul"     => "Proyek PKL: Desain Peta Jalur Kabel dengan AutoCAD",
        "tanggal"   => "2024-07-15",
        "isi"       => "Saat PKL di tahun 2024, saya mendapat tugas membuat desain peta jalur kabel menggunakan aplikasi AutoCAD. Proyek ini menantang karena saya harus memahami simbol-simbol teknik jaringan dan cara menggambar jalur fiber optic secara presisi. Hasilnya digunakan sebagai dokumentasi teknis di tempat PKL. Pengalaman ini membuat saya lebih menghargai pentingnya perencanaan yang matang sebelum instalasi jaringan.",
        "gambar"    => "pkl.png",
        "referensi" => "https://www.autodesk.com/products/autocad/overview"
    ],
];

// Array kutipan motivasi
$quotes = [
    "Coding itu bukan bakat, tapi kebiasaan.",
    "Error adalah guru terbaik.",
    "Seribu baris kode dimulai dari satu baris.",
    "Jangan takut salah, takutlah berhenti mencoba.",
    "Practice makes perfect.",
];

// Ambil id artikel dari URL (GET), default 0
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Pastikan id tidak keluar dari range array
if ($id < 0) $id = 0;
if ($id >= count($artikel)) $id = count($artikel) - 1;

// Data artikel yang dipilih
$data = $artikel[$id];

// Kutipan acak menggunakan array_rand()
$kutipan = $quotes[array_rand($quotes)];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Developer - Sultan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9fafb; padding: 20px; }
        h2   { color: #1e293b; }

        /* Daftar judul artikel */
        .daftar-artikel { margin-bottom: 20px; }
        .daftar-artikel ul { list-style: none; padding: 0; }
        .daftar-artikel li { margin: 6px 0; }
        .daftar-artikel a {
            color: #6366f1;
            text-decoration: none;
            font-weight: bold;
        }
        .daftar-artikel a:hover { text-decoration: underline; }
        .daftar-artikel .aktif { color: #e11d48; }

        /* Kotak detail artikel */
        .detail-artikel {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            max-width: 650px;
        }
        .detail-artikel h3 { color: #1e293b; margin-bottom: 4px; }
        .detail-artikel .tanggal { color: #64748b; font-size: 0.9rem; margin-bottom: 14px; }
        .detail-artikel img { width: 100%; max-width: 400px; border-radius: 6px; margin: 12px 0; }

        /* Kutipan motivasi */
        .kutipan {
            background: #ede9fe;
            border-left: 4px solid #7c3aed;
            padding: 10px 14px;
            margin: 16px 0;
            font-style: italic;
            color: #4c1d95;
            border-radius: 0 6px 6px 0;
        }

        /* Navigasi artikel (sebelumnya / selanjutnya) */
        .nav-artikel { margin-top: 16px; }
        .nav-artikel a {
            display: inline-block;
            padding: 8px 16px;
            background: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 8px;
            font-size: 0.9rem;
        }
        .nav-artikel a:hover { background: #4f46e5; }

        /* Navigasi halaman */
        .nav-halaman { margin-top: 24px; }
        .nav-halaman a { color: #6366f1; text-decoration: none; margin-right: 14px; }
        .nav-halaman a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h2>Blog Reflektif Developer</h2>

<!-- 1. Daftar judul artikel (Navigasi GET) -->
<div class="daftar-artikel">
    <b>Pilih Artikel:</b>
    <ul>
        <?php foreach ($artikel as $index => $item): ?>
            <li>
                <a href="?id=<?= $index ?>" class="<?= ($index == $id) ? 'aktif' : '' ?>">
                    <?= $item['judul'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<hr>

<!-- 2. Konten dinamis artikel yang dipilih -->
<div class="detail-artikel">

    <h3><?= $data['judul'] ?></h3>
    <div class="tanggal">📅 <?= $data['tanggal'] ?></div>

    <!-- Paragraf refleksi -->
    <p><?= $data['isi'] ?></p>

    <!-- Gambar ilustrasi dari folder /img/ -->
    <img src="<?= $data['gambar'] ?>" alt="Ilustrasi <?= $data['judul'] ?>">

    <!-- Kutipan motivasi acak -->
    <div class="kutipan">
        💬 "<?= $kutipan ?>"
    </div>

    <!-- Link referensi tambahan -->
    <p>📖 Referensi: <a href="<?= $data['referensi'] ?>" target="_blank"><?= $data['referensi'] ?></a></p>

    <!-- 3. Navigasi artikel: sebelumnya dan selanjutnya -->
    <div class="nav-artikel">
        <?php if ($id > 0): ?>
            <a href="?id=<?= $id - 1 ?>">← Sebelumnya</a>
        <?php endif; ?>

        <?php if ($id < count($artikel) - 1): ?>
            <a href="?id=<?= $id + 1 ?>">Selanjutnya →</a>
        <?php endif; ?>
    </div>

</div>

<!-- Navigasi antar halaman -->
<div class="nav-halaman">
    <br>
    <a href="tugashal2.php">← Kembali ke Timeline</a>
    <a href="tugashal1.php">Ke Profil</a>
</div>

</body>
</html>