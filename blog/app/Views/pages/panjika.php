<?= $this->extend('layout/master') ?>

<?= $this->section('head'); ?>
<script src="<?= base_url('panjika/gcal-bn.js') ?>"></script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-md p-0">
    <?= $this->include('layout/alert') ?>
    <div class="row">
        <div class="col-sm-12 overflow-hidden p-md-0 col-md-12">
            <div class="card card-body">
                <h1 class="mt-1">
                    বৈষ্ণব পঞ্জিকা
                </h1>
                <hr>
                <div class="post-body" style="overflow-x: auto;">
                    <main class="calendar-contain">
                        <div id="calendarText" style="display: none"></div>

                        <div id="selectLoc" style="display: none">
                            <h1>Find location</h1>
                            <p>
                                Type part of location name into text field and select location from
                                list below. Search is case insensitive. You can type part of city name
                                or part of country name.
                            </p>
                            <input type="text" size="40" id="userloc" onkeyup="findLoc('userloc', 'locations')" />
                            <button type="button" onclick="findLoc('userloc', 'locations')">
                                Search
                            </button>
                            <div id="locations"></div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url('panjika/gcal-ui.js') ?>"></script>
<script>
    window.onload = () => {
        calcCalendar(new GregorianDateTime());
        setTab("cal");
    }
</script>
<?= $this->endSection(); ?>