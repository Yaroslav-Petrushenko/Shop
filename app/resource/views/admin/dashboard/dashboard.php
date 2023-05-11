<?php require('app/resource/views/templates/headerDash.php'); ?>
    <div class="header-dash" id="">
        <div class="header-section-dash">
            <div class="top-dash flex">
                <div class="logo-dash">
                    <h3>Dashboard</h3>
                </div>
                <div class="flex">
                    <div class="hamburger">
                        <span></span> 
                        <span></span> 
                        <span></span> 
                    </div>
                    <nav class="nav-menu-dash flex">
                        <ul class="top-menu-dash flex" id="menu">
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Customer</a></li>
                            <li><a href="#">Price</a></li>
                            <li><a href="<?= $this->getBaseURL('product')?>">Product</a></li>
                            <li><a href="<?= $this->getBaseURL('status')?>">Status</a></li>
                            <li><a href="#">SubCategory</a></li>
                            <li><a href="#">User</a></li>
                        </ul>
                    </nav>  
                </div>
            </div>
        </div>
    </div>

<!-- <script src='/app/resource/js/nav.js'></script> -->