<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting...</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="BFD">
    <div class="box" id="resultlogon">
            
            </div>
    </div>

<?php
session_start();
require 'vendor/autoload.php';


$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts";
$client = new MongoDB\Client($uri);
$db = $client->accounts;
$collection = $db->login;

$heroi = $_POST['username'];
$password = $_POST['password'];

$user = $collection->findOne(['username' => $heroi]);

if ($user) {
    if (password_verify($password, $user['password'])) {

        $_SESSION['username'] = $user['username'];
        $_SESSION['class'] = $user['class'];
        $_SESSION['level'] = $user['level'];
        $_SESSION['PVmax'] = $user['PVmax'];
        $_SESSION['PV'] = $user['PV'];
        $_SESSION['Inv'] = $user['Inv'];
        $_SESSION['Armadura'] = $user['Armadura'];
        $_SESSION['Inventario'] = $user['Inventario'];
             echo "<script>
            document.getElementById('resultlogon').innerHTML = `
                <div class='box'>
                    <p>Achamos seu personagem, indo até ele agora....</p>
                    <a href='Mainquest.php'><button>Continuar</button></a>
                </div>`;
          </script>";
    } else {
            echo "<script>
            document.getElementById('resultlogon').innerHTML = `
                <div class='box'>
                    <p>Essa nao foi a senha que esse heroi nos contou</p>
                    <a href='Login.php'><button>Voltar</button></a>
                </div>`;
          </script>";
    }
} else {	
    echo "<script>
            document.getElementById('resultlogon').innerHTML = `
                <div class='box'>
                    <p>Esse heroi se perdeu no caminho, procure outro para se aventurar</p>
                    <a href='Login.php'><button>Voltar</button></a>
                </div>`;
          </script>";
}
?>
</body>
</html>

