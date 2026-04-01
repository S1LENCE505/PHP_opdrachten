<?php


$filename = basename($_FILES["fileToUpload"]["name"]);

$message = $_POST['message'];

if ($filename === '') {
    echo $message .' ' . "(geen file)";
} else {

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
    }

    if (file_exists($target_file)) {
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    )
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        }
    echo $message . ' ' . "(wel een file)";
}

?>