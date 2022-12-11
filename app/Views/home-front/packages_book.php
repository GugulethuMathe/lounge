<?= $this->include('homeinc/header') ?>

<div id="avail_div" data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">
    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-586cb53 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
        data-id="586cb53" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7c6dcf6"
                data-id="7c6dcf6" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-5b06601 elementor-align-left elementor-widget elementor-widget-home-testimonials-2"
                        data-id="5b06601" data-element_type="widget" data-widget_type="home-testimonials-2.default">
                        <div class="elementor-widget-container">

                            <section class="testimonials my-4">
                                <div class="background bg-img bg-fixed section-padding pb-0"
                                    data-background="<?php echo base_url() ?>/assets/images/2.jpg"
                                    data-overlay-dark="2">
                                    <div class="container">
                                        <div class="row">
                                            <div style="padding-bottom: 20px" class="booking-box">
                                                <div class="head-box">
                                                    <h6 class="text-center congrats">Fill in the form below to get
                                                        started. </h6>
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
                                                            <a type="button" data-toggle="modal"
                                                                data-target="#exampleModal-<?= $pack->id; ?>"
                                                                class="aa-properties-item-img">
                                                                <img width="270" height="120"
                                                                    src="<?php echo base_url() ?> <?php echo $pack->img; ?>"
                                                                    alt="">
                                                            </a>
                                                            <div class="aa-tag for-sale bg-success p-3">
                                                                <h3><span style="color: #fff;"> Package Name:

                                                                        <a class="btn text-warning btn-outline-warning"
                                                                            data-bs-toggle="modal"
                                                                            href="#product_package" role="button">
                                                                            <?php echo $pack->name; ?></a>
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
$query = $db->query('SELECT * FROM packages');
$results = $query->getResult(); 

$customers = $db->query('SELECT * FROM customers WHERE id='.$_SESSION['customer_id']);
$people =$customers->getResult()[0]->number;

$tshirts = $db->query('SELECT * FROM products WHERE product_code="RB0001"');
$tshirt = $tshirts->getResult()[0];

?>

<?php
foreach ($results as $pack) {
?>
<div class="modal fade" id="exampleModal-<?= $pack->id; ?>" aria-hidden="true"
    aria-labelledby="product_packageToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <img src="assets/images/izikologo.png" class="logo-img" alt="">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>


            </div>
            <form action="<?= base_url()?>/Book/saveOrder" method="POST">
                <input type="hidden" name="customer_id" value="<?= $_SESSION['customer_id'] ?>">
                <input type="hidden" name="package_id" value="<?= $pack->id ?>">
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
                                        $query_prod = $db->query('SELECT DiSTINCT P.* FROM products P INNER JOIN package_products PP  ON P.id=PP.product_id
                                                                  WHERE PP.package_id='.$pack->id);
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
                                                                <input type="checkbox" name="products[]"
                                                                    id="prod-<?=$prod->id?>" value="[<?=$prod->id.','.$prod->price?>]"
                                                                    onchange="handleChange(<?=$prod->id?>,'<?=$prod->product_name?>',<?=$prod->price?>,<?=$pack->id?>)">
                                                            </label>

                                                        </span>
                                                        <img width="200" height="200"
                                                            src="<?php echo base_url() ?>/<?= $prod->img; ?>"
                                                            sizes="(max-width: 200px) 100vw, 200px">
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

                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">
                                                                        Price: R
                                                                    </span>
                                                                    <?= $prod->price; ?>
                                                                </span>
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
                        <div class="col-md-2 d-flex flex-column">
                            <div class="card">
                                <div class="card-header">
                                    Your Order
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Number of People: <?= $people?>
                                        <h5 class="">Order Items:</h5>
                                        <table class="table" width="100%" id="orderTable-<?=$pack->id?>">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Unit Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tshirt x<?= $people?> </td>
                                                    <td>
                                                        R<span><?= $tshirt->price * $people; ?> </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <th>
                                                        R<span><?= $tshirt->price * $people; ?> </span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </p>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                <div style="margin: auto; width: 50%;" class="modal-footer">
                    <button class="btn btn-sm btn-primary" data-bs-target="#products" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Add more Products</button>
                    <button type="submit" class="btn btn-sm bg-success text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>










<?= $this->include('homeinc/footer') ?>
<script>
    let PRODUCTS = [{
        id: parseInt('<?= $tshirt->id ?>'),
        prod_name: '<?= $tshirt->product_name." x ".$people ?>',
        prod_price: '<?= $tshirt->price * $people  ?>'
    }];

    function handleChange(id, prod_name, prod_price, package_id) {
        if ($(`#prod-${id}`).is(':checked')) {
            PRODUCTS.push({
                id,
                prod_name,
                prod_price
            });
        } else {
            let index = PRODUCTS.findIndex((item) => item.id == id);
            if (index != -1)
                PRODUCTS.splice(index, 1);

        }
        let rows = '';
        let total = 0;
        PRODUCTS.forEach(element => {
            rows += `<tr>
                            <td>${element['prod_name']}</td>
                            <td>R<span>${element['prod_price']}</span></td>
                     </tr>`;
            total += parseFloat(element['prod_price']);
        });
        $(`#orderTable-${package_id} > tbody`).html(rows);
        let footer = `<tr>
                            <th>Total</th>
                            <th>
                                R<span>${total} </span>
                            </th>
                        </tr>`;
        $(`#orderTable-${package_id} > tfoot`).html(footer);


    }
    $(document).ready(function () {
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

    $('#customers-form').on('submit', function (e) {
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
            success: function (response) {
                showBooking();
            }
        });

    });
</script>