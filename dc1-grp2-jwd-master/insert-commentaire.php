<?php


require_once 'config/parameters.php';

$connection = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_pass, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR';",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
]);

$query = "INSERT INTO commentaire (contenu, date_creation, photo_id) VALUES ('".$_POST['contenu']."','".date("Y-m-d H:i:s")."','".$_POST['id_photo']."')";

$stmt = $connection->prepare($query);
$stmt->execute();

return $stmt->fetchAll();