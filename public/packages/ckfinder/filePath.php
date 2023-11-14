<?php
$conn = mysqli_connect("localhost", "root", "", "xx2_web");
$msql = "select * from images_upload";
$res = $conn->query('select * from images_upload order by created_at desc;');
$i = 0;
$list_arr = array();
while ($list = mysqli_fetch_array($res)) {
    $list_arr[$i] = $list;
    $i++;
}
dd($list_arr);
$host = $_SERVER['HTTP_HOST'];
?>
