<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tb_absensi WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Update Absensi</title>

<style>
body {
  font-family: Arial, sans-serif;
  background: #f4f6f8;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  background: #ffffff;
  padding: 25px;
  width: 400px;
  border-radius: 10px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="date"],
textarea {
  width: 100%;
  padding: 8px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.radio-group label {
  font-weight: normal;
  margin-right: 10px;
}

button {
  width: 100%;
  padding: 10px;
  background: #4f46e5;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
}
</style>
</head>

<body>

<div class="container">
<h2>Update Absensi</h2>

<form action="prosesupdate.php" method="post">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="form-group">
<label>Nama Siswa</label>
<input type="text" name="nama_siswa" value="<?= $row['nama_siswa']; ?>" required>
</div>

<div class="form-group">
<label>Kelas</label>
<input type="text" name="kelas" value="<?= $row['kelas']; ?>" required>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= $row['tanggal']; ?>" required>
</div>

<div class="form-group radio-group">
<label>Keterangan</label>
<input type="radio" name="keterangan" value="Hadir"
<?= ($row['keterangan']=='Hadir')?'checked':''; ?>> Hadir

<input type="radio" name="keterangan" value="Izin"
<?= ($row['keterangan']=='Izin')?'checked':''; ?>> Izin

<input type="radio" name="keterangan" value="Sakit"
<?= ($row['keterangan']=='Sakit')?'checked':''; ?>> Sakit
</div>

<div class="form-group">
<label>Catatan</label>
<textarea name="catatan" rows="3"><?= $row['catatan']; ?></textarea>
</div>

<button type="submit">Update Data</button>

</form>
</div>

</body>
</html>
