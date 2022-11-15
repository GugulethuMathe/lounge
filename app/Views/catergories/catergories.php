<?= $this->include('inc/header') ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <?= $page_title ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="color:#5156be; " class="card-title text-center">catergories</h2>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Catergory</button>
                        </div>
                        <div class="card-body">
                            <table id="datatable-button" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Catergory Name</th>
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

    <!-- Details modal -->
    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFullscreenLabel">Viewing Catergory Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5> <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Products</button></h5>
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur.
                        Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec
                        ullamcorper nulla non metus auctor
                        fringilla.</p>
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur.
                        Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec
                        ullamcorper nulla non metus auctor
                        fringilla.</p>
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade bs-example-modal-center" id="form-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Catergory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="catergories-form">
                        <div class="or-seperator"><b></b></div>
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="name" placeholder="Catergory Name" required="required">
                                </div>
                            </div>

                            <br>
                            <br>
                        </div>
                        <br>
                        <!-- <div class="or-seperator"> </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success block">Save Catergory</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            displayCatergories();
        });

        $('#catergories-form').on('submit', function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var is_featured = $("#is_featured").val();
            $.ajax({
                url: "<?php echo base_url(); ?>/catergories/addCategories",
                type: 'GET',
                data: {
                    name: name,
                   
                },
                // dataType: "JSON",
                success: function(response) {
                    $("#form-modal").hide();

                    displayCatergories();
                    $("#product_modal").modal('hide');
                    alertify.success('Success notification message.');
                }

            });

        });

        function displayCatergories() {
            $.ajax({
                url: '<?php echo base_url(); ?>/fetch-catergories',
                method: 'get',
                success: function(response) {
                    $.each(response.catergories, function(key, value) {
                        $('#dataTable').append('<tr>\
					<td> ' + value['name'] + ' </td>\
                    <td>\
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" table-id=' + value['id'] + ' data-bs-target="#exampleModalFullscreen">View Catergory</button>\
					</td>\
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