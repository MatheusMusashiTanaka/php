<?php
require 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: Login.php');
    exit();
}



$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts";
$client = new MongoDB\Client($uri);
$db = $client->accounts;
$collection = $db->login;


$heroi = $_SESSION['username'];
$vidaupdate = (int)$_POST['Novavida'];

$collection->updateOne(
    ['username' => $heroi],
    ['$set' => ['PV' => $vidaupdate]] 
);