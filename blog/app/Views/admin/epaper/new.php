<?= $this->extend('admin/layout/main') ?>


<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
    <div class="d-block mb-2 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item"><a href="<?= url_to('admin.epaper') ?>">Epaper</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </nav>
        <h2 class="h4">Add New Epaper</h2>
        <!-- <p class="mb-0">Your web analytics dashboard template.</p> -->
        <?= $this->include('layout/alert') ?>
    </div>
</div>
<div class="card card-body border-0 shadow mb-4">
    <form method="post" action="<?= url_to('admin.epapers.save') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-md-4">
                <?= make_field('issue') ?>
            </div>
            <div class="col-md-4">
                <?= make_field('issue_no') ?>
            </div>
            <div class="col-md-4">
                <?= make_field('created_at', [], 'date') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?= make_field('body', [], 'textarea') ?>
            </div>
            <div class="col-md-4">
                <div class="input-group   mb-3">
                    <label class="input-group-text" for="type">Type</label>
                    <select class="form-select" name="type" id="type">
                        <?php foreach (['pdf', 'image'] as $option) : ?>
                            <option value="<?= $option ?>" <?= old('type') === $option ? 'selected' : '' ?>><?= strtoupper($option) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 pdf-box">
                    <div class="card mb-2">
                        <div class="card-body text-center">
                            <svg class="icon icon-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <title>file-pdf-box</title>
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M9.5 11.5C9.5 12.3 8.8 13 8 13H7V15H5.5V9H8C8.8 9 9.5 9.7 9.5 10.5V11.5M14.5 13.5C14.5 14.3 13.8 15 13 15H10.5V9H13C13.8 9 14.5 9.7 14.5 10.5V13.5M18.5 10.5H17V11.5H18.5V13H17V15H15.5V9H18.5V10.5M12 10.5H13V13.5H12V10.5M7 10.5H8V11.5H7V10.5Z" />
                            </svg>
                        </div>
                        <canvas class="d-none" id="pdfViewer"></canvas>
                    </div>
                    <label for="pdf">PDF File</label>
                    <input class="form-control" type="file" name="pdf" id="myPdf" />
                </div>
                <div class="mb-3 img-box d-none">
                    <div class="card mb-2">
                        <div class="card-body text-center">
                            <svg class="icon icon-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <title>Images</title>
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M9 13.5C9 14.6 8.1 15 7 15S5 14.6 5 13.5V12H6.5V13.5H7.5V9H9V13.5M14 11.5C14 12.3 13.3 13 12.5 13H11.5V15H10V9H12.5C13.3 9 14 9.7 14 10.5V11.5M19 10.5H16.5V13.5H17.5V12H19V13.7C19 14.4 18.5 15 17.7 15H16.4C15.6 15 15.1 14.3 15.1 13.7V10.4C15 9.7 15.5 9 16.3 9H17.6C18.4 9 18.9 9.7 18.9 10.3V10.5M11.5 10.5H12.5V11.5H11.5V10.5Z" />
                            </svg>
                            <div id="imagePreview" class="carousel carousel-dark slide">
                                <div class="carousel-indicators"></div>
                                <div class="carousel-inner"></div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#imagePreview" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#imagePreview" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <label for="image">Image Files</label>
                    <input class="form-control" type="file" name="image[]" id="myImage" accept="image/jpg, image/webp, image/jpeg" multiple="multiple" />
                </div>
                <?= make_field('active', ['data' => true], 'switch') ?>
            </div>

        </div>

        <div class="mt-3">
            <button class="btn btn-danger mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button>
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit" id="submit">Save all</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?= assets_url('admin/js/tinymce/tinymce.min.js') ?>" referrerpolicy="origin"></script>
<script defer src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script type='text/javascript'>
    $('document').ready(function() {
        tinymce.init({
            selector: '#body',
            plugins: ['image', 'table', 'insertdatetime', 'media', 'preview', 'fullscreen', 'code'],
            // image_advtab: true,
            image_uploadtab: true,
            image_title: true,
            images_upload_url: "<?= url_to('admin.image.upload') ?>",
            extended_valid_elements: 'script[src|async|defer|type|charset]',
            allow_script_urls: true,
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | image responsivefilemanager",
            // toolbar2: "|  | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            setup: (editor) => {
                editor.ui.registry.addContextToolbar('imagealignment', {
                    predicate: (node) => node.nodeName.toLowerCase() === 'img',
                    items: 'alignleft aligncenter alignright',
                    position: 'node',
                    scope: 'node'
                });
            }
        });

        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        $("#myPdf").on("change", function(e) {
            var file = e.target.files[0]
            if (file.type == "application/pdf") {
                $('#pdfViewer').prev().toggleClass('d-none');
                $('#pdfViewer').toggleClass('d-none');
                var fileReader = new FileReader();
                fileReader.onload = function() {
                    var pdfData = new Uint8Array(this.result);
                    // Using DocumentInitParameters object to load binary data.
                    var loadingTask = pdfjsLib.getDocument({
                        data: pdfData
                    });
                    loadingTask.promise.then(function(pdf) {
                        // console.log('PDF loaded');

                        // Fetch the first page
                        var pageNumber = 1;
                        pdf.getPage(pageNumber).then(function(page) {
                            // console.log('Page loaded');

                            // var scale = 1.5;
                            var scale = 0.35;
                            var viewport = page.getViewport({
                                scale: scale
                            });

                            // Prepare canvas using PDF page dimensions
                            var canvas = $("#pdfViewer")[0];
                            var context = canvas.getContext('2d');
                            // canvas.height = viewport.height;
                            // canvas.width = viewport.width;
                            canvas.height = viewport.height;
                            // canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                                canvasContext: context,
                                viewport: viewport
                            };
                            var renderTask = page.render(renderContext);
                            // renderTask.promise.then(function() {
                            //     console.log('Page rendered');
                            // });
                        });
                    }, function(reason) {
                        // PDF loading error
                        console.error(reason);
                    });
                };
                fileReader.readAsArrayBuffer(file);

            }
        });

        $("#type").on("change", function() {
            let value = $(this).val();
            if (value === 'image') {
                $('.img-box').toggleClass('d-none');
                $('.pdf-box').toggleClass('d-none');
            } else {
                $('.img-box').toggleClass('d-none');
                $('.pdf-box').toggleClass('d-none');
            }
        })

        const makeCarousel = (image, name, index) => {
            $('#imagePreview .carousel-indicators').append(`
                <button type="button"
                    data-bs-target="#imagePreview"
                    data-bs-slide-to="${index}"
                    ${index===0?'class="active" aria-current="true"':''}
                    aria-label="Slide ${index+1}">
                </button>
            `);
            $('#imagePreview .carousel-inner').append(`
                    <div class="carousel-item ${index===0?'active':''}">
                        <img src="${image}" class="d-block w-100" alt="${name}">
                        <div class="carousel-caption bg-warning bg-gradient d-none d-md-block">
                            <p>${name}</p>
                        </div>
                    </div>
                `);
        }

        const preview = async (file, index) => {
            const fr = new FileReader();
            fr.onloadend = (ev) => {
                // $('.preview').append($("<img>", {
                //     src: fr.result,
                //     alt: file.name,
                //     width: '40'
                // }));
                makeCarousel(fr.result, file.name, index);

            };
            await fr.readAsDataURL(file);
        };

        $('#myImage').on('change', function(e) {
            if (!e.target.files) return;
            $('#imagePreview').prev().toggleClass('d-none');
            // $('#imagePreview').toggleClass('d-none');
            [...e.target.files].forEach(preview);
        })


    });
</script>

<?= $this->endSection(); ?>