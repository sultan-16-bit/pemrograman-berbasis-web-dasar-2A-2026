<?php
// Array asosiatif riwayat belajar (minimal 5 data)
$timeline = [
    ["tahun" => 2022, "kegiatan" => "Masuk SMK"],
    ["tahun" => 2022, "kegiatan" => "Mulai belajar TKJ (Teknik Komputer dan Jaringan)"],
    ["tahun" => 2023, "kegiatan" => "Belajar pemasangan fiber optic"],
    ["tahun" => 2024, "kegiatan" => "Menjalani PKL (Praktik Kerja Lapangan)"],
    ["tahun" => 2024, "kegiatan" => "Membuat proyek PKL"],
    ["tahun" => 2025, "kegiatan" => "Lulus SMK dan masuk kuliah Sistem Informasi"],
    ["tahun" => 2026, "kegiatan" => "Belajar codingan sederhana"],
    ["tahun" => 2026, "kegiatan" => "Belajar HTML,CSS, TAILWIND, JAVASCRIPT"],
];

// Fungsi kustom: memberi penekanan pada tahun tertentu
function highlight($tahun) {
    if ($tahun == 2024) {
        return "color: #7c3aed; font-weight: bold;";
    } elseif ($tahun == 2026) {
        return "color: #eeff00; font-weight: bold;";
    } else {
        return "color: #334155;";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Belajar Coding</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f5f9;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #1e293b;
            margin-bottom: 30px;
        }

        /* Garis vertikal timeline */
        .timeline {
            border-left: 4px solid #6366f1;
            margin: 0 auto;
            max-width: 600px;
            padding-left: 20px;
        }

        /* Satu item timeline */
        .item {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 20px;
            position: relative;
        }

        /* Titik bulat di garis */
        .item::before {
            content: '';
            width: 14px;
            height: 14px;
            background-color: #6366f1;
            border-radius: 50%;
            position: absolute;
            left: -30px;
            top: 16px;
        }

        .tahun {
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        .kegiatan {
            font-size: 1rem;
            color: #1e293b;
        }

        /* Tombol navigasi */
        .nav {
            text-align: center;
            margin-top: 30px;
        }

        .nav a {
            display: inline-block;
            margin: 6px;
            padding: 10px 20px;
            background-color: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .nav a:hover {
            background-color: #4f46e5;
        }
    </style>
</head>
<body>

    <h2>Timeline Perjalanan Belajar Coding</h2>

    <div class="timeline">
        <?php foreach ($timeline as $data): ?>
            <div class="item">
                <div class="tahun" style="<?= highlight($data['tahun']) ?>">
                    <?= $data['tahun'] ?>
                </div>
                <div class="kegiatan">
                    <?= $data['kegiatan'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Navigasi -->
    <div class="nav">
        <a href="tugashal1.php">← Kembali ke Profil</a>
        <a href="tugashal3.php">Menuju Blog Developer →</a>
    </div>

</body>
</html>