<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_task';

$link = mysqli_connect($host, $user, $password, $db_name);
var_dump($_POST);

$query = "delete from task where id = {$_POST['delete']}";
$sql = mysqli_query($link, $query) or die(mysqli_error($link));

header("Location: tasks.php");