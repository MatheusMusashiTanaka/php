<?php

require 'vendor/autoload.php'; // Certifique-se de ter instalado a biblioteca do MongoDB

// Conectar ao MongoDB
$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts";
$client = new MongoDB\Client($uri);
$db = $client->accounts; 
$collection = $db->habilities; 

// Definir habilidades para cada classe
$habilidadesClasses = [
    'Guerreiro' => [
        ['nome' => 'Soco', 'efeito' => 'Da um total de (5*Nivel) de dano no inimigo', 'numero' => 5, 'tipo' => 'dano'],
        ['nome' => 'Bloqueio', 'efeito' => 'Reduz um total de (3*Nivel) do dano que você iria receber de um inimigo', 'numero' => 3, 'tipo' => 'defesa']
    ],
    'Mago' => [
        ['nome' => 'Bola de fogo', 'efeito' => 'Da um total de (5*Nivel) de dano no inimigo', 'numero' => 5, 'tipo' => 'dano'],
        ['nome' => 'Escudo magico', 'efeito' => 'Você recebe (3*Nivel) de Escudo Magico', 'numero' => 3, 'tipo' => 'defesa'],
        ['nome' => 'Choque', 'efeito' => '25% de chance de stunnar o inimigo por 2 turnos', 'numero' => 1, 'tipo' => 'especial'],
        ['nome' => 'Curar', 'efeito' => 'Você recebe (2*Nivel) PVs', 'numero' => 2, 'tipo' => 'cura']
    ],
    'Arqueiro' => [
        ['nome' => 'Atirar', 'efeito' => 'Da um total de (5*Nivel) de dano no inimigo', 'numero' => 5, 'tipo' => 'dano'],
        ['nome' => 'Esquivar', 'efeito' => 'Você tem 50% de chance de esquivar do próximo ataque', 'numero' => 0, 'tipo' => 'especial'],
        ['nome' => 'Parar e respirar', 'efeito' => 'Receba (2*Nivel) de cura', 'numero' => 2, 'tipo' => 'cura']
    ]
];

// Inserir habilidades no MongoDB
foreach ($habilidadesClasses as $classe => $habilidades) {
    foreach ($habilidades as $habilidade) {
        $document = [
            'classe' => $classe,
            'nome' => $habilidade['nome'],
            'efeito' => $habilidade['efeito'],
            'numero' => $habilidade['numero'],
            'tipo' => $habilidade['tipo']
        ];

        $collection->insertOne($document); // Insere a habilidade no MongoDB
    }
}

echo "Habilidades inseridas com sucesso no MongoDB!";
?>