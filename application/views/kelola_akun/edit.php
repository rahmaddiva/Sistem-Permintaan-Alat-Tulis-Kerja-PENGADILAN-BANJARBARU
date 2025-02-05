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
                                <form action="<?= base_url('kelola_akun/update') ?>" method="post">

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Masukkan Nama" value="<?= $user['nama'] ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Masukkan username" value="<?= $user['username'] ?>">
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Masukkan password" value="<?= $user['password'] ?>">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="level">Level</label>
                                            <select class="form-control" id="level" name="level"
                                                value="<?= set_value('level') ?>">
                                                <option value="<?= set_value('level') ?>"><?php if ($user['level'] == 1) {
                                                      echo "Admin";
                                                  } else {
                                                      echo "User";
                                                  } ?></option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                            <?= form_error('level', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="unit">Unit</label>
                                            <input type="text" class="form-control" id="unit" name="unit"
                                                placeholder="Masukkan unit" value="<?= $user['unit'] ?>">
                                            <?= form_error('unit', '<small class="text-danger">', '</small>') ?>
                                        </div>


                                    </div>
                                    <button type="submit" id="submit_button" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <a href="<?= base_url('kelola_akun') ?>" class="btn btn-danger">Batal</a>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>