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
                                <a href="<?= base_url('stok_barang/tambah') ?>" class="btn btn-primary btn-sm mb-4"> <i
                                        class="feather icon-plus"></i> Tambah Data</a>

                                <!-- tombol cetak -->
                                <a href="<?= base_url('stok_barang/cetak') ?>" class="btn btn-success btn-sm mb-4"> <i
                                        class="feather icon-printer"></i> Cetak Data</a>

                                <!-- Menggunakan data table untuk menampilkan data jenis barang -->
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Stok</th>
                                            <th>Keluar</th>

                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($stok_barang as $sk): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= $sk['kode_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sk['nama_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sk['harga_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sk['stok'] ?>
                                                </td>
                                                <td>
                                                    <?= $sk['keluar'] ?>
                                                </td>

                                                <td>
                                                    <?= $sk['keterangan'] ?>
                                                </td>
                                                <td>
                                                    <!-- button tambah barang -->
                                                    <a href="<?= base_url('stok_barang/tambah_stok_barang/') . $sk['id_stok_barang'] ?>"
                                                        class="btn btn-success btn-sm"><i class="feather icon-plus"></i>
                                                        Stok</a>
                                                    <!-- edit data menggunakan modal -->
                                                    <a href="<?= base_url('stok_barang/edit/') . $sk['id_stok_barang'] ?>"
                                                        class="btn btn-info btn-sm"><i class="feather icon-edit"></i>
                                                        Edit</a>
                                                    <a href="<?= base_url('stok_barang/hapus/') . $sk['id_stok_barang'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                            class="feather icon-trash"></i> Hapus</a>
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
<!-- Modal Tambah  -->
<div class="modal fade" id="tambahStokBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('stok_barang/tambah') ?>" method="post">



                    <div class="form-group">
                        <label for="jenis_barang">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('jenis_barang', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label for="jenis_barang">Satuan Barang</label>
                        <select class="form-control" id="satuan_barang" name="satuan_barang">
                            <option value="">-- Pilih Satuan Barang --</option>
                    </div>

                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('kode_barang', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('harga_barang', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="text" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>