<?= $this->include('inc/header') ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?= $page_title ?>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Lounge Status</span>
                                    <h4 class="mb-3">
                                        <i data-feather="door"></i>
                                        <i class="fa fa-2x text-success fa-door-open"></i>
                                    </h4>
                                </div>

                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">The lounge open for booking</span>

                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Orders</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="8">0</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-warning">People who ordered</span>
                                <span class="ms-1 text-muted font-size-13"></span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Leads</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="16">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-danger text-warning">People who might be interested</span>
                                <span class="ms-1 text-muted font-size-13"></span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->



                <div class="col-xl-3 col-md-6">

                </div><!-- end col -->
            </div><!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Latest Orders</h4>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Customer's Name</th>
                                        <th>Customer's Number </th>
                                        <th>Customer's Email</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($customers as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row->first_name; ?> <?= $row->last_name; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->start_date; ?></td>
                                            <td><?= $row->end_date; ?></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye">View
                                                    </i></a>
                                                  
                                                <a href="" class="btn btn-sm btn-outline-success"><i class="fa fa-check">Accept
                                                    </i></a>
                                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-mail"></i>Decline</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->


            </div>
            <!-- end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?= $this->include('partials/footer') ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<?php
$db = \Config\Database::connect();
$query   = $db->query('SELECT * FROM packages LIMIT 6');
$results = $query->getResult(); ?>
<?php
foreach ($results as $pack) {
?>
    <div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="shop-area pt-10 pb-100">
                        <!-- Product -->
                        <div class="container">
                            <div class="row">
                                <h4 class="text-center">
                                    Select Products for <?= $pack->name ?>
                                </h4>
                                <br>
                                <br>
                                <br>
                                <?php
                                $db = \Config\Database::connect();
                                $query_prod   = $db->query('SELECT * FROM products');
                                $results_prod = $query_prod->getResult();
                                foreach ($results_prod as $prod) {
                                ?>
                                    <div class="col-md-3 product-item card-container snipcss-PVKSK">
                                        <div class="product-wrapper mb-75">
                                            <div class="product-img mb-25">
                                                <div class="sale">
                                                    <span class="site-button button-sm">
                                                        <label for="">
                                                            Add
                                                            <input type="checkbox" name="" id="">
                                                        </label>

                                                    </span>
                                                </div>
                                                <img width="200" height="200" src="<?php echo base_url() ?><?php echo $prod->img; ?>">
                                            </div>
                                            <div class="product-content">
                                                <h4 class="shop">
                                                    <?= $prod->product_name; ?>
                                                    </a>
                                                </h4>
                                                <div class="product-meta">
                                                    <div class="pro-price">
                                                        <span class="price">
                                                            <del>

                                                            </del>
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">
                                                                        Price: R
                                                                    </span>
                                                                    <?= $prod->price; ?>
                                                                </span>
                                                            </ins>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="shop-add-to-cart">
                                                    <?= $prod->description; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-success text-white" onclick="showRooms()" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>
<script>

</script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>


<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>

</html>