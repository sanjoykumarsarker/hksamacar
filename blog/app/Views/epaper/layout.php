<?= $this->include('layout/header') ?>
<?php if (setting('notice_top', true) === '1') : ?>
    <div class="bg-danger text-white">
        <div class="px-md-4">
            <div class="row no-gutters">
                <div class="col-lg-2 col-4 col-md-3 bg-white text-dark text-center">📢 বিশেষ বিজ্ঞপ্তি:</div>
                <div class="col-lg-10 col-8 col-md-9">
                    <?= setting('notice_top') ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('home')) ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('pages', 'advertise')) ?>" class="nav-link">Advertise</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('pages', 'about-us')) ?>" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('pages', 'ekadosi')) ?>" class="nav-link">Ekadasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('pages', 'write-for-us')) ?>" class="nav-link">Write for Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-top-right-menu">
                        <?php if (service('auth')->id()) : ?>
                            <li class="nav-item">
                                <a href="<?= url_to('dashboard') ?>" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= url_to('logout') ?>" class="nav-link">Logout</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?= url_to('login') ?>" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item d-none">
                                <a href="<?= url_to('signup') ?>" class="nav-link">Sign Up</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="http://www.harekrishnasamacar.com/hks_admin_login.php" class="nav-link" target="_blank">Samacar</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </div>
</header>

<!-- partial -->
<div class="flash-news-banner">
    <div class="container">
        <div class="d-lg-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">আজকের তিথি</span>
                <p class="mb-0">
                    <?= setting('ticker') ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <?php
                $replace_array = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
                $search_array = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                ?>
                <small class="mr-3 text-danger"><span id="bn-date"></span> (<?= str_replace($search_array, $replace_array, date('d F, Y')) ?>)</small>
                <!-- <span class="text-danger">30°C,London</span> -->
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <?= $this->renderSection('content'); ?>
</div>
<?= $this->include('layout/footer') ?>