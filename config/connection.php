<?php

// mysqli_connect('localhost', 'root', '', 'wearhouse')

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'wearhouse';

$conn = mysqli_connect($server, $user, $password, $db);

if(!$conn){
    die(mysqli_error($conn));
}
?>