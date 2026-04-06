<?php
include "config.php";
$sql = "SELECT * FROM tb_absensi ORDER BY tanggal DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; padding: 30px; }
        .container { max-width: 1000px; margin: auto; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,.1); }
        h2 { text-align: center; margin-bottom: 15px; }
        .btn { display: inline-block; padding: 8px 14px; background: #4f46e5; color: white; text-decoration: none; border-radius: 6px; font-size: 14px; margin-bottom: 15px; margin-right: 5px; }
        .btn-history { background: #6b7280; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
        th { background: #4f46e5; color: white; }
        .badge { padding: 4px 10px; border-radius: 12px; color: white; font-size: 12px; font-weight: bold; }
        .hadir { background: #16a34a; }
        .izin { background: #f59e0b; }
        .sakit { background: #dc2626; }
        .hapus { color: red; }
        .update { color: green; text-decoration: none; font-size: 13px; }
        .filter-container { display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; background: #f9fafb; padding: 15px; border-radius: 8px; }
        .filter-container input, .filter-container select { padding: 8px; border-radius: 5px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Absensi Siswa</h2>
    
    <div style="display: flex; justify-content: space-between;">
        <a href="index.php" class="btn">+ Tambah Data</a>
        <a href="riwayat.php" class="btn btn-history">🕒 Lihat Riwayat</a>
    </div>

    <div class="filter-container">
        <input type="text" id="searchNama" placeholder="🔍 Cari nama..." onkeyup="filterData()">
        
        <select id="filterKelas" onchange="filterData()">
            <option value="">Semua Kelas</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI TKJ 2">XI TKJ 2</option>
            <option value="XI MP 2">XI MP 2</option>
            <option value="XI AK 2">XI AK 2</option>
            <option value="XI LP 2">XI LP 2</option>
            <option value="X RPL 1">X RPL 1</option>
        </select>

        <select id="filterKet" onchange="filterData()">
            <option value="">Semua Status</option>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
        </select>

        <input type="date" id="filterTanggal" onchange="filterData()">
    </div>

    <div class="table-wrap">
        <table id="tabelAbsensi">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { 
                    $ketClass = strtolower($row['keterangan']);
                ?>
                <tr>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td><?= $row['kelas'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><span class="badge <?= $ketClass ?>"><?= $row['keterangan'] ?></span></td>
                    <td><?= $row['catatan'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="update">Update</a> |
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function filterData() {
    let nama = document.getElementById("searchNama").value.toLowerCase();
    let kelas = document.getElementById("filterKelas").value;
    let ket = document.getElementById("filterKet").value;
    let tanggal = document.getElementById("filterTanggal").value;

    let table = document.getElementById("tabelAbsensi");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let tdNama = tr[i].getElementsByTagName("td")[0];
        let tdKelas = tr[i].getElementsByTagName("td")[1];
        let tdTanggal = tr[i].getElementsByTagName("td")[2];
        let tdKet = tr[i].getElementsByTagName("td")[3];

        if (tdNama) {
            let txtNama = tdNama.innerText.toLowerCase();
            let txtKelas = tdKelas.innerText;
            let txtTanggal = tdTanggal.innerText;
            let txtKet = tdKet.innerText;

            let cocok = 
                txtNama.includes(nama) &&
                (kelas === "" || txtKelas === kelas) &&
                (ket === "" || txtKet === ket) &&
                (tanggal === "" || txtTanggal === tanggal);

            tr[i].style.display = cocok ? "" : "none";
        }
    }
}
</script>

</body>
</html>