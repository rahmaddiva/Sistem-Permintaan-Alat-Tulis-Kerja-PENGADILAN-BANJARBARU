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
                                <!-- form untuk filter rentang tanggal -->
                                <form method="get" action="<?= base_url('persetujuan/cetak') ?>">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="start_date">Tanggal Mulai:</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Tanggal Selesai:</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mb-4">
                                        <i class="feather icon-printer"></i> Cetak Data Permintaan
                                    </button>
                                </form>
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
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($histori as $h): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= date('d-m-Y', strtotime($h['tgl_permintaan'])) ?></td>
                                                <td><?= $h['nama_barang'] ?></td>
                                                <td><?= $h['jumlah'] ?></td>
                                                <td><?= $h['nama'] ?></td>
                                                <td><?= $h['unit'] ?></td>
                                                <td>
                                                    <?php if ($h['status'] == 1): ?>
                                                        <span class="badge badge-warning">Menunggu Persetujuan</span>
                                                    <?php elseif ($h['status'] == 2): ?>
                                                        <span class="badge badge-success">Disetujui</span>
                                                    <?php elseif ($h['status'] == 3): ?>
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