<?php  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agent Book</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <style>
        body,
        html,
        .container-fluid {
            height: 100%;
        }

    </style>
    <script>
        function agBookSearch() {
            document.getElementById("ag_submit").submit();
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="height: 100%;">
            <div id="wrapper" class="col-md-2 col-xl-2">
                <?php
                    include_once "hks_sidebar.php";
                    include_once "hks_user.php";
                ?>
                <div class="col-md-10 col-xl-10">
                    <div id="page-content-wrapper">
                        <div class="page-content inset">
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <div class="container">
                                        <div class="row mb-3">
                                            <div class="col-sm-12 contact-form">
                                                <form id="ag_submit" method="post" class="form" role="form" target='iframe_ag_book' action="ag_book_search.php">
                                                    <div class="input-group" style="padding: 0px">

                                                        <select class="col-2 custom-select mr-3" id="id_district" name="ag_dist" onchange="">
                                                            <option value="%">District</option>
                                                            <?php
                                                                $DB =  make_connection();
                                                                $sql = $DB->query("SELECT id, district_name, bn_name FROM districts ORDER BY district_name ASC");

                                                                while ($row = $sql->fetch_assoc()) {
                                                                    echo "<option value =" . $row['id'] . $row['district_name'] . ">" . $row['bn_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <input class="col-6 form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text" onkeyup="agBookSearch0000()" autofocus /> &nbsp
                                                        <span class="col-3 input-group-btn">
                                                            <button class="btn btn-primary" type="submit" name="type" value="Active">Active</button>
                                                            <button class="btn btn-danger" type="submit" name="type" value="Inactive">Inactive</button>
                                                            <button class="btn btn-warning" type="submit" name="type" value="All">All</button>
                                                        </span>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                        <button onclick="document.getElementById('printable').contentWindow.print()" id="print" class="btn btn-sm float-right btn-info"><i class="fa fa-print"></i> Print</button>
                                        <iframe id="printable" name='iframe_ag_book' height="500px" width=100% style="border:0"></iframe>
                                        <hr style="border-top: 0.5px dotted green; margin-top: 0.35em;  margin-bottom: 0.35em;">
                                        <iframe name='iframe_ag_book_individual_summary' height="220px" width=100% style="border:0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
</body>
</html>