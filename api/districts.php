<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, x-csrf-token");

require_once 'db.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$res = '';

/**
 * @return [districts]
 *  */

 if ($uri[3] == 'all') {
    $db = make_connection();
    $statement = "SELECT id, district_name, bn_name FROM districts";
    $query = $db->query($statement);
    
    if ($query->num_rows > 0) {
        while ($a = $query->fetch_assoc()) {
            $data[] = [
                "id" => $a['id'],
                "district" => $a['bn_name'],
                "en_district" => $a['district_name']
            ];
            $res = $data;
        }
    }
 }

 if ($uri[3] == 'upazila' && is_numeric($uri[4])) {
    $district_id = (int) $uri[4];
    $db = make_connection();
    $statement = "SELECT id, district_id, upazila_name, bn_name FROM `upazilas` WHERE district_id = $district_id";
    $query = $db->query($statement);
    
    if ($query->num_rows > 0) {
        while ($a = $query->fetch_assoc()) {
            $data[] = [
                "id" => $a['id'],
                "upazila" => $a['bn_name'],
                "en_upazila" => $a['upazila_name']
            ];
            $res = $data;
        }
    }
 }

 if ($uri[3] == 'post_office') {
    $district = $uri[4];
    $db = make_connection();
    $statement = "SELECT thana, suboffice, postcode FROM `postoffices` WHERE district = '$district'";
    $query = $db->query($statement);
    if ($query->num_rows > 0) {
        while ($a = $query->fetch_assoc()) {
            $data[] = [
                "thana" => $a['thana'],
                "suboffice" => $a['suboffice'],
                "postcode" => $a['postcode']
            ];
            $res = $data;
        }
    }
 }

// $res['data'] = $query ? $query->fetch_assoc() : 'Not Found';
echo json_encode($res);