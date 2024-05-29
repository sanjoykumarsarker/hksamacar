<?= $this->extend('layout/master') ?>

<?= $this->section('head'); ?>
<meta name="description" content="<?= character_limiter(strip_tags($post->body), 160) ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:title" content="<?= $post->title ?>">
<meta property="og:description" content="<?= character_limiter(strip_tags($post->body), 160) ?>">
<meta property="og:image" content="<?= $post->media_url ?>">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url() ?>">
<meta property="twitter:title" content="<?= $post->title ?>">
<meta property="twitter:description" content="<?= character_limiter(strip_tags($post->body), 160) ?>">
<meta property="twitter:image" content="<?= $post->media_url ?>">

<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-md p-0 overflow-hidden">
    <?= $this->include('layout/alert') ?>
    <div class="row">
        <div class="col-sm-12 p-0">
            <?php if (setting('page_top_ad') === '1') : ?>
                <div class="mb-4">
                    <div class="card">
                        <div class="card-body text-center bg-light">
                            <a href="#" class="text-info">Advertisement</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <h1 class="font-weight-600"><?= $post->title ?></h1>
                                <p class="fs-13 text-muted pl-1 mb-0 border-left" style="background: linear-gradient(to right, #fafeff, #fff);">
                                    <?= $post->category_name ?> সংবাদ
                                    <br>
                                    প্রকাশ: <?= $post->posted_at ?> 🕑
                                </p>
                                <div class="">
                                    <?php if ($post->link) : ?>
                                        <!-- <iframe class="post-image mt-4 mb-4" src="<?= $post->link ?>"> -->
                                        <iframe loading="lazy" src="<?= str_replace('watch?v=', 'embed/', $post->link) ?>?loop=1&modestbranding=1" width="100%" height="360" frameborder="0" allowfullscreen>
                                        </iframe>
                                    <?php else : ?>
                                        <img loading="lazy" decoding="async" src="<?= $post->media_url ?>" alt="<?= $post->alt ?>" class="post-image my-3" />
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 my-auto order-1">
                                        <?php if ($post->author) : ?>
                                            <h5>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                                                    <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z" />
                                                </svg>
                                                লেখক: <a class="text-danger" href="<?= base_url('author') . '/' . $post->author ?>"><?= $post->author ?></a> </h5>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <div class="share-button mt-2 mb-3 text-right">
                                            <a class="btn btn-sm btn-info p-2" href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" title="Facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                                </svg> Share
                                            </a>
                                            <a class="btn btn-sm btn-success p-2" href="https://twitter.com/intent/tweet?text=<?= $post->title ?>&amp;url=<?= current_url() ?>" target="_blank" title="Twitter">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                                </svg> Tweet
                                            </a>
                                            <a class="btn btn-sm btn-primary p-2" href="#" target="_blank" title="Share" id="share_button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 fs-15 post-body">
                                    <?= $post->body ?>
                                </div>
                            </div>
                            <div class="d-lg-flex">
                                <span class="fs-16 font-weight-600 mr-2 mb-1">Tags</span>
                                <?php if (isset($post->tags)) : ?>
                                    <?php foreach ($post->tags as $tag) : ?>
                                        <a title="<?= $tag ?>" href="<?= base_url('/tags') . '/' . $tag ?>" class="badge badge-outline-dark mr-2 mb-1"><?= $tag ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                            <div class="post-comment-section">
                                <?php if ($related_posts) : ?>
                                    <h3 class="font-weight-600">Related Posts</h3>
                                    <div class="row">
                                        <?php foreach ($related_posts as $related_post) : ?>
                                            <div class="col-sm-6">
                                                <div class="post-author news-thumb shadow-sm">
                                                    <a href="<?= $related_post->url ?>">
                                                        <img loading="lazy" decoding="async" src="<?= $related_post->media_small_url ?>" alt="banner" class="img-fluid w-100 aspect-5-3" />
                                                        <div class="post-author-content">
                                                            <h5 class="mb-1">
                                                                <?= character_limiter($related_post->title, 30) ?>
                                                            </h5>
                                                            <p class="fs-13 text-muted mb-0">
                                                                <span class="mr-2"><?= $related_post->category_name ?> </span>🕑 <?= $related_post->created_at->humanize() ?>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($post->commect_active) : ?>
                                    <?= view_cell('\App\Cells\CommentCell::index', "post_id=$post->id")?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="mb-4 text-primary font-weight-600">
                                Latest News
                            </h2>

                            <?= view_cell('\App\Cells\Blog::recent') ?>

                            <div class="trendings mt-4">
                                <h2 class="mb-4 text-primary font-weight-600">
                                    Trending
                                </h2>
                                <?= view_cell('\App\Cells\Blog::trending') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (setting('page_bottom_ad') === '1') : ?>
                <div class="mt-4">
                    <div class="card">
                        <div class="card-body text-center bg-light">
                            <a href="#" class="text-info">Advertisement</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type='text/javascript'>
    window.onload = () => {
        const shareButton = document.querySelector('#share_button');

        shareButton.addEventListener('click', event => {
            event.preventDefault();
            if (navigator.share) {
                navigator.share({
                        title: "<?= $post->title ?>",
                        url: "<?= $post->url ?>"
                    }).then(() => {
                        // console.log('Thanks for sharing!');
                    })
                    .catch(console.error);
            } else {
                // shareDialog.classList.add('is-open');
                navigator.clipboard.writeText("<?= $post->url ?>").then(() => {
                    iziToast.show({
                        title: 'Hey',
                        timeout: 9000,
                        progressBar: false,
                        position: 'topCenter',
                        message: 'Link Copied to Clipboard'
                    });
                }, function(err) {
                    // console.error('Could not copy text: ', err);
                    iziToast.error({
                        title: 'Sorry',
                        position: 'topCenter',
                        message: "Copying is not Allowed"
                    })
                });

            }
        });

    }
</script>
<?= $this->endSection(); ?>