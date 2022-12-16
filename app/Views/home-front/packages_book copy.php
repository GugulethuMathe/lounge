<?= $this->include('homeinc/header') ?>

<div id="avail_div" data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">
    <section class="elementor-section elementor-top-section elementor-element elementor-element-586cb53 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="586cb53" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7c6dcf6" data-id="7c6dcf6" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-5b06601 elementor-align-left elementor-widget elementor-widget-home-testimonials-2" data-id="5b06601" data-element_type="widget" data-widget_type="home-testimonials-2.default">
                        <div class="elementor-widget-container">

                            <section class="testimonials my-4">
                                <div class="background bg-img bg-fixed section-padding pb-0" data-background="<?php echo base_url() ?>/assets/images/2.jpg" data-overlay-dark="2">
                                    <div class="container">
                                        <div class="row">
                                            <div style="padding-bottom: 20px" class="booking-box">
                                                <div class="head-box">
                                                    <h6 class="text-center congrats">Fill in the form below to get started. </h6>
                                                    <h4 class="text-center"></h4>
                                                </div>
                                                <div class="row">
                                                    <?php
                                                    $db = \Config\Database::connect();
                                                    $query = $db->query('SELECT * FROM packages');
                                                    $results = $query->getResult();
                                                    foreach ($results as $pack) {
                                                    ?>
                                                        <div class="col-md-3">
                                                            <article class="aa-properties-item">
                                                                <a type="button" data-toggle="modal" data-target="#exampleModal-<?= $pack->id; ?>" class="aa-properties-item-img">
                                                                    <img width="270" height="120" src="<?php echo base_url() ?> <?php echo $pack->img; ?>" alt="">
                                                                </a>
                                                                <div class="aa-tag for-sale bg-success p-3">
                                                                    <h3><span style="color: #fff;"> Package Name:
                                                                            <a type="button" class="btn text-warning btn-outline-warning" data-toggle="modal" data-target="#exampleModal-<?= $pack->id; ?>">
                                                                                <?php echo $pack->name; ?>
                                                                            </a>
                                                                        </span></h3>
                                                                </div>
                                                                <div class="aa-properties-item-content">
                                                                    <div class="aa-properties-info">
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="aa-properties-about">
                                                                        <p class="card-description">
                                                                        </p>
                                                                    </div>
                                                                    <div class="aa-properties-detial">

                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM packages LIMIT 6');
$results = $query->getResult(); ?>
<?php
foreach ($results as $pack) {
?>
    <div class="modal fade exampleModal-<?= $pack->id ?>" id="exampleModal-<?= $pack->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-9">
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
                                        $query_prod = $db->query('SELECT * FROM products');
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
                                                            <img width="200" height="200" src="<?php echo base_url() ?>/<?= $prod->img; ?>" sizes="(max-width: 200px) 100vw, 200px">
                                                        </div>
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
                        <div style="border: 1px solid #dfdfdf;;" class="col-md-2">
                            <h4 class="text-center shop my-1">
                                Your Order

                            </h4>
                            <hr>
                            <div class="shop-add-to-cart">
                                Number of People: 3
                            </div>

                            <div style="position: absolute; bottom: 0px;" class="shop-add-to-cart">
                                Total: R300
                            </div>


                            <div class="row" style="padding-left:10px; position: absolute; bottom: 0px;">

                            </div>

                        </div>


                    </div>
                </div>
                <div style="margin: auto; width: 50%;" class="modal-footer">
                    <button class="btn btn-sm btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">
                        Add more Products
                    </button>
                    <button type="button" class="btn btn-sm bg-success text-white" onclick="showRooms()" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM packages LIMIT 6');
$results = $query->getResult(); ?>
<?php
foreach ($results as $pack) {
?>
    <div class="modal fade exampleModal-<?= $pack->id ?>" id="products" tabindex="-1" role="dialog" aria-labelledby="products" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="shop-area pt-10 pb-100">
                                <!-- Product -->
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center">
                                            Add More Product to your Order
                                        </h4>
                                        <br>
                                        <br>
                                        <br>
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query_prod = $db->query('SELECT * FROM products');
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
                                                            <img width="200" height="200" src="<?php echo base_url() ?>/<?= $prod->img; ?>" sizes="(max-width: 200px) 100vw, 200px">
                                                        </div>
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
                        <div style="border: 1px solid #dfdfdf;;" class="col-md-2">
                            <h4 class="text-center shop my-1">
                                Your Order

                            </h4>
                            <hr>
                            <div class="shop-add-to-cart">
                                Number of People: 3
                            </div>

                            <div style="position: absolute; bottom: 0px;" class="shop-add-to-cart">
                                Total: R300
                            </div>


                            <div class="row" style="padding-left:10px; position: absolute; bottom: 0px;">

                            </div>

                        </div>


                    </div>
                </div>
                <div style="margin: auto; width: 50%;" class="modal-footer">
                    <button type="button" class="btn bg-success text-white" onclick="showRooms()" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM packages LIMIT 6');
$results = $query->getResult(); ?>
<?php
foreach ($results as $pack) {
?>
    <div class="modal fade" id="product_package" aria-hidden="true" aria-labelledby="product_packageToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-9">
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
                                        $query_prod = $db->query('SELECT * FROM products');
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
                                                            <img width="200" height="200" src="<?php echo base_url() ?>/<?= $prod->img; ?>" sizes="(max-width: 200px) 100vw, 200px">
                                                        </div>
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
                        <div style="border: 1px solid #dfdfdf;;" class="col-md-2">
                            <h4 class="text-center shop my-1">
                                Your Order

                            </h4>
                            <hr>
                            <div class="shop-add-to-cart">
                                Number of People: 3
                            </div>

                            <div style="position: absolute; bottom: 0px;" class="shop-add-to-cart">
                                Total: R300
                            </div>


                            <div class="row" style="padding-left:10px; position: absolute; bottom: 0px;">

                            </div>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Add more Products</button>
                    <button type="button" class="btn btn-sm bg-success text-white" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-9">
                        <div class="shop-area pt-10 pb-100">
                            <!-- Product -->
                            <div class="container">
                                <div class="row">
                                    <h4 class="text-center">
                                        Add More Product to your Order
                                    </h4>
                                    <br>
                                    <br>
                                    <br>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $query_prod = $db->query('SELECT * FROM products');
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
                                                        <img width="200" height="200" src="<?php echo base_url() ?>/<?= $prod->img; ?>" sizes="(max-width: 200px) 100vw, 200px">
                                                    </div>
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
                    <div style="border: 1px solid #dfdfdf;;" class="col-md-2">
                        <h4 class="text-center shop my-1">
                            Your Order

                        </h4>
                        <hr>
                        <div class="shop-add-to-cart">
                            Number of People: 3
                        </div>

                        <div style="position: absolute; bottom: 0px;" class="shop-add-to-cart">
                            Total: R300
                        </div>


                        <div class="row" style="padding-left:10px; position: absolute; bottom: 0px;">

                        </div>

                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>








<?= $this->include('homeinc/footer') ?>
<script>
    $(document).ready(function() {
        $('#packagesm').hide();
        $('.book').hide();
        displayCustomers();
    });

    function showPackage() {
        $('#packagesm').show();

        $('#avail_div').hide();
        $('.selext').hide();
    }

    function showBooking() {
        $('.book').show();
        $('#packagesm').show();
        $('.selext').show();
        // $('.personal').hide();
        $('.congrats').hide();
    }

    function showRooms() {
        $('.room').show();
    }

    function hideRooms() {
        $('.room').show();
    }

    $('#customers-form').on('submit', function(e) {
        e.preventDefault();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            url: "<?php echo base_url(); ?>/customer/addCustomer",
            type: 'POST',
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                end_date: end_date,
                start_date: start_date
            },

            // dataType: "JSON",
            success: function(response) {
                showBooking();
            }
        });

    });
</script>