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
                                    data-background="https://shtheme.com/demosd/thecappa/wp-content/uploads/2022/06/2.jpg"
                                    data-overlay-dark="2">
                                    <div class="container">
                                        <div class="row">
                                            <!-- Booking From -->
                                            <div class="col-md-12">
                                                <div style="padding-bottom: 20px" class="booking-box">
                                                    <div class="head-box">
                                                        <h6  class="text-center congrats">Fill in the form below to get
                                                            started. </h6>
                                                            <hr style="color: black;">
                                                        <p style="background-color:#aa8453; padding:10px;" class="text-center text-light selext">NB: The Booked dates will be disabled on Check In and Check Out dates</p>
                                                        <h4 class="text-center"></h4>
                                                    </div>
                                                    <div class="booking-inner clearfix">
                                                        <div class="wpcfe7" id="wpcf7-f1a19-p30-o2" lang="en-US"
                                                            dir="ltr">
                                                            <div class="screen-reader-response"></div>
                                                            <form method="POST"
                                                                action="<?php echo base_url() ?>/book/addCustomer"
                                                                class="wpcf7-foarm">
                                                                <div class="form1 clearfix">
                                                                    <div class="row personal">
                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>First Name</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap"><input
                                                                                            type="text"
                                                                                            name="first_name"
                                                                                            id="first_name" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="First Name"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Last Name</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap"><input
                                                                                            type="text" name="last_name"
                                                                                            id="last_name" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="Last Name"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Email</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap"><input
                                                                                            type="email" name="email"
                                                                                            id="email" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="Email"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Phone</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap"><input
                                                                                            type="text" name="phone"
                                                                                            id="phone" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="Phone"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <input class="form-control" name="event_status" type="hidden" value="Lead" id="customer_id">

                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Check in</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap check-in"><input
                                                                                            type="datetime"
                                                                                            name="start_date"
                                                                                            id="start_date" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input datepicker"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            autocomplete="off"
                                                                                            placeholder="Check in"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Check out</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap check-out"><input
                                                                                            type="datetime"
                                                                                            name="end_date"
                                                                                            id="end_date" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input datepicker"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            autocomplete="off"
                                                                                            placeholder="Check out"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        <div class="col-md-6">
                                                                            <div class="input1_wrapper">
                                                                                <label>Number of people</label>
                                                                                <div class="input1_inner">
                                                                                    <span
                                                                                        class="wpcf7-form-control-wrap"><input
                                                                                            type="text" name="number"
                                                                                            id="number" size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control input"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            placeholder="Number of people"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <input type="submit" value="Next"
                                                                            class="wpcf7-form-control wpcf7-submit btn-form1-submit mt-15"><span
                                                                            class="ajax-loader"></span>
                                                                    </div>
                                                            </form>

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
            </div>
        </div>
    </section>
</div>
<?php
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM customers WHERE 	event_status="Approved" and end_date >= CURDATE()');
    $listDates = [];
    $results = $query->getResult();
    foreach ($results as $value) {
        $start_date = $value->start_date;
        if($value->start_date < date("Y-m-d")){
            $start_date = date("Y-m-d");
        }
        $listDates = array_unique(array_merge(date_range($start_date, $value->end_date),$listDates ), SORT_REGULAR);
    }
    function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {
        $current = strtotime($first);
        $last = strtotime($last);
    
        while( $current <= $last ) {
    
            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }
    
        return $dates;
    }
?>
<?= $this->include('homeinc/footer') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css" rel="stylesheet" />
<script>
    $(document).ready(function () {
        $('#packagesm').hide();
        $('.book').hide();
        // displayCustomers();

        //This array containes all the disabled array
        const listDate = JSON.parse('<?= json_encode($listDates) ?>');
        $('#start_date').datepicker({

            beforeShowDay: function (date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [listDate.indexOf(string) == -1]
            },
            minDate: '0'
        });
        $('#end_date').datepicker({

            beforeShowDay: function (date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [listDate.indexOf(string) == -1]
            },
            minDate: '0'
        });
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