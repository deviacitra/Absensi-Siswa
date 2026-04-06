<?php
include 'config.php';
$data = mysqli_query($conn, "SELECT * FROM riwayat_absensi ORDER BY waktu DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Aktivitas</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; padding: 30px; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,.1); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #6b7280; color: white; }
        .btn { display: inline-block; padding: 8px 14px; background: #4f46e5; color: white; text-decoration: none; border-radius: 6px; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h2>🕒 Riwayat Aktivitas</h2>
    <a href="pageview.php" class="btn"> Kembali ke Data</a>
    <table>
        <tr>
            <th>Aksi</th>
            <th>Nama Siswa</th>
            <th>Waktu</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)) { 
    // Logika warna berdasarkan aksi
    $warna = "";
    if($row['aksi'] == 'Tambah Data') { $warna = "color: green;"; }
    elseif($row['aksi'] == 'Update Data') { $warna = "color: blue;"; }
    elseif($row['aksi'] == 'Hapus Data') { $warna = "color: red;"; }
?>
<tr>
    <td><strong style="<?= $warna ?>"><?= $row['aksi'] ?></strong></td>
    <td><?= $row['nama_siswa'] ?></td>
    <td><?= date('d M Y, H:i', strtotime($row['waktu'])) ?> WIB</td>
</tr>
<?php } ?>
    </table>
</div>
</body>
</html>