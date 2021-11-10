<?php
$title_value = $_POST["add-title"];
$genre_value = $_POST["add-genre"];
$tag_value = $_POST["add-tag"];
$path = "app/img/" . $_FILES["add-image"]["name"];
$target_path = __DIR__ . '/app/img/';
$target_path = $target_path . basename( $_FILES['add-image']['name']);
move_uploaded_file($_FILES['add-image']['tmp_name'], $target_path);

$con = new mysqli("127.0.0.1", "root", "fuckYOU", "movies", 3305);
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
}else{
    $sql = mysqli_query($con, "INSERT INTO films (name, genre, tag, img) VALUES ('$title_value', '$genre_value', '$tag_value', '$path')");

    if ($sql){
        echo  'Success';
    }
}