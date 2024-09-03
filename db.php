<?php
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "test";

// Подключение к серверу MySQL
$link = mysqli_connect($servername, $username, $password);
if (!$link) {
  die("Ошибка подключения: " . mysqli_connect_error());
}

// Создание базы данных, если она не существует
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать БД: " . mysqli_error($link);
}

// Закрытие первого подключения и открытие нового к созданной базе данных
mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);
if (!$link) {
  die("Ошибка подключения: " . mysqli_connect_error());
}

// Создание таблицы users, если она не существует
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Users: " . mysqli_error($link);
}

// Создание таблицы posts, если она не существует
$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Posts: " . mysqli_error($link);
}

// Закрытие подключения
mysqli_close($link);
?>