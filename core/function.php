<?php
require_once "base.php";
//validation start
function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    } else {
        return "";
    }
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

function setError($inputName, $message){
    $_SESSION['error'][$inputName] = $message;
}
function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    } else {
        return "";
    }
}
function clearError(){
    $_SESSION['error'] = [];
}

function validate(){
    $name = "";
    $phone = "";

    if (empty($_POST['name'])){
        setError("name","Name is Required");
        $errorStatus = 1;
    } else {
        if (strlen($_POST['name']) < 5 ){
            setError("name","Name is too short");
            $errorStatus = 1;
        }else{
            if (strlen($_POST['name']) > 20){
                setError("name","Name is too long");
                $errorStatus = 1;
            } else {
                if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$_POST['name'])) {
                    setError("name","Only letters and white space allowed");
                    $errorStatus = 1;
                } else {
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }
    if (empty($_POST['phone'])){
        setError("phone","Phone is required");
        $errorStatus = 1;
    } else {
        if (!preg_match("/^[0-9 +]*$/",$_POST['phone'])){
            setError("phone","Phone format invalid");
            $errorStatus = 1;
        } else {
            $phone = textFilter($_POST['phone']);
        }
    }

    $supportFileTypes = ["image/jpeg", "image/png"];
    if (isset($_FILES['upload']['name'])){
        $fileType = $_FILES['upload']['type'];
        $tmpName = $_FILES['upload']['tmp_name'];
        $name = $_FILES['upload']['name'];
        if (in_array($fileType, $supportFileTypes)){
            $store = "store/";
//            if (move_uploaded_file($tmpName, $store.uniqid()."_".$name)){
//                header("location:index.php");
//            }
        }else{
            setError("upload", "File is not support");
            $errorStatus = 1;
        }

    } else {
        setError("upload", "File is required");
        $errorStatus = 1;
    }

    if (!$errorStatus){
        print_r($_POST);
        print_r($_FILES);
    }
}
//validation end

//crud start

