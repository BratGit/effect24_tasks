<!doctype html>
<html>
<head>
    <title>Добавление задачи</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            <label for="exampleInputPassword1">Электронная почта</label>
            <input type="email" class="form-control" id="exampleInputPassword1" style="width: 20%" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Текст задачи</label>
            <input type="text" class="form-control" id="exampleInputPassword1" style="width: 20%" name="text">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; width: 20%">Добавить</button>
        <br/>
        <a href="index.php">В главное меню</a>
    </form>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'effect24_task';

    $link = mysqli_connect($host, $user, $password, $db_name);

    if ($_POST != null) {

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['text'])) {
            $login = $_POST['username'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $query = "insert into `task` (`username`, `email`, `text`) values ('$login', '$email', '$text')";
            $sql = mysqli_query($link, $query) or die(mysqli_error($link));
            echo "<p style='color: green'>Запись успешно добавлена!</p>";
        }
    }
    ?>
</div>
</body>
</html>