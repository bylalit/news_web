<?php

include "config.php";

if(isset($_FILES['fileToUpload'])){
    $errors =  array();

    $file_name = $_FILES['fileToupload']['name'];
    $file_size = $_FILES['fileToupload']['size'];
    $file_tmp = $_FILES['fileToupload']['tmp_name'];
    $file_type = $_FILES['fileToupload']['type'];
    $file_ext = (explode('.',  $file_name));
    $extensition = array("jpge", "jpg", "png", "gif");

    if(in_array($file_ext,  $extensition) === false){
        $errors[] = "This extension  file not allowed, Please choose a JPG, JPEG, PNG or GIF file.";
    }

    if($file_size > 2097152){
        $errors[] = 'File size must be excately 2 MB';
    }

    if(empty($errors) ==  true){
        move_uploaded_file($file_tmp, "upload/" . $file_name);
    }else{
        print_r($errors);
        die();
    }

}

$tital = mysqli_real_escape_string($conn,  $_POST['post_tital']);
$description = mysqli_real_escape_string($conn,  $_POST['postdesc']);
$category = mysqli_real_escape_string($conn,  $_POST['category']);
$date = date("d M  Y");
$author = $_SESSION['user_id'];


$sql =  "INSERT INTO post (tital, description, category, post_date, author, post_img) VALUES ('{$tital}', '{$description}', {$category}, '{$date}', {$author}, '{$file_name}')";
