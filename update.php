<?php
require_once "core/base.php";

print_r($_POST);
$name = $_POST['name'];
$phone = $_POST['phone'];
$id = $_POST['id'];
$file = $_FILES['upload'];
$fileNameArr = $file['name'];
$fileTmpArr = $file['tmp_name'];
$store = "store/";

foreach ($fileNameArr as $key=>$fn) {
    global $conn;
    global $name;
    global $phone;
    global $id;
    $newName = $store.uniqid()."_".$fn;
    move_uploaded_file($fileTmpArr[$key], $newName);

//    $sql = "INSERT INTO users (name,phone,photo_link) VALUES ('$name','$phone','$newName')";
    $sql = "UPDATE users SET name='$name',phone='$phone',photo_link='$newName' WHERE id='$id'";
    mysqli_query($conn,$sql);
}
header("location:index.php");