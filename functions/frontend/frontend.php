<?php
$checkBoxes = $_POST['checkBoxes'];
$checkBoxes = explode(',', $checkBoxes);

$link = mysqli_connect('127.0.0.1', 'mysql', 'mysql', 'numbers_each');

if (mysqli_connect_errno()) {
    echo 'Error connection to DB (' . mysqli_connect_errno() . ')' . mysqli_connect_error();
    exit();
}

mysqli_set_charset($link, 'utf8');

for ($i = 0; $i < 10; $i++){
    $j = $i + 1;
    $sql = "UPDATE `numbers_one` SET `status` = '$checkBoxes[$i]' WHERE id = '$j'";
    $result = mysqli_query($link, $sql);
}

$sql_data = "SELECT `numbers` FROM `numbers_one` WHERE `status`='1'";
$result_data = mysqli_query($link, $sql_data);
$data = mysqli_fetch_all($result_data, MYSQLI_ASSOC);

$data_all = 0;
foreach ($data as $value){
    $data_all += $value['numbers'];
}
echo $data_all;

mysqli_close($link);