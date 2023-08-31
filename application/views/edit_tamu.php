<!DOCTYPE html>
<html>
<head>
    <title>Edit Tamu</title>
    <style>
        /* Gaya CSS sesuai kebutuhan */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input[type="text"],
        form select,
        form input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Tamu</h1>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $tamu->nama ?>">
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin">
            <option value="Laki-laki" <?= ($tamu->jenis_kelamin === 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($tamu->jenis_kelamin === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
        </select>
        
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?= $tamu->alamat ?>">
        
        <label for="kesiapa">Kesiapa:</label>
        <input type="text" name="kesiapa" value="<?= $tamu->kesiapa ?>">
        
        <label for="keperluan">Keperluan:</label>
        <input type="text" name="keperluan" value="<?= $tamu->keperluan ?>">
        
        <label for="asal_instansi">Asal Instansi:</label>
        <input type="text" name="asal_instansi" value="<?= $tamu->asal_instansi ?>">
        
        <label for="waktu">Waktu:</label>
        <input type="datetime-local" name="waktu" value="<?= date('Y-m-d\TH:i', strtotime($tamu->waktu)) ?>">
        
        <label for="ttd">TTD:</label>
        <input type="text" name="ttd" value="<?= $tamu->ttd ?>">
        
        <input type="submit" value="Simpan">
    </form>

    <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        window.location.href = "<?= site_url('beranda') ?>";
    });
</script>
</div>

</body>
</html>
