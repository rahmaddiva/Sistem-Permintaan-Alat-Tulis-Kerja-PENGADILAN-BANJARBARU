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
            <div class="col-md-5">
                <div class="card flat-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <form action="<?= base_url('permintaan_barang/simpan') ?>" method="post">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="id_stok_barang">Nama Barang</label>
                                            <select class="form-control" id="id_stok_barang" name="id_stok_barang">
                                                <option value="">-- Pilih Nama Barang --</option>
                                                <?php foreach ($stok_barang as $sb): ?>
                                                    <option value="<?= $sb['id_stok_barang'] ?>"
                                                        data-kode="<?= $sb['kode_barang'] ?>"
                                                        data-jenis="<?= $sb['jenis_barang'] ?>">
                                                        <?= $sb['nama_barang'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_jenis_barang', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="kode_barang">Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_barang" readonly>
                                        </div>

                                        <!-- jquery untuk menampilkan kode barang secara otomatis ketika memilih nama barang -->
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            // Ketika pilihan barang berubah
                                            $('#id_stok_barang').change(function () {
                                                var selectedOption = $(this).find('option:selected');
                                                var kodeBarang = selectedOption.data('kode');
                                                var jenisBarang = selectedOption.data('jenis');

                                                // Set nilai input kode_barang dan jenis_barang
                                                $('#kode_barang').val(kodeBarang);
                                                $('#jenis_barang').val(jenisBarang);
                                            });
                                        </script>

                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="jenis_barang">Jenis Barang</label>
                                            <input type="text" class="form-control" id="jenis_barang"
                                                name="id_jenis_barang" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="jumlah">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="0">
                                        </div>
                                        <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>

                                    </div>
                                    <button type="submit" id="submit_button"
                                        class="btn btn-primary mr-2">Simpan</button>
                                    <button type="reset" id="reset_button" class="btn btn-warning mr-2">Reset</button>
                                    <a href="<?= base_url('permintaan_barang') ?>" class="btn btn-danger">Batal</a>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <div class="card flat-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <!-- table -->
                            <div class="col-md-12">
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($stok_barang_sementara as $sbs): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= $sbs['kode_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sbs['nama_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sbs['jenis_barang'] ?>
                                                </td>
                                                <td>
                                                    <?= $sbs['jumlah'] ?>
                                                </td>
                                                <td>
                                                    <!-- tombol hapus -->
                                                    <a href="<?= base_url('permintaan_barang/hapus/') . $sbs['id_permintaan'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                            class="feather icon-trash"></i></a>

                                                    <!-- tombol ajukan barang  -->
                                                    <a href="<?= base_url('permintaan_barang/ajukan/') . $sbs['id_permintaan'] ?>"
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Yakin ingin mengajukan data ini?')"><i
                                                            class="feather icon-check"></i></a>

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