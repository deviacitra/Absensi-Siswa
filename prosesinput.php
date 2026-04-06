<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $catatan = $_POST['catatan'];

    // 1. Simpan ke tabel utama
    $sql = "INSERT INTO tb_absensi (nama_siswa, kelas, tanggal, keterangan, catatan) 
            VALUES ('$nama', '$kelas', '$tanggal', '$keterangan', '$catatan')";
    
    if (mysqli_query($conn, $sql)) {
        // 2. Simpan ke riwayat
        mysqli_query($conn, "INSERT INTO riwayat_absensi (aksi, nama_siswa) VALUES ('Tambah Data', '$nama')");
        
        header("Location: pageview.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>