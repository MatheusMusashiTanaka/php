<?php
require 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['username'])) {

    header('Location: Login.php');
    exit();
}


$heroi = $_SESSION['username'];
$class = $_SESSION['class'];
$level = $_SESSION['level'];
$PV = $_SESSION['PV'];
$PVmax = $_SESSION['PVmax'];
$Inv = $_SESSION['Inv'];
$armor = $_SESSION['Armadura'];
$Inventario = $_SESSION['Inventario'];



$uri = "mongodb+srv://tanaka:Musamurai01@mainquest.jpgkf.mongodb.net/accounts";

$client = new MongoDB\Client($uri);
$db = $client->accounts;
$collection = $db->habilities;
$char = $db->login;
$Todashabilidades = $collection->find(['classe' => $class])->toArray();


$usuario = $char->findOne(['username' => $heroi]);

if ($usuario) {
    $PV = (int)$usuario['PV']; 
    $_SESSION['PV'] = $PV;
}




$abilitiesJson = json_encode($Todashabilidades);

$classJson = json_encode($class);
$levelJson = json_encode($level);
$PVJson = json_encode($PV);
$armorJson = json_encode($armor);
$inventarioJson = json_encode($Inventario);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    <script src="index.js"></script>
    <script src="enemy.js"></script>

    <div class="BFD">
        <div class="display">
            <div class="status">
                <div><a> Vida: <a id="Life"><?php echo $PV; ?></a>.</a></div>
                <div><a> Armadura: <a id="armor"><?php echo $armor; ?></a>.</a></div>

                <div class="inventory">
                    <a>Inventario: [</a>
                    <?php
                    if (isset($Inventario) && is_array($Inventario) && !empty($Inventario)) {
                        foreach ($Inventario as $item) {
                            echo "<div>$item</div>";
                        }
                    }
                    ?>
                    </a>
                </div>
            </div>
            <div class="centering">
                <a>roberto</a>
                <img class="enemy"
                    src="https://preview.redd.it/the-pixel-token-for-ur-enemies-35-gold-and-it-turns-your-v0-sta1sq6s8bfd1.png?width=3000&format=png&auto=webp&s=fb8b7e9d2f2cb865cb40f6fbc81b3f5449c6c01a">
            </div>
            <div class="actions">
                <div id="action1"> <a></a></div>

                <div id="action2" class="action2">
                    <button id="attackBtn">Attack</button>
                    <button id="blockBtn">Block</button>
                    <button id="itemBtn">Item</button>
                    <button id="passBtn">Pass</button>
                </div>
            </div>
        </div>

    </div>


    </div>



    <div id="abilidadesModal" class="modal">
        <div class="conteudomodal">
            <span class="close" id="closeModal">&times;</span>
            <h2>Selecione habilidade</h2>
            <div id="abilityList"></div>
        </div>
    </div>

    <script>


        const textos = [
            "Olha so, um fogo fatuo",
            "Clique em (attack) para escolher um ataque",
            "(Block) para defender",
            "(Item) para usar algo de sua mochila",
            "ou clique em (pass) para passar o turno."
        ];


        textobonito('action1', textos);


        const playerClass = <?php echo $classJson; ?>;
        const abilities = <?php echo $abilitiesJson; ?>;
        let level = <?php echo $levelJson; ?>;
        let PV = <?php echo $PVJson; ?>;
        let armor = <?php echo $armorJson; ?>;
        let inventory = <?php echo $inventarioJson; ?>;





        function updateDBvida() {

        }

        function updatevida() {
            const Vidatual = document.getElementById('Life');
            Vidatual.textContent = PV;
        }

        console.log("Pontos de vida: " + PV);
        console.log("level: " + level);

        const modal = document.getElementById("abilidadesModal");
        const btn = document.getElementById("attackBtn");
        const span = document.getElementById("closeModal");

        let inimigo = new enemy(level);
        console.log(inimigo);

        btn.onclick = function () {
            modal.style.display = "block";
            const abilityList = document.getElementById("abilityList");
            abilityList.innerHTML = '';

            abilities.forEach(ability => {
                const abilityButton = document.createElement('button');
                abilityButton.className = 'ability-item';
                abilityButton.textContent = `${ability.nome}: ${ability.efeito}`;

                abilityButton.onclick = () => {

                    alert("voce usou " + ability.nome);
                    modal.style.display = "none";
                    if (inimigo.Vida <= 0) {
                        fetch('UPDATEdb.php', {
                            method: 'POST',
                            body: 'Novavida=' + PV
                        });
                        let level = <?php echo $levelJson; ?>;
                        fetch('Evoluir.php', {
                            method: 'GET',
                        })
                            .then(response => {
                                if (response.ok) {
                                    alert("persongem upado para " + (level + 1));
                                    location.reload();
                                    return;
                                } else {
                                    alert("Falha ao upar");
                                    return;
                                }
                            })
                        return;
                    }
                    PV = inimigo.attack(PV);
                    updatevida();
                    alert("O inimigo te atacou");
                    if (PV <= 0) {
                        alert("Seu herói foi derrotado");


                        fetch('Matar.php', {
                            method: 'GET',
                        })
                            .then(response => {
                                if (response.ok) {
                                    window.location.href = 'Login.php';
                                } else {
                                    alert("Falha ao deletar o personagem");
                                }
                            })
                            .catch(error => {
                                console.error('Erro:', error);
                            });
                    }
                };

                abilityList.appendChild(abilityButton);
            });
        }

        blockBtn.onclick = function () {
            alert("Voce bloqueou");
            inimigo.Vida = 0;
            if (inimigo.Vida <= 0) {
                fetch('UPDATEdb.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'Novavida=' + encodeURIComponent(PV)
                });
                let level = <?php echo $levelJson; ?>;
                fetch('Evoluir.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (response.ok) {
                            alert("persongem upado para " + (level + 1));
                            location.reload();
                            return;
                        } else {
                            alert("Falha ao upar");
                            return;
                        }
                    })
                return;
            }
            PV = inimigo.attack(PV);
            updatevida();
            alert("O inimigo te atacou");
            if (PV <= 0) {
                alert("Seu herói foi derrotado");

                fetch('Matar.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (response.ok) {

                            window.location.href = 'Login.php';
                        } else {
                            alert("Falha ao deletar o personagem");
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });

            }
        };

        itemBtn.onclick = function () {
            alert("Voce usou item");
            if (inimigo.Vida <= 0) {
                fetch('UPDATEdb.php', {
                    method: 'POST',
                    body: 'Novavida=' + PV
                });
                let level = <?php echo $levelJson; ?>;
                fetch('Evoluir.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (response.ok) {
                            alert("persongem upado para " + (level + 1));
                            location.reload();
                            return;
                        } else {
                            alert("Falha ao upar");
                            return;
                        }
                    })
                return;
            }
            PV = inimigo.attack(PV);
            updatevida();
            alert("O inimigo te atacou");
            if (PV <= 0) {
                alert("Seu herói foi derrotado");
                fetch('Matar.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = 'Login.php';
                        } else {
                            alert("Falha ao deletar o personagem");
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            }
        };

        passBtn.onclick = function () {
            PV = inimigo.attack(PV);
            alert("voce passou seu turno");
            console.log(PV);
            updatevida();
            if (PV <= 0) {
                alert("Seu herói foi derrotado");

                fetch('MATAR.php', {
                    method: 'GET',
                })
                    .then(response => {
                        if (response.ok) {

                            window.location.href = 'Login.php';
                        } else {
                            alert("Falha ao deletar o personagem");

                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            }

        };
        span.onclick = function () {
            modal.style.display = "none";

        }


        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


    </script>
    </div>
    </div>
</body>

</html>