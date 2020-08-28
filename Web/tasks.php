<!doctype html>
<html>
<head>
    <title>Задачи</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
if ($_SESSION != null){

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'effect24_task';

$link = mysqli_connect($host, $user, $password, $db_name);
?>

<table border='1' style="margin-top: 20px; margin-left: 20px; width: 80%; text-align: center" class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя пользователя</th>
        <th scope="col">Электронная почта</th>
        <th scope="col">Текст задачи</th>
        <th scope="col">Действие</th>
    </tr>
    </thead>
    <?php
    $sql = mysqli_query($link, 'SELECT * FROM `task`');
    while ($result = mysqli_fetch_array($sql)) {
        echo "
            <tbody>
                <tr>
                    <th scope=\"row\">{$result['id']}</th>
                    <td>{$result['username']}</td>
                    <td>{$result['email']}</td>
                    <td>{$result['text']}</td>
                    <td>
                        <form style='margin-bottom: 10px' method='post' action='edit.php'><button type='submit' class='btn btn-success mt-3' value='{$result['id']}' name='edit'>Изменить</button></form>
                        <form method='post' action='delete.php'><button type='submit' class='btn btn-danger' value='{$result['id']}' name='delete'>Удалить</button> </form>                        
                    </td>
                </tr>
            </tbody>";
        }
    }
    ?>
</table>
<a href="index.php" style="margin-left: 20px">Главное меню</a>
</body>
</html>