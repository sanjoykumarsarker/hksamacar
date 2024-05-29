<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <a href="<?= url_to('home') ?>" title="Home Page">
                        <img loading="lazy" decoding="async" src="<?= assets_url('images/samacar_logo.svg') ?>" class="footer-logo" alt="Hare Krishna Samacar Logo" />
                    </a>
                    <h5 class="font-weight-normal mt-4 mb-5" style="line-height: 1.6;">
                    মাসিক হরেকৃষ্ণ সমাচার আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ (ইসকন), বাংলাদেশের মুখপত্র। পারমার্থিক নবজাগরণের বার্তাবহরূপে ২০০৮ সাল থেকে নিবন্ধিত পত্রিকা হিসেবে নিয়মিত প্রকাশিত হয়ে আসছে। বিশ্বব্যাপী কৃষ্ণভাবনামৃত প্রচারের বার্তা ও পরম্পরা ধারায় আগত আচার্যগণের মুখনিঃসৃত হরিকথা ঘরে ঘরে পৌঁছে দেওয়াই আমাদের লক্ষ্য।
                    </h5>
                    <ul class="social-media mb-3">
                        <li>
                            <a target="_blank" href="<?= setting('facebook_url') ?>" aria-label="Facebook Link" title="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook text-default" viewBox="0 0 20 20">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?= setting('youtube_url') ?>" aria-label="Youtube Link" title="Youtube">
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
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>

                    <?= view_cell('\App\Cells\Blog::recentBottom') ?>

                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                    <?= view_cell('\App\Cells\Blog::categories') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column-reverse">
                        <div class="mt-3 mt-md-0">
                            স্বত্ব © ২০২৩ <a href="#" target="_blank" class="text-white">মাসিক হরেকৃষ্ণ সমাচার</a>
                        </div>
                        <div>
                            <ul class="list-horizontal text-center pl-0">
                                <li>
                                    <a class="mr-2" href="<?= route_to('pages', 'privacy-policy') ?>">গোপনীয়তা নীতি</a>
                                </li>
                                <li><a class="mr-2" href="<?= route_to('pages', 'terms-of-service') ?>">নীতিমালা</a></li>
                                <li><a class="mr-2" href="<?= route_to('pages', 'faq') ?>">সাধারণ জিজ্ঞাসা</a></li>
                                <li><a href="<?= route_to('pages', 'contact-us') ?>">যোগাযোগ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- partial -->
</div>
</div>
<div id="search">
    <button type="button" class="close">×</button>
    <form action="<?= url_to('search') ?>">
        <h3>হরেকৃষ্ণ..</h3>
        <input type="search" name="q" value="" placeholder="type here..." />
        <button type="submit" class="btn btn-success">Go for Search</button>
    </form>
</div>
<?php if (!service('auth')->id()) : ?>
    <div id="g_id_onload" data-client_id="487605580044-7nbg5a6009kukhojmk0ou9ur2ut1jdsr.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-login_uri="https://harekrishnasamacar.com/google-signin" data-auto_select="false" data-close_on_tap_outside="false" data-itp_support="true" <?php echo 'data-' . csrf_token() . '="' . csrf_hash() . '"'; ?>>
    </div>
<?php endif; ?>
<script src="<?= assets_url('vendors/js/vendor.bundle.base.js') ?>"></script>
<script defer src="<?= assets_url('vendors/aos/dist/aos.js/aos.js') ?>"></script>
<script defer src="<?= assets_url('vendors/iziToast/iziToast.min.js') ?>"></script>
<script src="<?= assets_url('js/demo.js', 126) ?>"></script>
<script defer="defer" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5722608969943734"
     crossorigin="anonymous"></script>
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register("<?= base_url('service-worker.js') ?>");
    }

    <?php if (!url_is(route_to('pages', 'privacy-policy'))) : ?>
        window.onload = () => {
            let showed = localStorage.getItem('cookie');
            if (iziToast instanceof Object && !showed) {
                iziToast.show({
                    theme: 'dark',
                    position: 'bottomCenter',
                    timeout: 8000,
                    progressBar: false,
                    close: false,
                    message: `By using this site, you agree to our <a class="border-bottom" href="<?= route_to('pages', 'privacy-policy') ?>">Privacy Policy</a>.`,
                    buttons: [
                        ['<button>OK</button>',
                            function(instance, toast) {
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');
                            }
                        ],
                    ],
                });
                localStorage.setItem('cookie', 'true');
            }
        }
    <?php endif; ?>
</script>
<?= $this->renderSection('script'); ?>


<!-- Google tag (gtag.js) -->
<script defer async src="https://www.googletagmanager.com/gtag/js?id=G-Z4QKG284DD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z4QKG284DD');
</script>

</body>

</html>