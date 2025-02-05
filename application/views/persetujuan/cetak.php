<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        form input[type="date"] {
            padding: 8px;
            margin: 0 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form button {
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            font-size: 12px;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>


        <?php if (!empty($histori)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Permintaan</th>
                        <th>Nama</th>
                        <th>Unit</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Jenis Barang</th>
                        <th>Tanggal Permintaan</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($histori as $item): ?>
                        <tr>
                            <td><?php echo $item['id_permintaan']; ?></td>
                            <td><?php echo $item['nama']; ?></td>
                            <td><?php echo $item['unit']; ?></td>
                            <td><?php echo $item['nama_barang']; ?></td>
                            <td><?php echo $item['kode_barang']; ?></td>
                            <td><?php echo $item['jenis_barang']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($item['tgl_permintaan'])); ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data histori permintaan barang.</p>
        <?php endif; ?>
    </div>
</body>

</html>