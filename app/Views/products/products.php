<?= $this->include('inc/header') ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?= $page_title ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="color:#5156be; " class="card-title text-center">Products</h2>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Product</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTabl">

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

    <div class="modal fade bs-example-modal-center" id="product_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="products-form">

                        <div class="or-seperator"><b></b></div>
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="product_name" placeholder="Product Name" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="product_code" placeholder="Product Code" required="required">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="price" placeholder="Price" required="required">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" id="quantity" placeholder="Quantity" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropdown drop_down">
                                        <select class="form-control" required="required" id="catergory_id">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <option label="Choose Catergory"></option>
                                            <?php
                                            $db = \Config\Database::connect();
                                            $query   = $db->query('SELECT * FROM prod_category');
                                            $results = $query->getResult();
                                            foreach ($results as $data) {
                                            ?>
                                                <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                                            <?php } ?>
                                        </select>
                                      
                                    </div>
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
            displayProducts();

        });

        $('#products-form').on('submit', function(e) {
            e.preventDefault();
            var product_name = $("#product_name").val();
            var product_code = $("#product_code").val();
            var price = $("#price").val();
            var quantity = $("#quantity").val();
            var description = $("#description").val();
            var catergory_id = $("#catergory_id").val();
            $.ajax({
                url: "<?php echo base_url(); ?>/product/addProduct",
                type: 'GET',
                data: {
                    product_name: product_name,
                    product_code: product_code,
                    price: price,
                    description: description,
                    quantity: quantity,
                    catergory_id: catergory_id,

                },

                dataType: "JSON",
                success: function(response) {
                    displayProducts();

                    $("#product_modal").modal('hide');
                    // Notiflix.Report.Success('Success', 'Custom report generated successfully', 'Close');
                }

            });

        });

        function displayProducts() {

            $.ajax({
                url: '<?php echo base_url(); ?>/fetch-products',
                method: 'get',
                success: function(response) {
                    $.each(response.products, function(key, value) {
                        $('#dataTabl').append('<tr>\
					<td> ' + value['product_name'] + ' </td>\
					<td> ' + value['product_code'] + ' </td>\
					<td> ' + value['price'] + ' </td>\
					<td> ' + value['quantity'] + ' </td>\
					<td> ' + value['description'] + ' </td>\
					<td> ' + value['catergory_id'] + ' </td>\
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