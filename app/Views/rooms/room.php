<?= $this->include('inc/header') ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?= $page_title ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="color:#5156be; " class="card-title text-center">Rooms</h2>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Product</button>
                        </div>
                        <div class="card-body">
                            <table id="datatable-button" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th>Total Beds</th>
                                        <th>Beds Types</th>
                                        <th>Description</th>
                                        <th>Occupants</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">

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
    <?= $this->include('inc/footer') ?>

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('room/addRoom'); ?>" enctype="multipart/form-data">
                        <div class="or-seperator"><b></b></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control" value="" id="room_type">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option name="" value="">Room Type
                                            </option>
                                            <option name="admin" value="1">Yes</option>
                                            <option name="manager" value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" id="beds_total" placeholder="Product Code" required="required">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control" value="" id="bed_types">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option name="" value="">Room Type
                                            </option>
                                            <option name="admin" value="1">Yes</option>
                                            <option name="manager" value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" id="occupants" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control" value="" id="is_featured">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option name="" value="">Is featured
                                            </option>
                                            <option name="admin" value="1">Yes</option>
                                            <option name="manager" value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" id="price" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" id="description" cols="64" rows="5"></textarea>
                                </div>
                            </div>
                            <br>
                        </div>
                        <br>
                        <!-- <div class="or-seperator"> </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success block">Save Product</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            displayRooms();
        });

        $('#rooms-form').on('submit', function(e) {
            e.preventDefault();
            var room_type = $("#room_type").val();
            var beds_total = $("#beds_total").val();
            var price = $("#price").val();
            var bed_types = $("#bed_types").val();
            var description = $("#description").val();
            var occupants = $("#occupants").val();
            $.ajax({
                url: "<?php echo base_url(); ?>/room/addRoom",
                type: 'GET',
                data: {
                    room_type: room_type,
                    beds_total: beds_total,
                    bed_types: bed_types,
                    description: description,
                    price: price,
                    occupants: occupants
                },

                // dataType: "JSON",
                success: function(response) {
                    displayRooms();
                    alertify.success('Success notification message.'); 
                }

            });

        });

        function displayRooms() {
            $.ajax({
                url: '<?php echo base_url(); ?>/fetch-rooms',
                method: 'get',
                success: function(response) {
                    $.each(response.products, function(key, value) {
                        $('#dataTable').append('<tr>\
					<td> ' + value['room_type'] + ' </td>\
					<td> ' + value['beds_total'] + ' </td>\
					<td> ' + value['bed_types'] + ' </td>\
					<td> ' + value['description'] + ' </td>\
					<td> ' + value['occupants'] + ' </td>\
					<td> ' + value['price'] + ' </td>\
					<td>\
						<a id="btn_edit" table-id=' + value['id'] + ' data-toggle="modal" data-target="#updateModal" class="btn btn-sm btn-warning">Edit</a>\
					</td>\
					<td>\
						<a id="btn_delete" table-id=' + value['id'] + ' class="btn btn-sm btn-danger">Delete</a>\
					</td>\
				</tr>');
                    });
                }

            });

        }


    </script>
    <script>