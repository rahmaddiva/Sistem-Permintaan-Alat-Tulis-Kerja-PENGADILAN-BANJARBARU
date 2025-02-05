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
                                <a href="<?= base_url('kelola_akun/tambah') ?>" class="btn btn-primary btn-sm mb-4"><i
                                        class="feather icon-plus"></i> Tambah Data</a>
                                <!-- Menggunakan data table untuk menampilkan data akun -->
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Unit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $u): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= $u['nama'] ?>
                                                </td>
                                                <td>
                                                    <?= $u['username'] ?>
                                                </td>

                                                <?php if ($u['level'] == 1): ?>
                                                    <td>Admin</td>
                                                <?php else: ?>
                                                    <td>User</td>
                                                <?php endif; ?>
                                                <td>
                                                    <?= $u['unit'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('kelola_akun/edit/') . $u['id_user'] ?>"
                                                        class="btn btn-warning btn-sm"><i class="feather icon-edit"></i>
                                                        Edit</a>
                                                    <a href="<?= base_url('kelola_akun/delete/') . $u['id_user'] ?>"
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