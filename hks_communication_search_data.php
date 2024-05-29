<?php session_start();
include_once "function.php"; 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Subscriber Book</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon1.ico" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- The Modal -->
  <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <iframe name='subs_book_action_mod' height="220" width="100%" scrolling="no" style="border:0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- The Modal -->
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <iframe name='subs_book_action_renew_mod' height="250" width="100%" scrolling="YES" style="border:0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <div class="table-responsive">
    <table class="table table-bordered table-sm table-hover">
      <thead>
       <tr><th>SL</th><th>Name</th><th>District</th>
	   <th>Mobile</th><th>Contact Info</th><th>Response</th>
	   <th>Status</th><th>Comments</th><th>Action</th></tr>

      </thead>
      <tbody>
        <?php
       $vername = $_POST['vername'];
          $type = $_POST["type"];

        switch ($type) {
          case 'All':
            $status = "%";
            break;
          case "Active":
            $status = "CONT";
            break;
          case "Inactive":
            $status = "DISCONT";
            break;
          case "Pending":
            $status = "PENDING";
            break;

          default:
            $status = "%";
            break;
        }

        // if ($type == "All") {
        //   $status = "%";
        // }

        // if ($type == "Active") {

        //   $status = "CONT";
        // }

        // if ($type == "Inactive") {

        //   $status = "DISCONT";
        // }


        // if ($type == "Pending") {

        //   $status = "PENDING";
        // }

        // Create connection
        $conn_all = make_connection();

        $sql_all = "SELECT transid,vername FROM tblIssue where   vername LIKE '$vername'";
        $result_all = $conn_all->query($sql_all);
        if ($result_all->num_rows > 0) {
          while ($row = $result_all->fetch_assoc()) {
            echo '<tr>
                    <td>
                      <div class="btn-group">
                        <form method ="post" target="iframe_subs_book_individual_summary" action="subs_book_individual_summary.php">
                          <button  type="submit" class="btn btn-info btn-sm" >' . $row["transid"] . '</button>
                          <input type="hidden" name="ag_name" value="' . id_name($row["vername"]). '">
                          <input type="hidden" name="ag_id_en" value="' . $row["transid"] . '">
                        </form>
                        <form method ="post" target="iframe_subs_book_individual_summary" action="subs_book_individual_details.php">
                          <button  type="submit" class="btn btn-primary btn-sm" ><i class="fas fa-archive"></i></button>
                          <input type="hidden" name="ag_name" value="' . $row["transid"] . '">
                          <input type="hidden" name="ag_id_en" value="' . $row["transid"] . '">
                        </form>
                      </div>
                    </td>
                    <td>
                      <form method="post" action="ag_individual_mod_data.php" target="iframe_ag_individual_mod">
                        <input type="hidden" name="id_en" value="' . $row["transid"] . '">
                        <button type ="submit" class="btn btn-success"  data-toggle="modal" data-target="#myModal_agent"  onclick="modFunction(this.value)" >' .id_name($row["transid"]) . '</button>
                      </form>
                    </td>
                   <td>' .  dist_en_bn(id_dist($row["transid"])) . '</td>
                    <td><a href="tel:' . id_dist($row["transid"]) . '">' . id_phone($row["transid"]). '</a></td>
               <td><select class="form-control form-control-sm"> <option>Nope</option><option>Call - Outgoing</option><option>Call - Incoming</option><option>Physical Communication</option><option>Chat</option><option>SMS</option></select></td>
<td><select class="form-control form-control-sm"> <option>Nope</option><option>Not Responded</option><option>Responded</option></select></td>
<td><select class="form-control form-control-sm"> <option>On Hold</option><option>Withdrawn</option><option>Returned</option></select></td>
 <td><input type="text" /></td>
                    <td>
					
                      <div class="btn-group">
                        <form method ="post" target="subs_book_action_mod" action="subs_book_action_mod_data.php">
                          <input type="hidden" name="ag_name" value="' . $row["transid"] . '">
                          <input type="hidden" name="ag_id_en" value="' . $row["transid"] . '">
                          <input type="hidden" name="status" value="' . $row["transid"] . '">
                          <input type="hidden" name="ag_quantity" value="' . $row["transid"] . '">
                          <button  type="submit" data-target="#myModal1" data-toggle="modal" class="btn btn-info btn-sm" > UPDATE</button>
                        </form>
                        <form method ="post" target="subs_book_action_renew_mod" action="subs_book_action_renew_mod_data.php">
                          <input type="hidden" name="ag_id_en" value="' . $row["transid"] . '">
                          <input type="hidden" name="ag_name" value="' . $row["transid"] . '">
                          <input type="hidden" name="status" value="' . $row["transid"] . '">
                          <input type="hidden" name="ag_quantity" value="' . $row["transid"] . '">
                          <button  type="submit" data-target="#myModal2" data-toggle="modal" class="btn btn-danger btn-sm" >RENEW</button>
                        </form>
                      </div>
                    </td>
                  </tr>';
          }
        } else {
          echo "0 results";
        }
        $conn_all->close();
        ?>
      </tbody>
    </table>
  </div>


  <!-- The Modal agent  -->
  <div class="modal" id="myModal_agent">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
          <iframe name='iframe_ag_individual_mod' height="550" width="100%" scrolling="no" style="border:0"></iframe>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</body>

</html>