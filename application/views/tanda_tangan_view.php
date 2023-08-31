<!DOCTYPE html>
<html>
<head>
    <title>Data Tanda Tangan</title>
    <style>
        /* Gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            font-size: 24px;
            margin: 0 0 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th, td {
            border-bottom: 1px solid #ddd;
        }

        th:last-child, td:last-child {
            border-right: none;
        }

        th:first-child, td:first-child {
            border-left: none;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Lengkap</h2>
    <table>
        <tr>
            <th>ID Tamu</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kesiapa</th>
            <th>Keperluan</th>
            <th>Asal Instansi</th>
            <th>Waktu</th>
            <th>Tanda Tangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($tanda_tangan as $row) { ?>
            <tr>
                <td><?php echo $row['id_tamu']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['kesiapa']; ?></td>
                <td><?php echo $row['keperluan']; ?></td>
                <td><?php echo $row['asal_instansi']; ?></td>
                <td><?php echo $row['waktu']; ?></td>
                <td><img src="<?php echo base_url($row['ttd']); ?>" alt="Tanda Tangan"></td>
                <td><a href="<?php echo site_url('tamu/edit/'.$row['id_tamu']); ?>" class="btn">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
