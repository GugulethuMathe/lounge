<?= $this->include('inc/header') ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Leads</h4>
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
                                    $db = \Config\Database::connect();
                                    $query = $db->query("SELECT * FROM customers WHERE event_status ='Leads'");
                                    $results = $query->getResult();
                                    foreach ($results as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row->first_name; ?> <?= $row->last_name; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->start_date; ?></td>
                                            <td><?= $row->end_date; ?></td>

                                            <td>


                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-id="<?= $row->id; ?>" data-bs-target="#exampleModalFullscreen-<?= $row->id ?>"><i class="fa fa-eye">View order</i></button>
                                            

                                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-mail"></i>Delete</a>
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
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM customers WHERE event_status ='Leads'");
    $results = $query->getResult();
    foreach ($results as $row) {
    ?>


        <!-- Details modal -->
        <div id="exampleModalFullscreen-<?= $row->id ?>" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFullscreenLabel">Order Number: <?= $row->id; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Customer Details</h5>
                        <hr>
                        <h6> Customer Name: <?= $row->first_name . " " . $row->last_name  ?>,</h6>
                        <h6> Phone Number: <?= $row->phone; ?>,</h6>
                        <h6> Email: <?= $row->email; ?>,</h6>
                        <h6>Check In: <?= $row->start_date; ?>,</h6>
                        <h6> Check Out: <?= $row->end_date; ?>,</h6>                       
                        <div class="card-body">

                         
                        </div>

                

                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



</div><!-- /.modal -->
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