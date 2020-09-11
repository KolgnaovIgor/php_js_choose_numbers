<?php
$checkValue = $_POST['checkValue'];

$link = mysqli_connect('127.0.0.1', 'mysql', 'mysql', 'numbers_each');

if (mysqli_connect_errno()) {
    echo 'Error connection to DB (' . mysqli_connect_errno() . ')' . mysqli_connect_error();
    exit();
}

mysqli_set_charset($link, 'utf8');

$sql_data = "SELECT `numbers` FROM `numbers_one`";
$result_data = mysqli_query($link, $sql_data);
$data = mysqli_fetch_all($result_data, MYSQLI_ASSOC);

$data_all = [];
foreach ($data as $value){
    array_push($data_all, $value['numbers']);
}

if ($checkValue > array_sum($data_all)){
    echo 1;
    exit;
}

$data_all = array_reverse($data_all);

$number_remainder = [];
$check_data = $checkValue;
foreach ($data_all as $value){
    if ($value == 1 && $check_data > 1){
        echo 1;
        exit;
    }
    elseif ($check_data > $value){
        $check_data -= $value;
        array_push($number_remainder, $value);
    }
    elseif($check_data == $value) {
        $check_data -= $value;
        array_push($number_remainder, $value);

        for ($i = 0; $i < 10; $i++){
            $sql = "UPDATE `numbers_one` SET `status` = '0' WHERE id = '$i'";
            $result = mysqli_query($link, $sql);
        }

        for ($l = 0; $l < count($number_remainder); $l++){
            $sql = "UPDATE `numbers_one` SET `status` = '1' WHERE numbers = '$number_remainder[$l]'";
            $result = mysqli_query($link, $sql);
        }

        $sql_data = "SELECT `status` FROM `numbers_one`";
        $result_data = mysqli_query($link, $sql_data);
        $data = mysqli_fetch_all($result_data, MYSQLI_ASSOC);

        $data_status = [];
        foreach ($data as $values){
            array_push($data_status, $values['status']);
        }
        $data_stat = implode(',', $data_status);
        echo $data_stat;
        exit;
    }
}

mysqli_close($link);