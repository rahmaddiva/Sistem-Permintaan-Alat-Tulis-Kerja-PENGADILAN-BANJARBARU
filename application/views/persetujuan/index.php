<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">
                                <?= $title ?>
                            </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">
                                    <?= $title ?>
                                </a></li>
                        </ul>
                    </div>
                    <!-- toast -->
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="col-md-6 mt-4">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <div class="col-md-12">
                <div class="card flat-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <!-- Menggunakan data table untuk menampilkan data jenis barang -->
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Permintaan Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Nama</th>
                                            <th>Unit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($persetujuan as $p): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= date('d-m-Y', strtotime($p['tgl_permintaan'])) ?>
                                                </td>
                                                <td>
                                                    <?= $p['nama_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $p['jumlah'] ?>
                                                </td>

                                                <td>
                                                    <?= $p['nama'] ?>
                                                </td>
                                                <td>
                                                    <?= $p['unit'] ?>
                                                </td>
                                                <td>
                                                    <!-- tombol disetuju dan ditolak -->
                                                    <a href="<?= base_url('persetujuan/setujui/') . $p['id_permintaan'] ?>"
                                                        class="btn btn-success btn-sm"
                                                        Onclick="return confirm('Apakah Anda Yakin Ingin Menyetujui Permintaan Barang Ini?')">Setujui</a>
                                                    <a href="<?= base_url('persetujuan/tolak/') . $p['id_permintaan'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        Onclick="return confirm('Apakah Anda Yakin Ingin Menolak Permintaan Barang Ini?')">Tolak</a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>