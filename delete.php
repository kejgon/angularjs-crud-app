<?php
$conn = mysqli_connect("localhost", "root", "", "class");
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $id    = $data->st_id;
    $query = "DELETE FROM students WHERE st_id='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Data Deleted Successfully...';
    } else {
        echo 'Failed';
    }
}
