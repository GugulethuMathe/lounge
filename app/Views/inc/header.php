<!DOCTYPE html>
<html lang="en">

<head>



    <?= $this->include('partials/head-css') ?>
    <style>
        body[data-layout-mode=dark] {
            background-color: #1e201f !important;
            color: #ced4da;
        }
        img.pro-img {
    width: 100px;
    height: 306px;
}

    </style>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    </script>
    
</head>

<body data-layout-mode="dark" data-topbar="dark" data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->