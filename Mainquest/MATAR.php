<?php
require 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: Login.php');
    exit();
}

$heroi = $_SESSION['username'];


$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts";
$client = new MongoDB\Client($uri);
$db = $client->accounts;
$collection = $db->login;


$matar = $collection->deleteOne(['username' => $heroi]);

if ($matar->getDeletedCount() === 1) {
    
    session_destroy();
    header('Location: Login.php');
    exit();
} else {
 
    echo "falha??.";
}
?>