<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Subscriber Book</title>
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
</head>

<body class="container-fluid">
  <div class="row" style="height: 100%;">
    <div id="wrapper" class="col-md-2 col-xl-2">
      <?php include_once "hks_sidebar.php"; ?>

      <div class="col-md-10 col-xl-10">
        <div id="page-content-wrapper">
          <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
                <div class="container my-3">
                  <div class="row">
                    <div class="col-sm-12 contact-form">
                      <form id="ag_submit" method="post" class="form" role="form" target='iframe_communication_search' action="hks_communication_search_data.php">
                        <div class="row">
                          <div class="col-sm-8 input-group">
                            <select class="col-3 custom-select mr-3" id="id_district" name="vername" onchange="">
                              <option value=" ">ISSUE</option>
                              <?php
                              $conn = make_connection();
                              $sql = "SELECT issue FROM products order by cast(issue as unsigned) desc";
                              $result = $conn->query($sql);

                              while ($row = $result->fetch_assoc()) {
                                echo "<option value =" . $row['issue'] . ">" . $row['issue'] .  "</option>";
                              }
                              ?>
                            </select>
                            <input class="col-9 form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text" onkeyup="agBookSearch()" />
                          </div>
                          <div class="col-sm-4">
                            <button class="btn btn-primary" type="submit" name="type" value="Active">Active</button>
                            <button class="btn btn-danger" type="submit" name="type" value="Inactive">Inactive</button>
                            <button class="btn btn-warning" type="submit" name="type" value="Pending">Pending</button>
                            <button class="btn btn-warning" type="submit" name="type" value="All">All</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <button onclick="document.getElementById('printable').contentWindow.print()" id="print" class="btn btn-sm float-right btn-info"><i class="fa fa-print"></i>Print</button>

                <iframe id="printable" name='iframe_communication_search' height="500px" width=100% style="border:0"></iframe>
                <hr style="border-top: 0.5px dotted green; margin-top: 0.35em;  margin-bottom: 0.35em;">
                <iframe name='iframe_subs_book_individual_summary' height="220px" width=100% style="border:0"></iframe>
                <iframe name='subs_book_action_mod_update_data' height="0" width="0" scrolling="no" style="border:0"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function agBookSearch() {
      document.getElementById("ag_submit").submit();
    }
    // window.onload = () => agBookSearch();
  </script>
</body>

</html>