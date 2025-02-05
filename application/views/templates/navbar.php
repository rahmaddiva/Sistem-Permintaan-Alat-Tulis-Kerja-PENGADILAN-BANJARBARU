<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">


            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url('assets/') ?>dist/assets/images/logo-pengadilan.png"
                        alt="User-Profile-Image">
                    <div class="user-details">
                        <span>
                            <?= $this->session->userdata('username') ?>
                        </span>
                        <div id="more-details">
                            <?= $this->session->userdata('unit') ?>
                        </div>
                    </div>
                </div>

            </div>

            <?php if ($this->session->userdata('level') == '1'): ?>


                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Home</label>
                    </li>
                    <li class="nav-item">
                        <a href=" <?= base_url('dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Master Data</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('satuan') ?>">Kelola Satuan Barang</a></li>
                            <li><a href="<?= base_url('jenis_barang') ?>">Kelola Jenis Barang</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Data Stok Barang</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('stok_barang') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-package"></i></span><span class="pcoded-mtext">Kelola Stok
                                Barang</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Penerimaan
                                Permintaan</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('persetujuan') ?>">Persetujuan Barang</a></li>
                            <li><a href="<?= base_url('persetujuan/histori') ?>">Histori </a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-menu-caption">
                        <label>Data Akun</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kelola_akun') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Kelola Akun</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>
                </ul>

            <?php else: ?>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Home</label>
                    </li>
                    <li class="nav-item">
                        <a href=" <?= base_url('dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('permintaan_barang') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Permintaan
                                Barang</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>
                </ul>

            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="<?= base_url('assets/') ?>dist/assets/images/logo-simba.png" alt="" class="logo" width="190"
                height="50">
            <img src="<?= base_url('assets/') ?>dist/assets/images/logo-simba.png" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>


        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="<?= base_url('assets/') ?>dist/assets/images/user/avatar-1.jpg" class="img-radius"
                                alt="User-Profile-Image">
                            <span>
                                <?= $this->session->userdata('username') ?>
                            </span>
                            <a href="<?= base_url('login/logout') ?>" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>
<!-- [ Header ] end -->