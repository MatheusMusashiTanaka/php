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


$usuario = $collection->findOne(['username' => $heroi]);


if($usuario){
    $NivelNV = $usuario['level'] +1;
    $collection->updateone  (['username'=> $heroi], ['$set' => ['level' => $NivelNV]]);
}

$_SESSION['level'] = $_SESSION['level'] + 1;

 