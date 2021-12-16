<?php
require_once "core/base.php";

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";
mysqli_query($conn, $sql);
header("location:index.php");