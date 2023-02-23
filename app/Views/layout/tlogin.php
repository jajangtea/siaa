<!-- Haeder -->
<?= $this->include('layout/header') ?>
<!--/Haeder -->

<body class="hold-transition login-page">
    <?= $this->renderSection("content") ?>
    <!-- Global Script -->
    <?= $this->include('layout/globalscript') ?>
    <!--/Global Script -->

    <!-- PageScript-->
    <?= $this->renderSection("pageScript") ?>
    <!-- /PageScript-->
</body>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= 'ADEL CCG - ' . esc($title) ?></title>
    <meta name="description" content="Garment Factory Process">
    <meta name="keyword" content="garment,factory,khonkaen,ocomshop">
    <meta name="author" content="ocomshop">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= csrf_meta() ?>

    <!-- Google Font: Thai Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
    <!--<link rel="stylesheet" href="<?php /* echo base_url('asset/css/rtl/adminlte.rtl.min.css') */ ?>"> -->

    <!-- SweetAlert2 Bootstrap or Dark -->
    <link rel="stylesheet" href="<?= base_url('asset/css/sweetalert2-dark.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/StateRestore-1.1.1/css/stateRestore.bootstrap5.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('asset/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
</head>

<body class="hold-transition login-page">
    <?= $this->renderSection("content") ?>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>