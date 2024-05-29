<!DOCTYPE html>
<html lang="en">

<head>
    <title>JPS Initiation - Print Certificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./dropzone-5.7.0/dist/min/dropzone.min.css">
    <script src="./dropzone-5.7.0/dist/min/dropzone.min.js"></script>
</head>

<body>


    <!-- Main navigation -->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <strong>Srila Jayapataka Swami</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <div class="md-form my-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        </div>
                    </form>
                </div> -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Full Page Intro -->
        <div class="view mb-4" style="background-image: url('tovp.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-blue-grey-strong  d-flex justify-content-center align-items-center">
                <!-- Content -->
                <div class="container-fluid">
                    <!--Grid row-->
                    <div class="row pt-lg-5 mt-5">
                        <!--Grid column-->
                        <div class="col-md-5 mb-5 mt-4 white-text text-center text-md-left wow fadeInLeft" data-wow-delay="0.3s">
                            <h1 class="display-4 font-weight-bold">Print Certificate</h1>
                            <hr class="hr-light">
                            <h6 class="mb-3">The only one person who can save us from this birth, death, old age and disease is Krishna. - Jayapataka Swami</h6>
                            <a class="btn btn-outline-white btn-rounded" href="https://www.facebook.com/JayapatakaSwami">Learn more</a>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-7 mb-4">
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <form action="./print1.php" method="post" enctype="multipart/form-data">

                                    <div class="card-body z-depth-2">

                                        <div class="row">
                                            <div class="col-md-7 order-12">
                                                <!--Header-->
                                                <!-- <div>
                                        <h4 class="dark-grey-text">
                                            <strong>Write to us</strong>
                                        </h4>
                                        <hr>
                                    </div> -->
                                                <!--Body-->
                                                <div class="d-flex justify-content-around">
                                                    <div class='z-depth-1 px-2 py-1 mr-2'><input type="number" class="border-0" name="serial" style="width:120px;" placeholder="Serial"></div>
                                                    <div class='z-depth-1 px-2 py-1'>
                                                        <i class="fas fa-calendar prefix grey-text"></i>
                                                        <input type="date" name="date" id="date" class="border-0" value="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                </div>

                                                <div class="md-form">
                                                    <i class="fas fa-user-plus prefix grey-text"></i>
                                                    <input type="text" name="final_bn_name" id="form3" class="form-control">
                                                    <label for="form3">Initiated Bangla Name</label>
                                                </div>
                                                <div class="md-form">
                                                    <i class="fas fa-user prefix grey-text"></i>
                                                    <input type="text" name="final_en_name" id="form4" class="form-control">
                                                    <label for="form4">Initiated English Name</label>
                                                </div>
                                                <div class="md-form">
                                                    <i class="fas fa-user-circle prefix grey-text"></i>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                    <label for="name">Previous Name</label>
                                                </div>
                                                <div class="md-form">
                                                    <i class="fas fa-map-marker prefix grey-text"></i>
                                                    <input type="text" name="place" id="place" class="form-control">
                                                    <label for="place">Place of Initiation</label>
                                                </div>

                                                <div class="text-center mt-3">
                                                    <button class="btn btn-indigo btn-rounded btn-block"><i class="fa fa-print"></i> Print</button>
                                                </div>
                                            </div>
                                            <div class="col-md-5 order-1">
                                                <div class="mt-4">
                                                    <div class="form-group files">
                                                        <!-- <label>Upload Your File </label> -->
                                                        <input type="file" class="form-control" name="excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                    </div>

                                                </div>
                                                <div class="text-center">
                                                    <a href="./book.xlsx" download="print_certificate_sample.xlsx" target="_blank" class="btn btn-cyan mt-2 btn-sm">Download Sample File <i class="fa fa-file-excel"></i></a>
                                                    <button type="reset" class="btn btn-pink btn-sm">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
        </div>
        <!-- Full Page Intro -->
    </header>

    <footer class="page-footer text-center font-small info-color-dark">
        <div class="rgba-stylish-strong">
            <!--Copyright-->
            <div class="footer-copyright py-3">
                © 2019 Copyright:
                <a href="#" target="_blank"> hksamacar </a>
            </div>
            <!--/.Copyright-->

        </div>
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- <script>
        $('document').ready(function() {
            var myDropzone = new Dropzone("#file-container", {
                url: "./print.php"
            });
        })
    </script> -->
</body>

</html>