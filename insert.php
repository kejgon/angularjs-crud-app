<?php
$conn = mysqli_connect("localhost", "root", "", "class");
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
    $name     = mysqli_real_escape_string($conn, $info->st_name);
    $course    = mysqli_real_escape_string($conn, $info->st_course);
    $email      = mysqli_real_escape_string($conn, $info->st_email);
    $btn_name = $info->btnName;
    if ($btn_name == "Insert") {
        $query = "INSERT INTO students (st_name, st_course, st_email) VALUES ('$name', '$course', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->st_id;
        $query = "UPDATE students SET st_name = '$name', st_course = '$course', st_email = '$email' WHERE st_id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Data Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}
