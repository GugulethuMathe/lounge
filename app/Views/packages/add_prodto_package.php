<?= $this->include('inc/header') ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?= $page_title ?>


            <div class="row">

                <?php
                $package_id = "";
                foreach ($packages as $row) {
                    $package_id = $row->id;

                    echo $package_id;
                }

                ?>
                <h1><?= $package_id; ?></h1>
            </div>
            <!-- end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?= $this->include('inc/footer') ?>



    <script>