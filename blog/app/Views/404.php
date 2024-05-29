<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-md-0">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="card card-body">
                <div class="text-center p-4">
                    <div class="error-title">
                        404 • Page not found
                    </div>
                    <p class="fs-15">
                        <?php if (!empty($message) && $message !== '(null)') : ?>
                            <?= nl2br(esc($message)) ?>
                        <?php else : ?>
                            Sorry! Cannot seem to find the page you were looking for.
                        <?php endif ?>
                    </p>

                    <div class="search">
                        <form action="<?= url_to('search') ?>" method="get">
                            <input type="text" name="q" placeholder="Search.." name="search" class="form-control" />
                            <!-- <button type="submit"></button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>