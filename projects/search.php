<?php include_once "../session_check.php";  ?>
<?php
include_once '../function.php';

function make_address(array $address): String
{
    $text = '';
    $bn = [
        'vill' => '', 'post' => ', পোস্টঃ ',
        'thana' => ', থানাঃ ', 'dist' => ', জেলাঃ '
    ];

    foreach ($address as $key => $add) {
        if (!empty($add)) {
            $text .= $bn[$key]  . $add;
        }
    }
    if (empty($address['vill'])) return substr($text, 2);
    return $text;
}

header('Content-Type: application/json');
if (isset($_GET['q'])) {
    $DB = make_connection();
    $q = $_GET["q"];
    $sql = "SELECT Name,Org,vill,po_bn,Des,mob, ps, dist FROM tblMem
            where
            ID_EN LIKE '%$q%' OR
            Name LIKE '%$q%' OR
            mob LIKE '%$q%' OR
            dist LIKE '%$q%' OR
            vill LIKE '%$q%' OR
            po LIKE '%$q%' OR
            Org LIKE '%$q%'";

    $result = $DB->query($sql);
    $res = [];
    while ($row = $result->fetch_assoc()) {
        $sd = [
            'name' => $row['Name'],
            'mobile' => $row['mob'],
            'address' => make_address(['vill' => $row["vill"], 'post' => $row["po_bn"], 'thana' => ps_en_bn($row["ps"]), 'dist' => dist_en_bn($row["dist"])])
        ];
        $res[] = $sd;
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

?>
