<header id="page-topbar">
    <div class="navbar-header" >
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                      
                    </span>
                    <span class="logo-lg">
                    <img src="assets/images/izikologo.png" alt="" height="100"> <span class="logo-txt"></span>
                    </span>
                </a>

                <a href="/" style="padding-right:0;" class="logo logo-light">
                    <span class="logo-sm">
                       
                    </span>
                    <span  class="logo-lg">
                        <img src="assets/images/izikologo.png" style="margin-top: 20px;" alt="" width="120" height="110"> <span class=" logo-txt"></span>
                    </span>
                </a>
            </div>

            <button type="button" style="margin-top: 30px;" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

          
        </div>

        <div class="d-flex">

            
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> <?= lang('Files.Notifications') ?> </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> <?= lang('Files.Unread') ?> (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?= lang('Files.James_Lemire') ?></h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1"><?= lang('Files.It_will_seem_like_simplified_English') ?>.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= lang('Files.1_hours_ago') ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?= lang('Files.Your_order_is_placed') ?></h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1"><?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= lang('Files.3_min_ago') ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?= lang('Files.Your_item_is_shipped') ?></h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1"><?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= lang('Files.3_min_ago') ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?= lang('Files.Salena_Layfield') ?></h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1"><?= lang('Files.As_a_skeptical_Cambridge_friend_of_mine_occidental') ?>.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= lang('Files.1_hours_ago') ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span><?= lang('Files.View_More') ?>..</span>
                        </a>
                    </div>
                </div>
            </div>

          

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="apps-contacts-profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> <?= lang('Files.Profile') ?></a>
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url() ?>/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?= lang('Files.Logout') ?></a>
                </div>
            </div>

        </div>
    </div>
</header>