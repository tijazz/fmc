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

$location = $_SERVER['HTTP_REFERER'];

($_SESSION['type'] == "organization") ?? header("location:$location") ;

function notify($dbh, $user_id, $org_id, $message){
    $sql = " INSERT INTO `notification`(`user_id`, `org_id`, `message`) VALUES (:user_id, :org_id, :message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
}

function sendnotify($dbh, $org_id){
    $sql = "SELECT * from  notification where org_id = (:org_id) order by time DESC";
    $query = $dbh->prepare($sql);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return json_encode($results);
}


?>

