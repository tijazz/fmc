<?php
// DB credentials.

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'usersDB');
} else {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'demishoc_tj');
    define('DB_PASS', 'Tijaniazeez92@');
    define('DB_NAME', 'demishoc_fmc');
}

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


