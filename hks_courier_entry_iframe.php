<!DOCTYPE html>
<html>
<head>
    <title>Courier Entry</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped mt-4" >
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>District</th>
                <th>QTY</th>
                <th>Courier</th>
                <th>Consignment No.</th>
                <th>Postage</th>
            </tr>
        </thead>
        <tbody>
<?php
include "function.php";
$issue_no = (int) $_POST['issue_number'];

$conn_all = make_connection();

$sql_all    = "SELECT idn,postage,transid,Dr,VPNo,vername,cust_id,phone,total_donation,paid,due,sent_mode,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where  transid>=1 AND transid<99 AND vername=$issue_no";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
 while ($row = $result_all->fetch_assoc()) {
  $color = $row["postage"] ? 'white' : '#FFEBCD';

  echo '
        <form class="issue_form" method="post" id="' . $row["transaction_id"] . '"  action="hks_courier_entry_data.php">
            <tr>
                <td>' . $row["transid"] . '</td>
                <td>' . id_name(intval($row["transid"])) . '</td>
                <td>' . dist_en_bn(id_dist(intval($row["transid"]))) . '</td>
                <td>' . $row["agcpy"] . '</td>
                <td>' . $row["sent_mode"] . '</td>
                <td><input type="number" value="' . $row["VPNo"] . '" style="background-color: ' . $color . '; text-align:center;" REQUIRED ></td>
                <td><input type="number" value="' . $row["postage"] . '" style="background-color: ' . $color . '; text-align:center;" REQUIRED></td>
                <td style="display:none;"><input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '"><input type="submit" /></td>                
            </tr>
        </form>
        ';
 }

} else {
 echo "<tr><td colspan='7'>
    <h3 class='text-center text-danger text-uppercase'>0 results</h3>
 </td></tr>";
}
?>
</tbody>
 </table>
</div>
</div>

<script>
    window.addEventListener('submit', function(e) {
        e.stopPropagation();
        e.preventDefault();
        let data = {            
            consignment_id : e.target[0].value,
            postage : e.target[1].value,
            transaction_id : e.target[2].value,
        };
        var formData = new FormData();
        for (var k in data) {
            formData.append(k, data[k]);
        }

        function changeColor(param, color){
            param.forEach(p=>p.style.backgroundColor = color);
        }

        fetch('/hks_courier_entry_data.php', {
            method: "POST",
            body: formData
        })
        .then(res=>res.json())
        .then(data=>{
            if (data.message) {
                changeColor([e.target[0], e.target[1] ], "#a2ff94");
            } else {
                changeColor([e.target[0], e.target[1] ], "#faa");
            }
        }).catch(function (error) {
            console.log('Request failure: ', error);
            changeColor([e.target[0], e.target[1] ], "#faa");
        });

        // window.parent.postMessage('submitted form', '*')
    });
</script>
</body>
</html>