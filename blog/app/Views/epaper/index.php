<?= $this->extend('epaper/layout') ?>

<?= $this->section('head'); ?>

<meta property="og:description" content="<?= mb_strimwidth(strip_tags($epaper->body), 0, 180, '...') ?>">
<link rel="canonical" href="<?= url_to('epaper') ?>">
<meta name="keywords" content="hksamacar, hare krishna samacar, iskcon, sankirtan, kirtan, gouranga mahaprabhu, mayapur dham, vrindavan dham" />

<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:title" content="Hare Krishna Samacar - <?= $epaper->issue ?>">
<meta property="og:description" content="<?= mb_strimwidth(strip_tags($epaper->body), 0, 180, '...') ?>">
<meta property="og:image" content="<?= assets_url('images/hare-krishna-samacar-preview.jpg') ?>">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url() ?>">
<meta property="twitter:title" content="Hare Krishna Samacar - <?= $epaper->issue ?>">
<meta property="og:description" content="<?= mb_strimwidth(strip_tags($epaper->body), 0, 180, '...') ?>">
<meta property="twitter:image" content="<?= assets_url('images/hare-krishna-samacar-preview.jpg') ?>">

<style>
    .list-group-item-action {
        cursor: pointer;
        user-select: none;
        white-space: nowrap;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>



<div class="container">
    <?php if (isset($epaper)) : ?>
        <div class="row">
            <div class="col-md-9 mb-4">
                <h1>Hare Krishna Samacar - <?= $epaper->issue ?></h1>
                <?php if ($epaper->type === 'pdf') : ?>
                    <div class="w-100">
                        <iframe id="pdf-js-viewer" src="<?= assets_url('pdfjs/web/viewer.html') ?>?file=<?= $epaper->media_url ?>" title="webviewer" frameborder="0" class="w-100" height="600"></iframe>
                    </div>
                    <!-- <object width="100%" height="740" type="application/pdf" data="<?= $epaper->media_url ?>#pagemode=none&zoom=90&scrollbar=0&toolbar=0&navpanes=0">
                        <p>Insert your error message here, if the PDF cannot be displayed.</p>
                    </object> -->
                <?php elseif ($epaper->type === 'image') : ?>
                    <div class="card mb-3" style="overflow-x: auto;scrollbar-width: thin;">
                        <ul class="list-group list-group-horizontal">
                            <?php foreach ($epaper->media as $index => $media) : ?>
                                <li data-target="#paperCarousel" class="list-group-item list-group-item-action <?= $index === 0 ? 'active' : '' ?>" data-slide-to="<?= $index ?>">Page-<?= $index + 1 ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card mx-md-4">
                        <div id="paperCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <?php foreach ($epaper->media_url as $index => $media) : ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <img loading="lazy" decoding="async" src="<?= $media->url ?>" class="d-block w-100" alt="<?= $media->alt ?>" fetchpriority="<?= $index === 0 ? 'high' : 'low' ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Archives
                    </div>
                    <div class="card-bod p-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <small class="input-group-text px-2 py-1">Select Year</small>
                            </div>
                            <select name="" class="form-control">
                                <option value="">Year</option>
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <option value=""><?= date('Y') - $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <hr>
                        <div class="list-group mb-3">
                            <?php foreach ($papers as $index => $paper) : ?>
                                <a href="<?= current_url(true)->addQuery('issue', $paper->issue_no) ?>" class="list-group-item list-group-item-action <?= $epaper->issue_no == $paper->issue_no ? 'active' : '' ?>">
                                    <img width="30" src="<?= assets_url('/images/paper-icon.webp') ?>" alt="paper logo">
                                    <?= $paper->issue ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="list-groups">
                            <?= $pager->links('default', 'simple') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3>Please Add Epaper First.</h3>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type='text/javascript'>
    $('document').ready(function() {
        $('.list-group .list-group-item').on('click', function() {
            $('.list-group .list-group-item.active').removeClass('active')
            $(this).addClass('active');
        });
    });
</script>
<?= $this->endSection(); ?>