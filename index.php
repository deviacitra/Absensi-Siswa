<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Absensi Siswa</title>
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
    input[type="date"] {
      width: 100%;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
      outline: none;
    }

    input:focus {
      border-color: #4f46e5;
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
    <h2>Form Absensi Siswa</h2>

    <form method="post" action="prosesinput.php">

      <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" name="nama_siswa" placeholder="Masukkan Nama" required>
      </div>

      <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" placeholder="Masukkan Kelas" required>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" required>
      </div>

      <div class="form-group radio-group">
        <label>Keterangan</label>
        <input type="radio" name="keterangan" value="Hadir" required> Hadir
        <input type="radio" name="keterangan" value="Izin"> Izin
        <input type="radio" name="keterangan" value="Sakit"> Sakit
      </div>

      <div class="form-group">
        <label>Catatan</label>
        <input type="text" name="catatan" placeholder="Opsional">
      </div>

      <button type="submit">Kirim Data</button>

    </form>
  </div>

</body>
</html>
