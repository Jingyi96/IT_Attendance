<!-- connection file: connect sql database to my web -->
<?php
    $host = "localhost"; // same as: $host = "127.0.0.1";
    $db = "attendance_db";
    $user = "root";
    $pass = "";
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        // set $pdo an attribute: throw an exception when something goes wrong, good for debug
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php'; // referrence the crud file (contains database related functions)
    $crud = new crud($pdo); // new a crud class object




?>