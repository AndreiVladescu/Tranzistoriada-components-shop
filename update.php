<?php
$last_time = $_POST['local_time'];

$response = [];
$array = [];

$conn = pg_connect("host=20.205.115.226 dbname=apache user=apache password=apache port=5432");

// $sql = "select current_timestamp;";

// $result = pg_query($conn, $sql);
// $row = pg_fetch_array($result);
// $last_time = $row[0];
//echo $last_time;
$sql = "select * from Messages where Timestamp > '" .
    $last_time .
    "' ORDER by Timestamp;";
$result = pg_query($conn, $sql);

if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_array($result)) {
        $array[] = $row[0];
        //echo $row[0] . '<br>';
    }
}

echo json_encode($array);
pg_close($conn);
