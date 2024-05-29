<div class="row">
    <?php foreach ($posts as $index => $post) : ?>
        <div class="col-sm-12 <?= $index === array_key_last($posts) ? 'mb-3 mb-md-0' : '' ?>">
            <div class="news-thumb p-2 my-2" style="background: cadetblue;">
                <a href="<?= $post->url ?>" title="<?= $post->slug ?>">
                    <div class="d-flex jusitfy-content-between align-items-center">
                        <div class="col-3 px-0 shadow">
                            <img loading="lazy" decoding="async" src="<?= $post->media_small_url ?>" alt="thumb" class="img-fluid" />
                        </div>
                        <div class="col-9 pr-1">
                            <h5 class="font-weight-600">
                                <?= $post->title ?>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>