<!DOCTYPE html>
<html lang="en">

<head>

   

    <?= $this->include('partials/head-css') ?>
<style>
    body[data-layout-mode=dark] {
    background-color: #1e201f!important;
    color: #ced4da;
}

</style>
<script>
        $(function() {

            <?php if (session()->has("success_added")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?= session("success_added") ?>'
                })
        });
        <?php } ?>
        $(function() {

            <?php if (session()->has("error")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?= session("error") ?>'
                })
            <?php } ?>
        });
       
    </script>
</head>

<body data-layout-mode="dark" data-topbar="dark" data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->