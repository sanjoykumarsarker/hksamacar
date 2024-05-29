<!-- <div class="flash-news-banner d-md-none d-block" style="overflow-x:auto;scrollbar-width:none;">
    <div class="move-left px-2 px-md-4 d-flex <?= empty(setting('ticker')) ? '' : 'justify-content-between' ?>">
        <div class="d-flex align-items-center" style="white-space:nowrap;">
            <span class="badge badge-dark mr-1 mr-md-3">আজ</span>
            <p class="mb-0">
                <?= setting('ticker') ?>
            </p>
        </div>
        <div class="px-3" style="white-space:nowrap;">
            <span class="small text-danger"><span id="bn-date"></span> (<?= \App\Libraries\BanglaDate::trans(date('d F, Y')) ?>)</span>
        </div>
    </div>
</div> -->
<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
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
                        <li class="nav-item">
                            <a href="<?= base_url(route_to('epaper')) ?>" class="nav-link">E-paper</a>
                        </li>
                    </ul>
                    <ul class="navbar-top-right-menu">
                        <li class="nav-item">
                            <a href="#search" class="nav-link no-after">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 20 20">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </a>
                        </li>
                        <?php if (service('auth')->isLoggedIn()) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link no-after btn btn-light rounded-pill btn-sm pr-2 pl-0 text-dark" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <img width="20" height="20" src="<?= assets_url('uploads/profile/' . (service('auth')->image ?? 'profile.webp')) ?>" alt="Profile Picture of <?= service('auth')->name ?>" style="border-radius: 7px;margin-left: 4px;" <?= image_placeholder() ?> />
                                    Profile
                                </a>
                                <div class="dropdown-menu">
                                    <small class="text-muted pl-2"><?= service('auth')->name ?></small>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= url_to('profile') ?>">Profile</a>
                                    <a class="dropdown-item disabled" href="#">Settings</a>
                                    <a class="dropdown-item" href="<?= url_to('logout') ?>" title="Logout">Log Out</a>
                                </div>
                            </li>

                        <?php else : ?>
                            <li class="nav-item">
                                <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="filled_blue" data-text="signin" data-size="medium" data-logo_alignment="left">
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="<?= url_to('login') ?>" title="Login" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item d-none">
                                <a href="<?= url_to('signup') ?>" class="nav-link">Sign Up</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a rel="nofollow" href="http://www.harekrishnasamacar.com/hks_admin_login.php" class="nav-link" target="_blank">Samacar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a class="navbar-brand" href="<?= url_to('home') ?>"><img src="<?= assets_url('images/samacar_logo.svg') ?>" alt="Hare Krishna Samacar Logo" /></a>
                    </div>
                    <div>
                        <div class="d-flex align-items-center">
                            <a href="#search" class="d-block d-md-none text-white mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 20 20">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </a>
                            <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                <li>
                                    <button class="navbar-close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg>
                                    </button>
                                </li>
                                <li class="mb-3 d-md-none">
                                    <?php if (service('auth')->id()) : ?>
                                        <a href="<?= url_to('profile') ?>" class="btn btn-sm btn-info mr-2">Profile</a>
                                        <a href="<?= url_to('logout') ?>" class="btn btn-sm btn-warning">Logout</a>
                                    <?php else : ?>
                                        <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="filled_blue" data-text="signin" data-size="medium" data-logo_alignment="left">
                                        </div>
                                        <a href="<?= url_to('login') ?>" title="Login" class="nav-link text-white">Login</a>
                                    <?php endif; ?>
                                </li>
                                <?php if (uri_string() != route_to('home')) : ?>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?= url_to('home') ?>">হোম</a>
                                    </li>
                                <?php endif; ?>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(route_to('category', 'news')) ?>">সংবাদ</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('category') . '/' . 'নগরাদি-গ্রাম' ?>">নগরাদি গ্রাম</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('category') . '/' . 'প্রবন্ধ' ?>">প্রবন্ধ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('category') . '/' . 'প্রতিবেদন' ?>">প্রতিবেদন</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(route_to('pages', 'srila-prabhupada')) ?>">শ্রীল প্রভুপাদ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(route_to('pages', 'panjika')) ?>">পঞ্জিকা</a>
                                </li>

                                <li class="nav-item d-md-none">
                                    <a href="<?= base_url(route_to('epaper')) ?>" class="nav-link">E-paper</a>
                                </li>
                                <li class="nav-item">
                                    <a rel="nofollow" href="http://www.harekrishnasamacar.com/hks_admin_login.php" class="nav-link" target="_blank">Samacar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="social-media">
                        <li>
                            <a target="_blank" href="<?= setting('facebook_url') ?>" aria-label="Facebook Link" title="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 20 20">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?= setting('youtube_url') ?>" aria-label="Youtube Link" title="Youtube">
                                <!-- <i class="mdi mdi-youtube"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 20 20">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?= setting('twitter_url') ?>" aria-label="Twitter Link" title="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 20 20">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="flash-news-banner d-none d-md-block">
    <div class="container">
        <div class="d-lg-flex align-items-center <?= empty(setting('ticker')) ? '' : 'justify-content-between' ?>">
            <div class="d-flex align-items-center" style="overflow-x:auto;white-space:nowrap;scrollbar-width:none;">
                <span class="badge badge-dark mr-1 mr-md-3">আজকের তিথি</span>
                <p class="mb-0">
                    <?= setting('ticker') ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <small class="mr-3 text-danger"><span id="bn-date"></span> (<?= \App\Libraries\BanglaDate::trans(date('d F, Y')) ?>)</small>
            </div>
        </div>
    </div>
</div>