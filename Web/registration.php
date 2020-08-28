<!doctype html>
<div>
    <head>
        <title>Регистрация</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous">
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
                <input type="password" class="form-control" id="exampleInputPassword1" style="width: 20%"
                       name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Повторите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" style="width: 20%" name="repeat">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; width: 20%">Зарегистрироваться
            </button>
            <br/>
            <a href="authorization.php">Авторизация</a> <br/>
            <a href="index.php">В главное меню</a>
        </form>
    </body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'effect24_task';

    $link = mysqli_connect($host, $user, $password, $db_name);
    //$link = mysqli_query($link, "SELECT * FROM users WHERE id>0");
    //$table = 'users'
    if ($_POST != null) {
        if (strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 12) {
            echo "<p style='color: red'>Длина пароля должна быть более 5 и менее 13 символов</p>";
            if ($_POST["password"] != $_POST["repeat"])
                echo "<p style='color: red'>Пароли должны совпадать</p>";
        } elseif ($_POST["password"] != $_POST["repeat"])
            echo "<p style='color: red'>Пароли должны совпадать</p>";
        elseif ($_POST["username"] != "") {
            $query = "INSERT INTO user (`username`, `password`) VALUES (\"" . $_POST["username"] . "\", \"" . $_POST["password"] . "\")";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            header('Location: authorization.php');

        }
    }
    ?>
</div>
</html>