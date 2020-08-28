<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_task';

$link = mysqli_connect($host, $user, $password, $db_name);

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$text = trim($_POST['text']);

if (!empty($username) && !empty($email) && !empty($text)) {

    $query = "update task set username = '{$username}', email = '{$email}', text = '{$text}' WHERE id = '{$_POST['id']}'";

    $sql = mysqli_query($link, $query) or die(mysqli_error($link));

    header("Location: tasks.php");

} else {
    echo "<p style='color: red; margin-top: 20px; margin-left: 20px'>Заполните все поля!</p>";
}