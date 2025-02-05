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
                                <a href="<?= base_url('permintaan_barang/tambah') ?>"
                                    class="btn btn-primary btn-sm mb-4"><i class="feather icon-plus"></i> Tambah Data
                                    Permintaan </a>
                                <!-- Menggunakan data table untuk menampilkan data jenis barang -->
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Permintaan Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Disetujui</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($permintaan as $p): ?>
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
                                                    <!-- menampilkan tanggal disetujui -->
                                                    <?php if ($p['tgl_disetujui'] == NULL): ?>
                                                        <span class="badge badge-warning">-</span>
                                                    <?php else: ?>
                                                        <?= date('d-m-Y', strtotime($p['tgl_disetujui'])) ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <!-- badge permintaan berhasil disetujui atau tidak -->
                                                    <?php if ($p['status'] == 1): ?>
                                                        <span class="badge badge-warning">Belum Disetujui</span>
                                                    <?php elseif ($p['status'] == 2): ?>
                                                        <span class="badge badge-success">Disetujui</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    <?php endif; ?>
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