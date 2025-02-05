<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Pendataan Barang - Pengadilan Agama Banjarbaru</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->

    <!-- Data Table CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <link rel="icon" href="<?= base_url('assets/') ?>dist/assets/images/logo-pengadilan.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/assets/css/style.css">
    <!-- Toastr CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



</head>

<body class="">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-12 text-center">
                    <img src=" <?= base_url('assets/') ?>dist/assets/images/logo_simba_hijau.png" class="img-fluid"
                        width="500" height="100" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-8 offset-xl-1">
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="col-md-7 col-lg-5 col-xl-8 offset-xl-1">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('login/login') ?>" method="post">
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13 "><i
                                    class="feather icon-user mr-3"></i>Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" />
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23"> <i
                                    class="feather icon-lock mr-3"></i>Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" />
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>