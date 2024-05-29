<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>New Subscriber</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



    <style type="text/css">
        body,
        html,
        .container-fluid {
            height: 100%;
        }

        #wrapper {
            background-color: #787878;
        }

        .card-header {
            background-color: #3c3c3c;
            max-height: 40px;
            padding: 5px;
        }

        .card-link {
            color: white;
        }

        .card-link:Hover {
            color: yellow;
        }

        .card-body {
            padding: 5px;
            background-color: #f0f0f0;

        }

        .card-body a {
            color: black;
        }
    </style>

</head>

<body>


    <?php
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    include_once "function.php";
    // Create connection
    $conn_id = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_id->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn_id, "utf8");
    $sql_id = "SELECT MAX(ID_EN)as maxid FROM tblMem";
    $result_id = $conn_id->query($sql_id);

    if ($result_id->num_rows > 0) {
        // output data of each row
        $row = $result_id->fetch_assoc();
        $GLOBALS['maxid'] = $row["maxid"] + 1;
    } else {
        echo "0 results";
    }
    $conn_id->close();


    // Create connection
    $conn_trans_id = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_trans_id->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn_trans_id, "utf8");
    $sql_id = "SELECT MAX(transid)as maxid FROM tblMain";
    $result_id = $conn_trans_id->query($sql_id);

    if ($result_id->num_rows > 0) {
        $row = $result_id->fetch_assoc();
        $GLOBALS['maxtransid'] = $row["maxid"] + 1;
    } else {
        echo "0 results";
    }
    $conn_trans_id->close();
   

    $conn_idx_tblMain = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_idx_tblMain->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn_idx_tblMain, "utf8");
    $sql_idx = "SELECT MAX(idx)as maxidx FROM tblMain";
    $result_idx = $conn_idx_tblMain->query($sql_idx);

    if ($result_idx->num_rows > 0) {
        // output data of each row
        $row = $result_idx->fetch_assoc();
        $GLOBALS['maxidx'] = $row["maxidx"] + 1;
    } else {
        echo "0 results";
    }
    $conn_idx_tblMain->close();
    ?>

    <script>
        function submitFunction() {
            var po = document.getElementById("postoffice").value;
            document.getElementById("field1").innerHTML = po;
        }
   
        function upazilaFunction(str) {
            if (str == "") {
                document.getElementById("upazila").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("upazila").innerHTML = this.responseText;
                        document.getElementById("kkk").innerHTML = str;
                    }
                };
                xmlhttp.open("GET", "upazila.php?q=" + str, true);
                xmlhttp.send();
            }
        }
  
        function postofficeFunction(str) {
            if (str == "") {
                document.getElementById("postoffice").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("postoffice").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "postoffice.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <div class="container-fluid">

        <div class="row" style="height: 100%;">

            <div id="wrapper" class="col-md-2 col-xl-2">

                <?php include_once "hks_sidebar.php";   ?>
                <?php include_once "hks_user.php";   ?>


                <div class="col-md-10 col-xl-10">
                    <!-- Page content -->
                    <div id="page-content-wrapper">
                        <!-- Keep all page content within the page-content inset div! -->
                        <div class="page-content inset">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="well lead" style="margin-top: 10px;"> Subscriber : <?php echo  $GLOBALS['maxid']; ?></p>
                                    <div class="container">
                                        <div class="row">
                                            <!-- div da esquerda -->
                                            <!-- Text input CNPJ e Razao Social-->
                                            <div class="col-sm-10 contact-form">
                                                <!-- div da direita -->

                                                <!-- target='iframe_subs_new'  -->


                                                <form id="contact" method="post" class="form" role="form" action="hks_subs_new_data.php" target="_blank">
                                                    <div class="row">

                                                        <div class="col-xs-12 col-md-12 form-group row">
                                                            <label id="inputCNPJ" class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <input readonly class="form-control-plaintext" id="inputCNPJ" name="sub_number" value="<?php echo  $GLOBALS['maxid']; ?>" type="hidden" autofocus />
                                                            </div>
                                                            <input class="form-control" id="inputCNPJ" name="trans_id" value="<?php echo  $GLOBALS['maxtransid']; ?>" type="hidden" />
                                                            <input class="form-control" id="inputCNPJ" name="maxidx_tblmain" value="<?php echo  $GLOBALS['maxidx']; ?>" type="hidden" />


                                                        </div>
                                                        <div class="col-xs-12 col-md-12 form-group">
                                                            <input class="form-control" id="inputrazaosocial" name="sb_name" placeholder="Name" type="text" required />
                                                        </div>
                                                        <div class="col-xs-12 col-md-12 form-group">
                                                            <input class="form-control" id="inputrazaosocial" name="sb_addr" placeholder="Address" type="text" required />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-4 col-md-4 form-group">

                                                            <select required class="custom-select" id="id_district" name="sb_dist" onchange="upazilaFunction(this.value);postofficeFunction(this.value)">
                                                                <option value="" selected> District</option>
                                                                <?php

                                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                                // Check connection
                                                                if ($conn->connect_error) {
                                                                    die("Connection failed: " . $conn->connect_error);
                                                                }

                                                                $sql = "SELECT id, district_name FROM districts";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        echo "<option value =" . $row['id'] . $row['district_name'] . ">" . dist_en_bn($row['id'] . $row['district_name']) . "</option>";
                                                                    }
                                                                } else { }
                                                                $conn->close();


                                                                ?>

                                                            </select>


                                                        </div>
                                                        <div class="col-xs-4 col-md-4 form-group">
                                                            <select class="custom-select" id="upazila" name="sb_ps" onchange="upzilaFunction(this.value)">

                                                            </select>
                                                        </div>


                                                        <div class="col-xs-4 col-md-4 form-group">
                                                            <select class="custom-select " id="postoffice" name="sb_po">

                                                            </select>
                                                        </div>

                                                        <div class="col-xs-6 col-md-6 form-group">
                                                            <input class="form-control" id="sb_poffice_bn" name="sb_poffice_bn" placeholder="Postoffice (Bengali)" type="text" required />
                                                        </div>

                                                        <div class="col-xs-6 col-md-6 form-group">
                                                            <input class="form-control" id="inputcidade" name="sb_email" placeholder="Email" type="text" />
                                                        </div>

                                                        <div class="col-xs-6 col-md-6 form-group">
                                                            <input class="form-control" id="inputcidade" minlength="11" maxlength="11" size="11" name="sb_phone1" placeholder="Mobile 1" type="text" required />
                                                        </div>
                                                        <div class="col-xs-6 col-md-6 form-group">
                                                            <input class="form-control" id="inputcidade" minlength="11" maxlength="11" size="11" name="sb_phone2" placeholder="Mobile 2" type="text" />
                                                        </div>


                                                    </div>
                                                    <hr style="border-top: 1px dotted green;">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group">
                                                            <div class="controls">
                                                                <input class="form-control" id="inputcidade" name="sb_taka" placeholder="Donation" type="text" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="controls">
                                                                <input class="form-control" id="inputcidade" name="sb_issue" placeholder="Issue (QTY)" type="text" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select required name="paymode" class="custom-select ">
                                                                <option value="" selected>Select Payment Mode</option>
                                                                <option value="CASH">Cash</option>
                                                                <option value="EPAY">E-PAY</option>
                                                                <option value="OTHERS">Others</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-xs-4 col-md-6 form-group">
                                                            <input required class="form-control" id="subs_date" name="subs_date" value="<?php echo date("Y-m-d"); ?> " type="hidden" />
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                    <div class="col-xs-12 col-md-12 form-group">
                                                            <div class="controls">
                                                                <textarea class="form-control" id="message" name="message" placeholder="Comments" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <input type="checkbox" name="send_sms" checked>
                                                            <label for="">Send SMS</label>
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <button class="btn btn-danger" type="submit" onclick="submitFunction()">Submit</button>
                                                            <!--   <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#myModal" onclick="submitFunction()" >Submit</button> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end of row -->
        </div> 
</body>

</html>