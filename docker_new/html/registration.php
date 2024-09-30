<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Куценко А.Е.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/registration_style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="hello">Регистрация</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method='POST' action='registration.php'>
                <div class="row form_reg"><input class="form" type="email" name="email" placeholder="Email" required></div>
                <div class="row form_reg"><input class="form" type="text" name="login" placeholder="Login" required></div>
                <div class="row form_reg"><input class="form" type="password" name="password" placeholder="Password" required></div>
                <!-- <button type="submit" class="btn_red btn__reg" name="submit" id="RegistrationButton">Продолжить</button> -->
                <button type="submit" name="submit" id="myButton">Продолжить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    require_once('db.php');

    if (isset($_COOKIE['User'])) {
        header("Location: login.php");
    }

    $link = mysqli_connect('db', 'root', 'kali', 'test');

    if (!$link) {
        die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $username = mysqli_real_escape_string($link, $_POST['login']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    if (!$email || !$username || !$password) {
        die('Пожалуйста, введите все значения!');
    }

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

    if (!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя: " . mysqli_error($link);
    }
    mysqli_close($link);
}
?>
