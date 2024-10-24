<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="BFD">
        <div class="box">
            <div id="title"></div><br>

            <form action="registering.php" method="post" id="registerform">
                <label for="username" class="label" >Heroi:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password" class="label">Senha:</label>
                <input type="password" id="password" name="password" required><br><br>
                <label for="class" class="label">Classe:</label>
                <select id="class" name="class" required>    
                   
                    <option value="Mago" selected>Mago</option>
                    <option value="Guerreiro" >Guerreiro</option>
                    <option value="Arqueiro" >Arqueiro</option>

                </select><br><br>

                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>

    <script>
        function textobonito(idelemento, textos) {

            let indextxt = 0;
            let charadd = 0;
            let intervalo = 0;

            const location = document.getElementById(idelemento);


            function escrever(texto) {
                charadd = 0;
                location.textContent = "";
                intervalo = setInterval(() => {
                    if (charadd < texto.length) {
                        location.textContent += texto[charadd];
                        charadd++;
                    } else {
                        clearInterval(intervalo);
                    }
                }, 50);
            }

            function trocartxt() {
                if (indextxt < textos.length) {
                    clearInterval(intervalo);
                    escrever(textos[indextxt]);
                    indextxt++;
                } else {
                    document.removeEventListener("click", trocartxt);
                }
            }

            trocartxt();
            document.addEventListener("click", trocartxt);
        }

        document.addEventListener("DOMContentLoaded", () => {
            const list = [
                "Registre seu heroi"
            ];
            textobonito('title', list);
        });

    </script>


</body>

</html>