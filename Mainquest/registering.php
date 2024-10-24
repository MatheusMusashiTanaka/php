<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrado</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="BFD">
        <div class="box" id="result">
            
        </div>
    </div>





<?php
require 'vendor/autoload.php';


$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts"; 

$client = new MongoDB\Client($uri);
    $db = $client->accounts; 
    $collection = $db->login; 



$heroi = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$level = 1;
$class = $_POST['class'];

$atributos = [
    'Mago'=> ['PVmax' => 20, 'PV' => 20, 'Inv' => 4 , "Armadura" => 5 ],
    'Guerreiro'=> ['PVmax' => 40, 'PV' => 40, 'Inv' => 2 , "Armadura" => 20],
    'Arqueiro'=> ['PVmax' => 30, 'PV' => 30, 'Inv' => 2 , "Armadura" => 10 ]
];

$habilidades = [
    'Mago'=> ['PVmax' => 20, 'PV' => 20, 'Inv' => 4] , "Armadura" => 5,
    'Guerreiro'=> ['PVmax' => 40, 'PV' => 40, 'Inv' => 2 , "Armadura" => 20],
    'Arqueiro'=> ['PVmax' => 30, 'PV' => 30, 'Inv' => 2 , "Armadura" => 10 , ]
];


$PVmax = $atributos[$class]['PVmax'];
$PV = $atributos[$class]['PV'];
$Inv = $atributos[$class]['Inv'];
$Armadura = $atributos[$class]['Armadura'];
$inventario = [];

$Userexisted = $collection->findOne(['username' => $heroi]);
if ($Userexisted) {
    echo "<script>
            document.getElementById('result').innerHTML = `
                <div class='box'>
                    <p>Este herói já está registrado, escolha outro nome.</p>
                    <a href='Register.php'><button>Voltar para Registro</button></a>
                </div>`;
          </script>";
} else {
   
    $inserir = $collection->insertOne([
        'username' => $heroi,
        'password' => $password,
        'class' => $class,
        'level' => $level,
        'PVmax' => $PVmax,
        'PV' => $PV,
        'Inv' => $Inv,
        'Armadura' => $Armadura,
        'Inventario' => $inventario
    ]);
    if ($inserir->getInsertedCount() > 0) {
       echo "<script>
            document.getElementById('result').innerHTML += `
                <div class='box'>
                    <p>Heroi registrado com sucesso<p>
                    <a href='Login.php'><button>Ir para Login</button></a>
                </div>`;
          </script>";
        
    } else {
        echo "<script>
        document.getElementById('result').innerHTML = `
            <div class='box'>
                <p>Algo deu errado. Tente novamente.</p>
                <a href='Register.php'><button>Voltar para Registro</button></a>
            </div>`;
      </script>";
    }
}
?>
</body>
</html>


