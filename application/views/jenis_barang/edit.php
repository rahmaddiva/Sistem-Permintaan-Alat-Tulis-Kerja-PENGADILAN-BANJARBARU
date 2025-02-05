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
                                <!-- form simpan edit  -->
                                <?php foreach ($jenis_barang as $jb) { ?>
                                    <h5 class="m-0">Edit Jenis Barang</h5>
                                    <hr>
                                    <form action="<?= base_url('jenis_barang/edit_save') ?>" method="post">
                                        <div class="form-group">
                                            <label for="jenis_barang">Nama Jenis Barang</label>
                                            <input type="hidden" name="id_jenis_barang"
                                                value="<?= $jb['id_jenis_barang'] ?>">
                                            <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                                                placeholder="Masukkan Nama Jenis Barang" value="<?= $jb['jenis_barang'] ?>">
                                            <?= form_error('jenis_barang', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <a href="<?= base_url('jenis_barang') ?>" class="btn btn-danger btn-sm">Batal</a>
                                    </form>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>