<?php
require_once "core/base.php";
echo "<pre>";
//print_r($_POST);
//print_r($_FILES['upload']);

    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $file = $_FILES['upload'];
    $fileNameArr = $file['name'];
    $fileTmpArr = $file['tmp_name'];
    $store = "store/";

    foreach ($fileNameArr as $key=>$fn) {
        global $name;
        global $phone;
        $newName = $store.uniqid()."_".$fn;
        move_uploaded_file($fileTmpArr[$key], $newName);

        $sql = "INSERT INTO users (name,phone,photo_link) VALUES ('$name','$phone','$newName')";
        mysqli_query($conn,$sql);
    }
    header("location:index.php");
