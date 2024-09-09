<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">X</label> 
        <input type="number" id="num" name="num">
        <br><Br>
        <label for="num">Y</label> 
        <input type="number" id="num2" name="num2">
        <input type="submit" name="print_array" value="print">
        <br><br>

    <?php
        
        session_start();

      
        function plano($y,$x){
            $quadrante = ($x > 0) * ($y > 0) + ($x < 0) * ($y > 0) * 2 + ($x < 0) * ($y < 0) * 3 + ($x > 0) * ($y < 0) * 4;
            $result = ($x == 0 || $y ==0) ?"eixo":$quadrante;
            return $result;
        }

        function printar($algo){
            return ($algo == "eixo") ? printf("eixo"): printf("o eixo e %d",$algo);
            
        }
       
        if ($_SERVER['REQUEST_METHOD']=== 'POST'){
           if (isset($_POST['print_array'])){
                if (isset($_POST['num'])){
                    if (isset($_POST['num2'])){
                        $x = $_POST['num'];
                        $y = $_POST['num2'];                     
                        printar(plano($y,$x)    );
        }
    }
    }
}



        
        
        

     ?>
    
</body>
</html>