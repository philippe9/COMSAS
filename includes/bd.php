<?php

$db_user = "root";
$db_pass = "";
$db_dsn = "mysql:host=localhost;dbname=comsas";

try {
    $dbh = new PDO($db_dsn, $db_user, $db_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    print_r($e);
    die();
}

?>