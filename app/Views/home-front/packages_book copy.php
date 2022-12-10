<?= $this->include('homeinc/header') ?>


<div class="container">
<div id="avail_div" data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">
    <section id="packagesm" class="book elementor-section elementor-top-section elementor-element elementor-element-8b364e8 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="8b364e8" data-element_type="section">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-319b36c" data-id="319b36c" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-2850392 elementor-align-left elementor-widget elementor-widget-home-blog" data-id="2850392" data-element_type="widget" data-widget_type="home-blog.default">
                        <div class="elementor-widget-container">
                            <section style="padding: 60px" class="news section-padding bg-black">
                                <div class="container">
                                    <div class="row">
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
                            </section>
                            <!-- <div class="col-md-12">
                            <input type="submit" onclick="showPackage()" value="Submit" class="wpcf7-form-control wpcf7-submit btn-form1-submit mt-15"><span class="ajax-loader"></span>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
</div>
<?= $this->include('homeinc/footer') ?>
