<?= $this->include('homeinc/header') ?>

<div id="avail_div" data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">
    <section class="elementor-section elementor-top-section elementor-element elementor-element-586cb53 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="586cb53" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7c6dcf6" data-id="7c6dcf6" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-5b06601 elementor-align-left elementor-widget elementor-widget-home-testimonials-2" data-id="5b06601" data-element_type="widget" data-widget_type="home-testimonials-2.default">
                        <div class="elementor-widget-container">

                            <section class="testimonials my-4">
                                <div class="background bg-img bg-fixed section-padding pb-0" data-background="https://shtheme.com/demosd/thecappa/wp-content/uploads/2022/06/2.jpg" data-overlay-dark="2">
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
                                                $query   = $db->query('SELECT * FROM packages');
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