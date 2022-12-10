<?= $this->include('inc/header') ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <?= $page_title ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="color:#5156be; " class="card-title text-center">Packages</h2>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Package</button>
                        </div>
                        <div class="card-body">
                            <table id="datatable-button" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Is Featured</th>
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
    <?php
    $db = \Config\Database::connect();
    $query   = $db->query('SELECT * FROM prod_category');
    $results = $query->getResult();
    $tab_menu = '';
    $tab_content = '';
    $i = 0;
    foreach ($results as $data) {

        // if ($i == 0) {
        $active = $i == 0 ? 'active' : '';
        $tab_menu .= '
            <li class="nav-item">
            <a class="nav-link ' . $active . '" data-bs-toggle="tab" href="#sel' . $data->id . '" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">' . $data->name . '</span>
            </a>
        </li>
         ';
        $product = $db->query("SELECT * FROM products WHERE catergory_id = " . $data->id);
        $product_result = $product->getResult();
        $tab_content .= '<div class="tab-pane ' . $active . '"  id="sel' . $data->id . '" role="tabpanel">';
        foreach ($product_result as $sub_data) {
            $product_name = "'" . $sub_data->product_name . "'";
            $tab_content .= '
                        
                 <input style type="hidden" id="package_id" class="ids" value="' . $package_id . '" name="package_id">
                
                <input type="checkbox" onchange="handleChange(' . $sub_data->id . ',' . $product_name . ')" id="product_id-' . $sub_data->id . '" name="product" value="' . $sub_data->id . '" id="">&nbsp;
                <label>' . $sub_data->product_name . '</label>
                <h4> </h4>
           
          ';
        }

        $tab_content .= '</div>';
        $tab_content .= '<div style="clear:both"></div>';
        $i++;
    }
    ?>


    <div id="exampleModalFullscreen1" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" style="text-align:center;" id="exampleModalFullscreenLabel">Add Product to a Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="card">

                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">

                                    <?php

                                    echo $tab_menu;
                                    ?>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <br />
                                    <?php
                                    echo $tab_content;
                                    ?>
                                </div>
                            </div><!-- end card-body -->

                        </div><!-- end card -->
                        <h5>Added Products</h5>
                        <div class="card">

                            <div class="card-body">
                                <div>
                                    <form method="post" action="<?php echo base_url(); ?>/package/addPackageProduct" id="products_form">
                                        <input type="hidden" id="form_package_id" name="package_id" value="">
                                        <ul id="listItems"></ul>

                                    </form>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id="submit" class="btn btn-primary waves-effect waves-light">Add Products</button>
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Details modal -->
    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFullscreenLabel">Viewing Package Name</h5>
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
                    <h5 class="modal-title">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('package/addPackage'); ?>" enctype="multipart/form-data">
                        <div class="or-seperator"><b></b></div>
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="name" placeholder="Package Name" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control"  name="is_featured">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option  value="">Is featured
                                            </option>
                                            <option name="yes" value="1">Yes</option>
                                            <option name="no" value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <label for="">Package Image</label>
                                    <div class="fallback">
                                        <input type="file" name="package_image" id="package_image">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <br>
                        <!-- <div class="or-seperator"> </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success block">Save Package</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            displayPackages();
        });

        $('#packages-form').on('submit', function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var package_image = $("#package_image").val();
            var is_featured = $("#is_featured").val();
            $.ajax({
                url: "<?php echo base_url(); ?>/package/addPackage",
                type: 'GET',
                data: {
                    name: name,
                    package_image: package_image,
                    is_featured: is_featured
                },

                // dataType: "JSON",
                success: function(response) {
                    displayPackages();
                    $("#form-modal").modal('hide');
                }

            });

        });
        $('#submit').on('click', function(e) {
            $('#form_package_id').val($('#package_id').val());
            $('#products_form').submit();
            // e.preventDefault();
            // console.log(SelctedItems)
            // var product_id = $("#product_id").val();
            // var package_id = $("#package_id").val();
            // alert(product_id + '' + package_id);
            // return;
            // $.ajax({
            //     url: "<?php echo base_url(); ?>/package/addPackage",
            //     type: 'GET',
            //     data: {
            //         product_id: product_id,
            //         package_id: package_id
            //     },

            //     // dataType: "JSON",
            //     success: function(response) {

            //         // Alert('Test')
            //     }

            // });

        });

        function displayPackages() {
            $.ajax({
                url: '<?php echo base_url(); ?>/fetch-packages',
                method: 'get',
                success: function(response) {
                    $.each(response.packages, function(key, value) {
                        let package_name = `'Add products to ${value['name']}'`;
                        $('#dataTable').append('<tr>\
					<td> ' + value['name'] + ' </td>\
					<td> ' + value['is_featured'] + ' </td>\
                    <td>\
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" table-id=' + value['id'] + ' data-bs-target="#exampleModalFullscreen">View package</button>\
					</td>\
                    <td>\
                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" onclick="getID(' + value['id'] + ',' + package_name + ')" data-bs-target="#exampleModalFullscreen1">Add products to this package</button>\
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
        let SelctedItems = [];

        function getID(ID, package_name) {
            $('.ids').each((index, el) => {
                $(el).val(ID);
            });

            $('#exampleModalFullscreenLabel').text(package_name);
        }

        function handleChange(product_id, product_name) {
            if ($(`#product_id-${product_id}`).is(':checked'))
                SelctedItems.push({
                    product_id,
                    product_name
                });
            else {
                let indexNum = SelctedItems.findIndex((el) => el.product_id === product_id);
                if (indexNum !== -1)
                    SelctedItems.splice(indexNum, 1);
            }
            let lisItems = "";
            SelctedItems.forEach((item) => {
                lisItems += `<li> 
                <input type='hidden' value='${item.product_id}' name='products[]' />
                ${item.product_name}
                </li>`;
            })
            $('#listItems').html(lisItems);
        }
    </script>
    <script>