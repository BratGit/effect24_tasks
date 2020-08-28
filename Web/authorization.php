<!doctype html>
<html>
<head>
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div style="margin-left: 50px; margin-top: 50px">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Имя пользователя</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   style="width: 20%" name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" style="width: 20%" name="password">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; width: 20%">Войти</button>
        <br/>
        <a href="registration.php">Регистрация</a> <br/>
        <a href="index.php">В главное меню</a>
    </form>
</body>

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_task';

$link = mysqli_connect($host, $user, $password, $db_name);

if ($_POST != null) {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $login = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT *
            FROM user
            WHERE username= '$login' AND password = '$password'";
        $sql = mysqli_query($link, $query) or die(mysqli_error($link));
        if (mysqli_num_rows($sql) == 1) {
            $row = mysqli_fetch_assoc($sql);
            echo "<p>Успешная авторизация.</p>";
            session_start();
            $_SESSION['username'] = $row['username'];
            header('Location: tasks.php');
        } else
            echo "<p style='color: red; margin-top: 10px'>Неверный логин или пароль</p>";
    }
}
?>
</div>
</html>
