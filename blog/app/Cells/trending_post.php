<?php foreach ($posts as $trendingPost) : ?>
    <div class="mb-4 shadow-sm" style="background:aliceblue;padding:0.7rem;">
        <a href="<?= $trendingPost->url ?>" title="<?= $trendingPost->slug ?>">
            <h3 class="font-weight-600 text-body">
                <?= character_limiter($trendingPost->title, 20) ?>
            </h3>
            <p class="fs-13 text-muted mb-0">
                <span class="mr-2"><?= $latestPost->category_name ?> </span>🕑 <?= $latestPost->created_at->humanize() ?>
            </p>
            <div class="mt-2 w-100 rotate-img">
                <img loading="lazy" decoding="async" loading="lazy" decoding="async" src="<?= $trendingPost->media_thumb_url ?>" alt="banner" class="img-fluid w-100 aspect-5-3" />
            </div>
        </a>
    </div>
<?php endforeach; ?>