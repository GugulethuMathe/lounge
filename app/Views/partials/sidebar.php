<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="margin-top: 10px;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>
                <li>
                    <a href="<?php echo base_url(); ?>/dashboard" class="has-arrow">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">New Orders</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/leads" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-leads">Leads</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/orders" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-orders">Approved Orders</span>
                    </a>

                </li>
              
                <li>
                    <a href="<?php echo base_url(); ?>/administrators" class="has-arrow">
                    <i data-feather="users"></i>
                        <span data-key="t-admins">Adminstrators</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/staff" class="has-arrow">
                    <i data-feather="users"></i>
                        <span data-key="t-chat">Staff</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/catergories" class="has-arrow">
                    <i data-feather="grid"></i>
                        <span data-key="t-catergories">Catergories</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/products" class="has-arrow">
                    <i data-feather="grid"></i>
                        <span data-key="t-products">Products</span>
                    </a>
                </li>
               
                <li>
                    <a href="<?php echo base_url(); ?>/packages" class="has-arrow">
                    <i data-feather="grid"></i>
                        <span data-key="t-packages">Packages</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>/rooms" class="has-arrow">
                    <i data-feather="grid"></i>
                        <span data-key="t-rooms">Rooms</span>
                    </a>
                </li>             
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->