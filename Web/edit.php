<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_task';

$link = mysqli_connect($host, $user, $password, $db_name);

$query = "SELECT username, email, text FROM task WHERE id = {$_POST['edit']}";

$sql = mysqli_query($link, $query) or die(mysqli_error($link));
$result = mysqli_fetch_array($sql);


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <title>Редактирование задачи</title>
</head>
<body>
<div style="margin-left: 20px; margin-top: 20px">
    <form method="post" action="editing.php">
        <div class="form-group">
            <label>Имя пользователя</label>
            <input type="text" class="form-control w-25" name="username" value="<?= $result['username'] ?>"
                   autocomplete="new-password">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control w-25" name="email" value="<?= $result['email'] ?>"
                   autocomplete="new-password">
            <label>Текст</label>
            <textarea required class="form-control w-25" name="text"><?= $result['text'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-info" name="id" value="<?= $_POST['edit'] ?>">Сохранить
        </button>
    </form>
    <a href="tasks.php" class="ml-3">К списку задач</a>
</div>
</body>
</html>