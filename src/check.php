<?php
#error_reporting(E_ALL & ~E_NOTICE);

# DB
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$db = getenv('MYSQL_DATABASE');
$host = getenv('MYSQL_HOST');
try {
    $dbh = new PDO(sprintf('mysql:dbname=%s;host=%s;charset=utf8', $db, $host), $user, $pass);
} catch ( PDOException $e ) {
    printf('Err: {%s}', $e->getMessage());
    $dbh = null;
}

# Query
try {
    $query = 'show databases;';
    $stmt = $dbh->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    var_dump($result);
} catch ( PDOException $e ) {
    printf('Err: {%s}', $e->getMessage());
}
