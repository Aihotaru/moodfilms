<?php
$delIndex = $_POST['deletion'];
$con = new mysqli("127.0.0.1", "root", "fuckYOU", "movies", 3305);
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
}else{
    $sql = mysqli_query($con, "DELETE FROM films WHERE id = '$delIndex'");

    if ($sql){
        echo  'Successful';
    }
}