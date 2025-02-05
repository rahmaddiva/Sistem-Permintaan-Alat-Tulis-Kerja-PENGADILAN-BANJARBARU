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
                                <form action="<?= base_url('stok_barang/simpan_stok_barang') ?>" method="post">
                                    <div class="form-group">
                                        <label for="stok">Stok Barang</label>
                                        <!-- tidak boleh ada tanda -  -->
                                        <input type="hidden" name="id_stok_barang"
                                            value="<?= $stok_barang['id_stok_barang'] ?>">
                                        <input type="number" class="form-control" id="stok" name="stok"
                                            placeholder="Masukkan Stok Barang">
                                        <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
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
            <!-- card untuk menampikan tambah stok barang baru -->

        </div>
    </div>
</div>