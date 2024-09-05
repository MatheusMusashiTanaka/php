<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
    <label for="number">Number:</label> 
    <input type="number" id="number" name="number"> <br><br>

    <label for="number">Number 2:</label> 
    <input type="number" id="number2" name="number2" > <br><br>

    <label for="fat">fatorial:</label> 
    <input type="text" id="fat" name="fat" > <br><br>

    <label for="nome">nome:</label> 
    <input type="text" id="nome" name="nome" required > <br><br>

    <label for="ano">ano:</label> 
    <input type="text" id="ano" name="ano" > <br><br>


    <input type="submit" value="Enviar">

    <?php
    $number =0;
    $number2 =0;
    $fat = 0;

    if (isset($_POST["number"])){
            $number = htmlspecialchars($_POST["number"]);
}
    if (isset($_POST["number2"])){
            $number2 = htmlspecialchars($_POST["number2"]);
}

    if ((isset($_POST["number2"]))??(isset($_POST["number"]))){
            printf("<br> <br> %d <br> <br>",($number + $number2));
        }


    if (isset($_POST["fat"])){
            $fat = htmlspecialchars($_POST["fat"]);
}       
    function fatorial($num)
   {
       $result = 0;
       if ($num <= 1) {
           return 1;
       }
       if ($num > 1) {
           return ($result = $num * fatorial($num - 1));
       }
   }
    if (isset($_POST["fat"])){
     printf("%d<br><br>",fatorial($fat));
}
    if (isset($_POST["nome"])){
        $nome = htmlspecialchars($_POST["nome"]);
        printf("seu nome é %s<br><br>",$nome);
}   
    if (isset($_POST["ano"])){
        $idade = htmlspecialchars($_POST["ano"]);
        printf("sua idade e %d<br><br>", 2024-$idade );
}   


     ?>
    
</body>
</html>