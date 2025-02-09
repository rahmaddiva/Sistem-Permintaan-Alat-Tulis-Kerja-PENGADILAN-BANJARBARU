<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .info-section {
            margin-bottom: 20px;
        }

        .info-section p {
            margin: 5px 0;
        }

        .signature-section {
            text-align: right;
            margin-top: 50px;
        }

        .signature-section p {
            margin: 5px 0;
        }

        .signature-box {
            height: 80px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Nota Tambah Stok Barang</h1>

    <div class="info-section">
        <p><strong>Kode Barang:</strong> <?= $stok_barang['kode_barang'] ?></p>
        <p><strong>Nama Barang:</strong> <?= $stok_barang['nama_barang'] ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang Ditambah</th>
                <th>User Penambah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tambah_stok_barang as $data): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_barang'] ?></td>
                    <td><?= $data['jumlah_barang'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= date('d M Y H:i:s', strtotime($data['tanggal'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="signature-section">
        <p>Mengetahui,</p>
        <p>Penanggung Jawab Gudang</p>
        <div class="signature-box"></div>
        <p><strong><?= date('d M Y') ?></strong></p>
    </div>
</body>

</html>