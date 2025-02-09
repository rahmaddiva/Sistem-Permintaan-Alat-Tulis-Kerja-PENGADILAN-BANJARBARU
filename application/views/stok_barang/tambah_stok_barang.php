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
            <div class="col-md-6">
                <div class="card flat-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <form action="<?= base_url('stok_barang/simpan_stok_barang') ?>" method="post">
                                    <div class="form-group">
                                        <label for="stok">Jumlah Barang</label>
                                        <!-- tidak boleh ada tanda -  -->
                                        <input type="hidden" name="id_stok_barang"
                                            value="<?= $stok_barang['id_stok_barang'] ?>">
                                        <input type="number" class="form-control" id="jumlah_barang"
                                            name="jumlah_barang" placeholder="Masukkan Jumlah Barang">
                                        <?= form_error('jumlah_barang', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <button type="submit" id="submit_button" class="btn btn-primary">Simpan</button>
                                    <button type="reset" id="reset_button" class="btn btn-warning">Reset</button>
                                    <a href="<?= base_url('stok_barang') ?>" class="btn btn-danger">Batal</a>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card flat-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="stok">Nama Barang :</label>
                                        <span class="badge badge-primary"><?= $stok_barang['nama_barang'] ?></span>
                                    </div>
                                    <div class="col">
                                        <label for="stok">Kode Barang :</label>
                                        <span class="badge badge-primary"><?= $stok_barang['kode_barang'] ?></span>
                                    </div>

                                    <div class="col">
                                        <label for="stok">Jumlah Barang :</label>
                                        <span class="badge badge-primary"><?= $stok_barang['stok'] ?></span>
                                    </div>
                                    <div class="col">
                                        <label for="stok">Harga Barang :</label>
                                        <span class="badge badge-primary"><?= $stok_barang['harga_barang'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card untuk menampikan jumlah barang yang ada pada tabel tb_tambah_barang -->
            <div class="col-md-12">
                <div class="card flat-card">
                    <div class="card-header">
                        <h5>Jumlah Barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <!-- cetak nota tambah barang -->
                                <a href="<?= base_url('stok_barang/cetak_nota_tambah_barang/' . $stok_barang['id_stok_barang']) ?>"
                                    class="btn btn-primary mb-3" target="_blank"><i class="fa fa-print mr-2"></i>  Cetak
                                    Nota</a>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Nama User</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($jumlah_barang as $jb): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $jb['nama_barang'] ?></td>
                                                    <td><?= $jb['jumlah_barang'] ?></td>
                                                    <td><?= $jb['nama'] ?></td>
                                                    <td><?= $jb['tanggal'] ?></td>
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
</div>