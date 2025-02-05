<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
    table.page_header {
        width: 1020px;
        border: none;
        background-color: #DDDDFF;
        border-bottom: solid 1mm #AAAADD;
        padding: 2mm
    }

    table.page_footer {
        width: 1020px;
        border: none;
        background-color: #DDDDFF;
        border-top: solid 1mm #AAAADD;
        padding: 2mm
    }
</style>
<!-- Setting Margin header/ kop -->
<!-- Setting CSS Tabel data yang akan ditampilkan -->
<style type="text/css">
    .tabel2 {
        /* tabel sampai pinggir */

        border-collapse: collapse;
        margin-left: 100px;
    }

    .tabel2 th,
    .tabel2 td {
        /* tabel sampai pinggir */
        border: 1px solid black;
        padding: 5px 5px;
        border: 2px solid #000000;

    }

    p {
        margin-left: 30px;
    }

    div.kanan {
        position: absolute;
        bottom: 100px;
        right: 50px;

    }

    .container {
        display: flex;
    }

    .kirir,
    .kanann {
        flex: 1;
        padding: 10px;
        /* Sesuaikan sesuai kebutuhan */
    }

    div.tengah {
        position: absolute;
        bottom: 100px;
        right: 330px;

    }


    div.kiri {
        position: absolute;
        bottom: 100px;
        left: 50px;
    }
</style>

<?php
$bulan = date("F");
$tahun = date("Y");
$tgl = date('d F Y');
?>

<table>
    <tr>
        <th rowspan="3"><img src="<?= base_url('assets/dist/assets/images/logo-pengadilan.png'); ?>" width="100px"
                height="130px"></th>
        <td align="center" style="width: 520px;">
            <font style="font-size: 18px"><b>LAPORAN PEMBELIAN DAN PENGGUNAAN BARANG BIAYA PROSES<br>PENGADILAN AGAMA
                    BANJARBARU<br>BULAN
                    <?= strtoupper($bulan) ?> TAHUN
                    <?= $tahun; ?>
                </b></font>
            <br>Jl. Niaga Desa Nogosari, Kec. Sukosari, Kab.Bondowoso, Jawa Timur 68287 <br>Telp : (0402) 333333
        </td>
    </tr>
</table>
<hr>
<br>
<br>
<br>
<br>


<div class="isi" style="margin: 0 auto;">

    <table class="tabel2">
        <thead style="background-color: #DDDDFF;">
            <tr>
                <th style="width: 5%; text-align: center;"><b>No.</b></th>
                <th style="width: 20%; text-align: center;"><b>Kode Barang</b></th>
                <th style="width: 30%; text-align: center;"><b>Nama Barang</b></th>
                <th style="width: 15%; text-align: center;"><b>Harga Barang</b></th>
                <th style="width: 15%; text-align: center;"><b>Jumlah</b></th>
                <th style="width: 15%; text-align: center;"><b>Terpakai</b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $total_stok = 0;
            $total_keluar = 0;
            foreach ($stok_barang as $data):
                ?>
                <tr>
                    <td style="text-align: center; font-size: 17px;">
                        <?php echo $i; ?>
                    </td>
                    <td style="text-align: center; font-size: 17px;">
                        <?php echo $data['kode_barang']; ?>
                    </td>
                    <td style="text-align: left; font-size: 17px;">
                        <?php echo $data['nama_barang']; ?>
                    </td>
                    <td style="text-align: center; font-size: 17px;">
                        <?php echo $data['harga_barang']; ?>
                    </td>
                    <td style="text-align: center; font-size: 17px;">
                        <?php echo $data['stok']; ?>
                    </td>
                    <td style="text-align: center; font-size: 17px;">
                        <?php echo $data['keluar']; ?>
                    </td>
                </tr>
                <?php
                $i++;
                $total_stok += $data['stok'];
                $total_keluar += $data['keluar'];
            endforeach;
            ?>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Total Stok:</b></td>
                <td style="text-align: center; font-size: 17px;">
                    <?php echo $total_stok; ?>
                </td>
                <td style="text-align: center; font-size: 17px;">
                    <?php echo $total_keluar; ?>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: right;"><b>Hasil:</b></td>
                <td style="text-align: center; font-size: 17px;">
                    <?= $total_stok - $total_keluar; ?> Barang
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <div class="kiri">
        <p>Mengetahui<br>Kuasa Pengguna Anggaran Biaya Proses</p>
        <br>
        <br>
        <br>
        <b>
            <p style="font-weight: bold; ">Hj. Murnianti, SH</p>
        </b>
    </div>
    <div class="kanan">
        <p>Banjarbaru,
            <?= $tgl; ?><br>Bendahara Pengeluaran
        </p>

        <br>
        <br>
        <br>
        <b>
            <p style="font-weight: bold; ">H. Misrani Nafarin, S.Ag.</p>
        </b>
        <br>
        <br>
        <br>
    </div>

</div>