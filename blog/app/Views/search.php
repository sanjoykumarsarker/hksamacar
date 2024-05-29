<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-0">
    <?= $this->include('layout/alert') ?>
    <div class="col-sm-12 p-0 overflow-hidden">
        <?php if (setting('page_top_ad')) : ?>
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
                    <div class="col-sm-12">
                        <h1 class="font-weight-600 mb-4 border-2 border-bottom border-danger pb-2">
                            Searching: <?= $category ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php if ($posts) : ?>
                            <?php foreach ($posts as $post) : ?>
                                <div class="row border-bottom py-2 mb-3">
                                    <div class="col-sm-4">
                                        <a href="<?= $post->url ?>">
                                            <img loading="lazy" decoding="async" src="<?= $post->media_thumb_url ?>" alt="banner" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="col-sm-8 news-thumb">
                                        <a href="<?= $post->url ?>">
                                            <h2 class="font-weight-600 mb-1">
                                                <?= $post->title ?>
                                            </h2>
                                        </a>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2"><?= $category ?></span>🕑 <?= $post->created_at->humanize() ?>
                                        </p>
                                        <p class="fs-15">
                                            <?= character_limiter(strip_tags($post->body), 150) ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div>
                                <?= $pager->links('default', 'main') ?>
                            </div>
                        <?php else : ?>
                            <h3>Sorry! We found nothing with this keyword.</h3>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="mb-4 text-primary font-weight-600">
                            Latest News
                        </h2>
                        <?= view_cell('\App\Cells\Blog::recent') ?>
                        <?php if (setting('page_side_ad')) : ?>
                            <div class="mt-4">
                                <div class="card">
                                    <div class="card-body text-center bg-light">
                                        <a href="#" class="text-info">Advertisement</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mt-4">
                            <h2 class="mb-4 text-primary font-weight-600">
                                Trending
                            </h2>
                            <?= view_cell('\App\Cells\Blog::trending') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (setting('page_bottom_ad')) : ?>
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
<?= $this->endSection('content'); ?>