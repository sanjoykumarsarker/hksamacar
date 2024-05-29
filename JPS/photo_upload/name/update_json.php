<?php

if (isset($_POST['update'])) {
    $update = explode('-', $_POST['update']);
    $index = $update[1];
    $filename = $update[0].'.json';
    $data = file_get_contents($filename);
    $data = json_decode($data, JSON_UNESCAPED_UNICODE);
    $data[$index] = array('en'=>$_POST['en'], 'bn'=>$_POST['bn']);
    var_dump($data[$index]);
    $final_data = json_encode($data, JSON_UNESCAPED_UNICODE);
    $res = file_put_contents($filename, $final_data);

    if ($res) {
        echo 'true';
    }
} elseif (isset($_POST['delete'])) {
    $update = explode('-', $_POST['delete']);
    $index = $update[1];
    $filename = $update[0].'.json';
    $data = file_get_contents($filename);
    $data = json_decode($data, JSON_UNESCAPED_UNICODE);
    unset($data[$index]);
    $final_data = json_encode($data, JSON_UNESCAPED_UNICODE);
    $res = file_put_contents($filename, $final_data);

    if ($res) {
        echo 'true';
    }
    // var_dump($_POST);
} elseif (isset($_POST['save'])) {
    if (empty($_POST['en']) && empty($_POST['bn'])) {
        echo "Form fields are empty";
    } else {
        $filename = $_POST['save'].'.json';
        $data = file_get_contents($filename);
        $data = json_decode($data, JSON_UNESCAPED_UNICODE);
        $data[] = array('en'=>$_POST['en'], 'bn'=>$_POST['bn']);
        $final_data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $res = file_put_contents($filename, $final_data);
        header('location: update_dictionary.php');
    }
}
