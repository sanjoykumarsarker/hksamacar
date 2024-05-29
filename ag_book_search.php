<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Agent Book</title>
  <meta charset="utf-8">

  <link rel="shortcut icon" href="favicon1.ico" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



  <style type="text/css">
    body,
    html,
    .container-fluid {
      height: 100%;
    }

  </style>

</head>

<body>
  <!-- The Modal -->
  <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <iframe name='ag_book_action_mod' height="320" width="100%" scrolling="no" style="border:0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  </div>


  <div class="table-responsive">
    <table class="table table-bordered table-sm table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>District</th>
          <th>Mobile</th>
          <th>QTY</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once "function.php";


        $type = $_POST["type"];

        if ($type == "All") {
          $status = "%";
        }

        if ($type == "Active") {          
          $status = "CONT";
        }

        if ($type == "Inactive") {

          $status = "DISCONT";
        }
        $search = $_POST['ag_search'];

        $ag_dist = $_POST['ag_dist'];

        $conn_all = make_connection();
        
        $sql_all = "SELECT ID_EN,Name,Des,Org,vill,po,ps,dist,mob,phone,email,status,comment,ag_quantity FROM tblMem  WHERE
              (ID_EN  LIKE '%$search%' 
          OR Name  LIKE '%$search%'
          OR Des  LIKE '%$search%'
          OR Org  LIKE '%$search%'
          OR vill  LIKE '%$search%'
          OR po  LIKE '%$search%'
          OR ps  LIKE '%$search%'
          OR dist  LIKE '%$search%'
          OR mob  LIKE '%$search%'
          OR phone  LIKE '%$search%'
          OR email  LIKE '%$search%'
          ) AND (ID_EN<10000) AND status LIKE '$status'  ";
        $sqlpar2 = "AND dist LIKE '$ag_dist' ";

        if ($ag_dist != '1') {
          $sql_all = $sql_all . $sqlpar2;
        }

        $sql_all = $sql_all . " ORDER BY ID_EN ASC";

        $result_all = $conn_all->query($sql_all);

        if ($result_all->num_rows > 0) {          
          while ($row = $result_all->fetch_assoc()) {
            echo '<tr>                           
                <form method ="post" target="iframe_ag_book_individual_summary" action="ag_book_individual_summary.php">
                <input type="hidden" name="ag_name" value="' . $row["Name"] . '">
                <input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
                <td>
                  <button  type="submit" class="btn btn-info btn-sm" >' . $row["ID_EN"] . '</button>
                </td>
                </form>
                <td>
                  <form method="post" action="ag_individual_mod_data.php" target="iframe_ag_individual_mod">
                    <input type="hidden" name="id_en" value="' . $row["ID_EN"] . '">
                    <button type ="submit" class="btn btn-success"  data-toggle="modal" data-target="#myModal_agent"  onclick="modFunction(this.value)" >' . $row["Name"] . '</button>
                  </form>
                </td>
                <td>' . dist_en_bn(id_dist($row["ID_EN"])) . '</td>
                <td>' . $row["mob"] . '</td>
                <td>' . $row["ag_quantity"] . '</td>
                <td> 
                  <form method ="post" target="ag_book_action_mod" action="ag_book_action_mod_data.php">
                    <input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
                    <input type="hidden" name="status" value="' . $row["status"] . '">
                    <input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">
                    <input type="hidden" name="ag_name" value="' . $row["Name"] . '">
                    <button  type="submit" data-target="#myModal1" data-toggle="modal" > <i class="fas fa-arrow-circle-right 9x"></i></button>
                  </form>
                </td>
            </tr>';
          }
        } else {
          echo "0 results";
        }
        

        ?>

      </tbody>
    </table>
  </div>



  <!-- The Modal agent  -->
  <div class="modal" id="myModal_agent">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <iframe name='iframe_ag_individual_mod' height="550" width="100%" scrolling="no" style="border:0"></iframe>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>

</html>