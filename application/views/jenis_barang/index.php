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
                                <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal"
                                    data-target="#tambahJenisBarang"><i class="fas fa-plus"></i> Tambah Jenis
                                    Barang</button>
                                <!-- Menggunakan data table untuk menampilkan data jenis barang -->
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jenis_barang as $jb): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= $jb['jenis_barang'] ?>
                                                </td>
                                                <td>
                                                    <!-- edit data menggunakan modal -->
                                                    <a href="<?= base_url('jenis_barang/edit/') . $jb['id_jenis_barang'] ?>"
                                                        class="btn btn-info btn-sm"><i class="feather icon-edit"></i>
                                                        Edit</a>
                                                    <a href="<?= base_url('jenis_barang/hapus/') . $jb['id_jenis_barang'] ?>"
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
<div class="modal fade" id="tambahJenisBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                <form action="<?= base_url('jenis_barang/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="jenis_barang">Nama Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                            placeholder="Masukkan Nama Jenis Barang">
                        <?= form_error('jenis_barang', '<small class="text-danger">', '</small>') ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>