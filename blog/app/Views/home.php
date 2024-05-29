<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-0 overflow-hidden">
    <?= $this->include('layout/alert') ?>
    <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="position-relative w-100 h-100">
                <?php if ($featured_post) : ?>
                    <img src="<?= $featured_post->media_url ?>" alt="banner" class="w-100"  style="max-height:600px;object-fit:cover;"/>
                    <div class="banner-content">
                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                            <?= $featured_post->category_name ?> সংবাদ
                        </div>
                        <!-- <h1 class="mb-0">এবারের</h1> -->
                        <a class="default-link" href="<?= $featured_post->url ?>">
                            <h1 class="mb-3 text-ellipsis">
                                <?= $featured_post->title  ?>
                            </h1>
                        </a>
                        <div class="fs-12">
                            🕑 প্রকাশ: <?= $featured_post->posted_at ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h2>আলোচিত সংবাদ</h2>
                    <?php foreach (service('latestPostCategories')->trendingPosts() as $key=>$most_viewed_post) : ?>
                        <div class="d-flex <?= $key === count(service('latestPostCategories')->trendingPosts() ?? []) - 1 ? 'pt-3' :'border-bottom-blue pt-3 pb-4' ?> align-items-center justify-content-between">
                            <div class="pr-3">
                                <a href="<?= $most_viewed_post->url ?>">
                                    <h5><?= character_limiter($most_viewed_post->title, 30) ?></h5>
                                    <div class="fs-12">
                                        <span class="mr-2"><?= $most_viewed_post->category_name ?> </span>🕑
                                        <?= $most_viewed_post->created_at->humanize() ?>
                                    </div>
                                </a>
                            </div>
                            <div class="rotate-img">
                                <a href="<?= $most_viewed_post->url ?>">
                                    <img loading="lazy" decoding="async" src="<?= $most_viewed_post->media_small_url ?>" alt="thumb" class="img-fluid img-lg" />
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-12 stretch-card grid-margin">
            <div class="card card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <?php if ($posts) : ?>
                                <?php foreach ($posts as $post) : ?>
                                    <div class="col-sm-3">
                                        <div class="news-thumb py-3">
                                            <a href="<?= $post->url ?>">
                                                <div class="rotate-img">
                                                    <img loading="lazy" decoding="async" src="<?= $post->media_thumb_url ?>" alt="thumb" class="thumb-image" />
                                                </div>
                                                <p class="fs-16 font-weight-600 mb-0 mt-3">
                                                    <?= character_limiter($post->title, 50) ?>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <h1>No Posts Found</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title">
                                Video
                            </div>
                            <div class="row">
                                <?php if ($videos) : ?>
                                    <?php foreach ($videos[count($videos) - 1] as $video) : ?>
                                        <div class="col-sm-6 grid-margin">
                                            <div class="position-relative">
                                                <a href="<?= $video->url ?>">
                                                    <div class="rotate-img">
                                                        <img loading="lazy" decoding="async" src="<?= $video->media_thumb_url ?>" alt="thumb" class="img-fluid w-100" />
                                                    </div>
                                                    <div class="badge-positioned w-90">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="badge badge-danger shadow font-weight-bold"><?= $video->tags[0] ?></span>
                                                            <div class="video-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                    <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title">
                                    Latest Video
                                </div>
                                <a href="<?= base_url('category/video') ?>" class="mb-3">See all</a>
                            </div>
                            <?php if ($videos) : ?>
                                <?php foreach ($videos[0] as $video) : ?>
                                    <div class="d-flex justify-content-start align-items-center border-bottom pt-3 pb-2">
                                        <div class="div-w-80 mr-3">
                                            <a class="rotate-img" href="<?= $video->url ?>">
                                                <img loading="lazy" decoding="async" src="<?= $video->media_small_url ?>" alt="thumb" style="width: 72px; height:57px;" />
                                            </a>
                                        </div>
                                        <h3 class="font-weight-600 mb-0">
                                            <a class="text-body" href="<?= $video->url ?>">
                                                <?= character_limiter($video->title, 40) ?>
                                            </a>
                                        </h3>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (setting('home_bottom_ad', true) === '1') : ?>
        <div class="">
            <div class="card">
                <div class="card-body text-center bg-light">
                    <a href="#" class="text-info">Advertisement</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection('content'); ?>