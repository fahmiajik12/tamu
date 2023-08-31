<!DOCTYPE html>
<html>
<head>
    <title>Form Tamu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            text-align: left;
        }
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
        }
        input[type="file"] {
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 10px;
            color: #00A859;
        }
        .error {
            margin-top: 10px;
            color: #FF3D3D;
        }
        .form-group {
            display: flex;
            align-items: center;
        }
        .form-group label {
            flex: 1;
            margin-right: 10px;
        }
        .form-group .input-group {
            flex: 2;
            display: flex;
        }
        .form-group .input-group input[type="datetime-local"],
        .form-group .input-group input[type="file"] {
            flex: 1;
        }
        .signatureCanvas {
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Form Tamu</h2>

    <?php if(isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } elseif(isset($success)) { ?>
        <div class="message"><?php echo $success; ?></div>
        <script>
            var confirmation = confirm("Data berhasil disimpan. Klik OK untuk kembali ke halaman utama.");
            if (confirmation) {
                window.location.href = '<?php echo base_url(); ?>'; // Ganti dengan URL halaman utama Anda
            }
        </script>
    <?php } ?>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('tamu/submit'); ?>

    <!-- Bagian form dimulai di sini -->
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required></textarea>

    <label for="kesiapa">Kesiapa:</label>
    <input type="text" name="kesiapa" required>

    <label for="keperluan">Keperluan:</label>
    <textarea name="keperluan" required></textarea>

    <label for="asal_instansi">Asal Instansi:</label>
    <input type="text" name="asal_instansi" required> <!-- Tambahkan input untuk "Asal Instansi" -->

    <div class="form-group">
    <label for="waktu">Waktu:</label>
    <div class="input-group">
        <?php
            $currentDateTime = date('Y-m-d\ H:i:s');
            echo '<input type="text" name="waktu" value="' . $currentDateTime . '" readonly>';
        ?>
    </div>
    </div>

    <div class="form-group">
        <label for="ttd">Tanda Tangan:</label>
        <div class="input-group">
            <canvas id="signatureCanvas" class="signatureCanvas" width="300" height="150"></canvas>
            <input type="hidden" name="signature" id="signatureInput">
        </div>
    </div>
    <br>
    <input type="submit" value="Submit">
    <?php echo form_close(); ?>
</div>

<script>
    const canvas = document.getElementById('signatureCanvas');
    const ctx = canvas.getContext('2d');
    let drawing = false;

    canvas.addEventListener('mousedown', () => {
        drawing = true;
        ctx.beginPath();
    });

    canvas.addEventListener('mousemove', (event) => {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        ctx.lineTo(x, y);
        ctx.stroke();
    });

    canvas.addEventListener('mouseup', () => {
        drawing = false;
        document.getElementById('signatureInput').value = canvas.toDataURL();
    });
</script>

</body>
</html>