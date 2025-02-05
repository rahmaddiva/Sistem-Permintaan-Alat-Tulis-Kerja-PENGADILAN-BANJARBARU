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
                                <?php foreach ($satuan as $s) { ?>
                                    <h5 class="m-0">Edit Satuan Barang</h5>
                                    <hr>
                                    <form action="<?= base_url('satuan/edit_save') ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama_satuan">Nama Satuan Barang</label>
                                            <input type="hidden" name="id_satuan" value="<?= $s['id_satuan'] ?>">
                                            <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                                placeholder="Masukkan Nama Satuan Barang" value="<?= $s['nama_satuan'] ?>">
                                            <?= form_error('nama_satuan', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        <a href="<?= base_url('satuan') ?>" class="btn btn-danger btn-sm">Batal</a>
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