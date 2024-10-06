<?php
if($_SESSION["user_role"] == '0'){
    header("location: {$hostname}/admin/post.php");
}

include "config.php";

$id = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id = '$id'";
// $result = mysqli_query($conn, $sql) or die("Queery failed.");

if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/category.php");
}else{
    echo "<h3>Error in sql syntex</h3>";
}

?>