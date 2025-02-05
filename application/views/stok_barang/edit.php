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
                                <form action="<?= base_url('stok_barang/update') ?>" method="post">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="jenis_barang">Jenis Barang</label>
                                            <input type="hidden" name="id_stok_barang"
                                                value="<?= $stok_barang['id_stok_barang'] ?>">
                                            <select class="form-control" id="jenis_barang" name="id_jenis_barang">
                                                <option value="<?= $stok_barang['id_jenis_barang'] ?>">
                                                    <?= $stok_barang['jenis_barang'] ?>
                                                    <?php foreach ($jenis_barang as $jb): ?>
                                                    <option value="<?= $jb['id_jenis_barang'] ?>">
                                                        <?= $jb['jenis_barang'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_jenis_barang', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="kode_barang">Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                                readonly value="<?= $stok_barang['kode_barang'] ?>">
                                            <?= form_error('kode_barang', '<small class="text-danger">', '</small>') ?>

                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                const jenisBarangSelect = document.getElementById("jenis_barang");
                                                const kodeBarangInput = document.getElementById("kode_barang");
                                                const submitButton
                                                    = document.getElementById("submit_button");
                                                // jika diperlukan saja
                                                // const resetButton = document.getElementById("reset_button");

                                                let nomorUrutPerJenisBarang = JSON.parse(localStorage.getItem("nomorUrutPerJenisBarang")) || {};

                                                jenisBarangSelect.addEventListener("change", function () {
                                                    const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
                                                    const jenisBarangId = selectedOption.value;

                                                    if (!nomorUrutPerJenisBarang[jenisBarangId]) {
                                                        nomorUrutPerJenisBarang[jenisBarangId] = 1;
                                                    }

                                                    const newKodeBarang = generateNewKodeBarang(jenisBarangId, nomorUrutPerJenisBarang[jenisBarangId]);

                                                    kodeBarangInput.value = newKodeBarang;
                                                });

                                                submitButton.addEventListener("click", function () {
                                                    const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
                                                    const jenisBarangId = selectedOption.value;

                                                    nomorUrutPerJenisBarang[jenisBarangId]++; // Tambahkan nomor urut untuk jenis barang ini

                                                    // Simpan data nomor urut ke local storage
                                                    localStorage.setItem("nomorUrutPerJenisBarang", JSON.stringify(nomorUrutPerJenisBarang));
                                                });

                                                resetButton.addEventListener("click", function () {
                                                    const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
                                                    const jenisBarangId = selectedOption.value;

                                                    nomorUrutPerJenisBarang[jenisBarangId] = 1; // Mengatur ulang nomor urut untuk jenis barang ini

                                                    // Simpan data nomor urut ke local storage
                                                    localStorage.setItem("nomorUrutPerJenisBarang", JSON.stringify(nomorUrutPerJenisBarang));

                                                    // Update kode barang yang ditampilkan
                                                    kodeBarangInput.value = generateNewKodeBarang(jenisBarangId, nomorUrutPerJenisBarang[jenisBarangId]);
                                                });

                                                function generateNewKodeBarang(jenisBarangId, nomorUrut) {
                                                    const jenisBarang = jenisBarangSelect.options[jenisBarangSelect.selectedIndex].text;
                                                    const jenisBarangSplit = jenisBarang.split(" ");
                                                    const jenisBarangSingkat = jenisBarangSplit[0].charAt(0) + jenisBarangSplit[1].charAt(0);

                                                    const formattedNomorUrut = String(nomorUrut).padStart(3, "0");

                                                    const kodeBarang = jenisBarangSingkat + formattedNomorUrut;

                                                    return kodeBarang;
                                                }
                                            });

                                        </script>

                                    </div>


                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                                placeholder="Masukkan Nama Barang"
                                                value="<?= $stok_barang['nama_barang'] ?>">
                                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="nama_barang">Satuan Barang</label>
                                            <select class="form-control" id="satuan_barang" name="id_satuan">
                                                <option value="<?= $stok_barang['id_satuan'] ?>">
                                                    <?= $stok_barang['nama_satuan'] ?>
                                                    <?php foreach ($satuan_barang as $sb): ?>
                                                    <option value="<?= $sb['id_satuan'] ?>">
                                                        <?= $sb['nama_satuan'] ?>
                                                    </option>
                                                <?php endforeach; ?>

                                            </select>
                                            <?= form_error('id_satuan', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="harga_barang">Harga Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" id="harga_barang"
                                                name="harga_barang" placeholder="Masukkan Harga Barang"
                                                value="<?= $stok_barang['harga_barang'] ?>">
                                        </div>
                                        <?= form_error('harga_barang', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <!-- Membuat Rp otomatis  -->
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const hargaBarangInput = document.getElementById("harga_barang");

                                            hargaBarangInput.addEventListener("input", function () {
                                                let inputVal = hargaBarangInput.value;

                                                // Hapus karakter selain angka dan titik
                                                inputVal = inputVal.replace(/[^\d.]/g, "");

                                                // Ubah string "Rp." dan spasi menjadi kosong
                                                inputVal = inputVal.replace(/Rp\. /g, "");

                                                // Hilangkan semua titik di dalam angka
                                                inputVal = inputVal.replace(/\./g, "");

                                                // Format angka sebagai mata uang
                                                const formattedInput = formatAsCurrency(inputVal);

                                                hargaBarangInput.value = formattedInput;
                                            });

                                            // Fungsi untuk memformat angka sebagai mata uang Indonesia
                                            function formatAsCurrency(value) {
                                                const formatter = new Intl.NumberFormat("id-ID", {
                                                    style: "currency",
                                                    currency: "IDR",
                                                    minimumFractionDigits: 0,
                                                    maximumFractionDigits: 0
                                                });
                                                return formatter.format(parseFloat(value));
                                            }
                                        });
                                    </script>


                                    <div class="form-group">
                                        <label for="stok">Stok Barang</label>
                                        <!-- tidak boleh ada tanda -  -->
                                        <input type="number" class="form-control" id="stok" name="stok"
                                            placeholder="Masukkan Stok Barang" value="<?= $stok_barang['stok'] ?>">
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
        </div>
    </div>
</div>
<!--  
document.addEventListener("DOMContentLoaded", function () {
const jenisBarangSelect = document.getElementById("jenis_barang");
const kodeBarangInput = document.getElementById("kode_barang");
const submitButton
= document.getElementById("submit_button");
// jika diperlukan saja
// const resetButton = document.getElementById("reset_button");

let nomorUrutPerJenisBarang = JSON.parse(localStorage.getItem("nomorUrutPerJenisBarang")) || {};

jenisBarangSelect.addEventListener("change", function () {
const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
const jenisBarangId = selectedOption.value;

if (!nomorUrutPerJenisBarang[jenisBarangId]) {
nomorUrutPerJenisBarang[jenisBarangId] = 1;
}

const newKodeBarang = generateNewKodeBarang(jenisBarangId, nomorUrutPerJenisBarang[jenisBarangId]);

kodeBarangInput.value = newKodeBarang;
});

submitButton.addEventListener("click", function () {
const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
const jenisBarangId = selectedOption.value;

nomorUrutPerJenisBarang[jenisBarangId]++; // Tambahkan nomor urut untuk jenis barang ini

// Simpan data nomor urut ke local storage
localStorage.setItem("nomorUrutPerJenisBarang", JSON.stringify(nomorUrutPerJenisBarang));
});

resetButton.addEventListener("click", function () {
const selectedOption = jenisBarangSelect.options[jenisBarangSelect.selectedIndex];
const jenisBarangId = selectedOption.value;

nomorUrutPerJenisBarang[jenisBarangId] = 1; // Mengatur ulang nomor urut untuk jenis barang ini

// Simpan data nomor urut ke local storage
localStorage.setItem("nomorUrutPerJenisBarang", JSON.stringify(nomorUrutPerJenisBarang));

// Update kode barang yang ditampilkan
kodeBarangInput.value = generateNewKodeBarang(jenisBarangId, nomorUrutPerJenisBarang[jenisBarangId]);
});

function generateNewKodeBarang(jenisBarangId, nomorUrut) {
const jenisBarang = jenisBarangSelect.options[jenisBarangSelect.selectedIndex].text;
const jenisBarangSplit = jenisBarang.split(" ");
const jenisBarangSingkat = jenisBarangSplit[0].charAt(0) + jenisBarangSplit[1].charAt(0);

const formattedNomorUrut = String(nomorUrut).padStart(3, "0");

const kodeBarang = jenisBarangSingkat + formattedNomorUrut;

return kodeBarang;
}
});

-->