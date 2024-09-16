<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="quant">Digite fila</label>
        <input type="text" id="quant" name="quant">
        <br><br>
        <label for="array">Digite pessoas</label>
        <input type="text" id="array" name="array">
        <br><br>
        <label for="minusquant">Digite quantas sairam</label>
        <input type="text" id="minusquant" name="minusquant">
        <br><br>
        <label for="minusarray">Digite pessoas que sairam</label>
        <input type="text" id="minusarray" name="minusarray">
        <br><br>
        <input type="submit" name="submit" value="submit">


        <?php

        session_start();

        function retirar($array, $Marray)
        {
            $Marray = explode(separator: " ", string: $Marray);
            $array = explode(separator: " ", string: $array);

            foreach ($Marray as $Mvalue) {
                $index = array_search($Mvalue, $array);
                if ($index !== false) {
                    unset($array[$index]);


                }
            }
            return array_values($array);
           
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $x = $_POST['array'];
            $y = $_POST['minusarray'];
            $arar = retirar($x, $y);
            foreach ($arar as $value) {
                printf("%d ", $value);
            }
        }


        ?>

</body>

</html>