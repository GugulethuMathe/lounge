<?= $this->include('inc/header') ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<script>
    $(function() {

        <?php if (session()->has("success_approve")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Approved',
            })
        <?php } ?>

    });
</script>
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
                                    <?php $db = \Config\Database::connect();
                                    // Check if there is a record with the status 'completed'
                                    $result = $db->table('customers')->where('event_status', 'Approved')->select('*');
                                    $numRows = $result->countAllResults();



                                    // Check the number of rows returned by the query
                                    if ($numRows > 0) {
                                        // Print "exist" if there is at least one row
                                    ?> <h4 class="mb-3">
                                            <i data-feather="door"></i>
                                            <i class="fa fa-2x text-danger fa-door-closed"></i>
                                        </h4>
                                        <div class="text-nowrap">

                                            <span class="badge bg-soft-white text-danger">The lounge is closed check out the customer first to open it</span>

                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <h4 class="mb-3">
                                            <i data-feather="door"></i>
                                            <i class="fa fa-2x text-success fa-door-open"></i>
                                        </h4>
                                        <div class="text-nowrap">
                                            <span class="badge bg-soft-success text-success">The lounge open for booking</span>


                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>

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
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">New Orders</span>
                                    <?php 
                                     $numOrders = $db->table('customers')->where('event_status', 'Approved')->countAllResults();

                                     // Print the number of orders
                                     ?>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="<?php echo $numOrders;?>">0</span>
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
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">New Orders</span>
                                    <?php 
                                     $numOrders = $db->table('customers')->where('event_status', 'Approved')->countAllResults();

                                     // Print the number of orders
                                     ?>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="<?php echo $numOrders;?>">0</span>
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $db = \Config\Database::connect();
                                    $query = $db->query("SELECT * FROM customers WHERE event_status ='Pending'");
                                    $results = $query->getResult();
                                    foreach ($results as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row->first_name; ?> <?= $row->last_name; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->start_date; ?></td>
                                            <td><?= $row->end_date; ?></td>
                                            <td><?= $row->event_status; ?></td>

                                            <td>


                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-id="<?= $row->id; ?>" data-bs-target="#exampleModalFullscreen-<?= $row->id ?>"><i class="fa fa-eye">View order</i></button>
                                                <button type="button" class="btn btn-outline-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-id="<?= $row->id; ?>" data-bs-target="#exampleModalAccept-<?= $row->id ?>"><i class="fa fa-eye">Accept order</i></button>

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

    <?php
    $query = $db->query('SELECT * FROM orders O LEFT JOIN customers C ON O.customer_id=C.id');
    $results = $query->getResult();
    foreach ($results as $row) {
    ?>

        <!-- Accept Order Modal -->
        <div id="exampleModalAccept-<?= $row->id ?>" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel">Customer Name: <?= $row->first_name . " " . $row->last_name  ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>/book/approveOrder" method="POST">
                            <p>By Accepting this Order you are automatically closing the lounge on the dates below. You can adjust the dates as you see fit.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="example-date-input" class="form-label">Check In Date</label>
                                    <input class="form-control" type="date" name="start_date" value="<?= $row->start_date ?>" id="example-date-input">
                                </div>
                                <div class="col-md-6">
                                    <label for="example-date-input" class="form-label">Check Out Date</label>
                                    <input class="form-control" type="date" name="end_date" value="<?= $row->end_date ?>" id="example-date-input">
                                    <input class="form-control" name="customer_id" type="hidden" value="<?= $row->id ?>" id="customer_id">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Comfirm Approval</button>
                        <button type="button" class="btn btn-outline secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>


                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>
<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

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