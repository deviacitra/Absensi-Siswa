<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $catatan = $_POST['catatan'];

    $sql = "UPDATE tb_absensi SET nama_siswa='$nama', kelas='$kelas', tanggal='$tanggal', keterangan='$keterangan', catatan='$catatan' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        // Simpan ke riwayat
        mysqli_query($conn, "INSERT INTO riwayat_absensi (aksi, nama_siswa) VALUES ('Update Data', '$nama')");
        
        header("Location: pageview.php");
        exit();
    } else {
        echo "Update gagal: " . mysqli_error($conn);
    }
}
?>