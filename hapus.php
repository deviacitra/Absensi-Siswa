<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama siswa dulu sebelum dihapus untuk keperluan log riwayat
    $ambil_nama = mysqli_query($conn, "SELECT nama_siswa FROM tb_absensi WHERE id='$id'");
    $data = mysqli_fetch_assoc($ambil_nama);
    $nama = $data['nama_siswa'];

    // Hapus data
    $sql = "DELETE FROM tb_absensi WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        // Simpan ke riwayat
        mysqli_query($conn, "INSERT INTO riwayat_absensi (aksi, nama_siswa) VALUES ('Hapus Data', '$nama')");
        
        header("Location: pageview.php");
        exit();
    } else {
        echo "Gagal hapus: " . mysqli_error($conn);
    }
}
?>