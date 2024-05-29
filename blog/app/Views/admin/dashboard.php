<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>
<?= $this->include('layout/alert') ?>

<div class="py-4">
    <div class="dropdown">
        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New Task
        </button>
        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                </svg>
                Add User
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                </svg>
                Add Post
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                </svg>
                Add Epaper
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Add Page
            </a>
            <div role="separator" class="dropdown-divider my-1"></div>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                </svg>
                Update Settings
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <h3>Dashboard is not ready yet.</h3>

        <div class="p-2 text-center">
            <img class="shadow" src="https://raw.githubusercontent.com/sahapranta/scs/master/public/media/source.gif" alt="work in progress">
        </div>
        <div class="text-center">
            <audio src="<?= assets_url('media/kirtan.mp3') ?>" controls loop>
                <p>Your browser does not support the audio element.</p>
                <embed src="<?= assets_url('media/kirtan.mp3') ?>" width="180" height="90" />
            </audio>
        </div>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero hic et eveniet ea labore exercitationem molestias perspiciatis in iure consequuntur tenetur porro odit ipsum, dolor soluta atque at recusandae enim.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero hic et eveniet ea labore exercitationem molestias perspiciatis in iure consequuntur tenetur porro odit ipsum, dolor soluta atque at recusandae enim.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero hic et eveniet ea labore exercitationem molestias perspiciatis in iure consequuntur tenetur porro odit ipsum, dolor soluta atque at recusandae enim.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero hic et eveniet ea labore exercitationem molestias perspiciatis in iure consequuntur tenetur porro odit ipsum, dolor soluta atque at recusandae enim.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero hic et eveniet ea labore exercitationem molestias perspiciatis in iure consequuntur tenetur porro odit ipsum, dolor soluta atque at recusandae enim.</p>

    </div>

</div>
<?= $this->endSection(); ?>