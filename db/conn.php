<!-- connection file: connect sql database to my web -->
<!-- PDO（PHP Data Objects）是一种在PHP里连接数据库的使用接口。
    PDO与mysqli曾经被建议用来取代原本PHP在用的mysql相关函数，
    基于数据库使用的安全性，因为后者欠缺对于SQL注入的防护。 -->
<?php
    $host = "localhost"; // same as: $host = "127.0.0.1";
    $db = "attendance_db"; // the sql database' name
    $user = "root"; // default user
    $pass = ""; // default there is no passwaord
    $charset = 'utf8mb4'; // standard charset

    // dsn(data source name) is the connection provided by PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    try {
        // new an instance of PDO class(built in PHP)
        $pdo = new PDO($dsn, $user, $pass);
        // set $pdo an attribute: throw an exception when something goes wrong, good for debug
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php'; // referrence the crud file (contains database related functions)
    $crud = new crud($pdo); // new a crud class object




?>