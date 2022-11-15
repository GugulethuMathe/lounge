<?= $this->include('inc/header') ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?= $page_title ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="color:#5156be; " class="card-title text-center">Administrators</h2>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Admin</button>
                        </div>
                        <div class="card-body">
                            <table id="datatable-button" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
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
                    <h5 class="modal-title">Add Administrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="managers-form">

                        <div class="or-seperator"><b></b></div>
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="first_name" placeholder="First Name" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="last_name" placeholder="Last Name" required="required">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="contact" placeholder="Contact Number" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" id="email" placeholder="Email Address">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control" value="" id="roles">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option name="" value="">Select a Role
                                            </option>
                                            <option name="admin" value="Admin">Admin</option>
                                            <option name="manager" value="Manager">Manager</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="or-seperator"> </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success block">Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            displayAdmins();
        });

        $('#managers-form').on('submit', function(e) {
            e.preventDefault();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var password = $("#password").val();
            var roles = $("#roles").val();
            $.ajax({
                url: "<?php echo base_url(); ?>/manager/addManager",
                type: 'GET',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    contact: contact,
                    roles: roles,
                    password: password
                },

                // dataType: "JSON",
                success: function(response) {
                    displayAdmins();
                    alertify.success('Success notification message.'); 
                }

            });

        });

        function displayAdmins() {
            $.ajax({
                url: '<?php echo base_url(); ?>/fetch-administrators',
                method: 'get',
                success: function(response) {
                    $.each(response.managers, function(key, value) {
                        $('#dataTable').append('<tr>\
					<td> ' + value['first_name'] + ' </td>\
					<td> ' + value['last_name'] + ' </td>\
					<td> ' + value['email'] + ' </td>\
					<td> ' + value['contact'] + ' </td>\
					<td> ' + value['roles'] + ' </td>\
					<td>\
						<a id="btn_edit" table-id=' + value['id'] + ' data-toggle="modal" data-target="#updateModal" class="btn btn-warning">Edit</a>\
					</td>\
					<td>\
						<a id="btn_delete" table-id=' + value['id'] + ' class="btn btn-danger">Delete</a>\
					</td>\
				</tr>');
                    });
                }

            });

        }
    </script>
    <script>