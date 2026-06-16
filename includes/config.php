<?php
define('SITE_NAME', 'WATCHPLUS');
define('SITE_FULL_NAME', 'WATCHPLUS SRL');
define('EMAIL_TO', 'sales@watchplus.md');
define('PHONE', '+373 (60) 244 448');
define('LEGAL_ADDRESS', 'MD-2045, Chișinău, str. Nicolae Dimo 31/1, ap.(of). 173');
define('OFFICE_ADDRESS', 'MD-2032, Chișinău, str. Burebista 17A, Oficiul 218');


// Подключение к базе данных
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');          
define('DB_NAME', 'watchplus_db');

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Ошибка подключения к базе: " . $e->getMessage());
}
?>
