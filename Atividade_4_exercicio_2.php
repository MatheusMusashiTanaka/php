<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Digite um numero para o array </label> 
        <input type="number" id="num" name="num">
        <input type="submit" name="send" value="add">
        <input type="submit" name="print_array2" value="print">
        <input type="submit" name="delete_array" value="delete">
        
    <?php
        session_start();
        function send($array,$numero){
            array_push($array,$numero);
            return $array;
        }
        function delete(){
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['array'] =[];
            $_SESSION['array_par'] =[];
            $_SESSION['array_impar'] =[];
        }
        function printar($array){
            printf("<Br>");
            foreach ($array as $valor){
                printf("%d ", $valor);
            }  
        }
        function comparar($array_par,$array_impar,$array){

            foreach ($array as $valor){
                ($valor % 2 ===0) ? array_push($array_par,$valor) : array_push($array_impar,$valor);
            }
            return [$array_par,$array_impar];
        }
        if (!isset($_SESSION['array'])){
            $_SESSION['array'] =[];
            $_SESSION['array_par'] =[];
            $_SESSION['array_impar'] =[];
}
        if ($_SERVER['REQUEST_METHOD']=== 'POST'){
           if (isset($_POST['send'])){
                if (isset($_POST['num'])){
                    $number = $_POST['num'];
                    $_SESSION['array'] = send($_SESSION['array'],$number);
        }
    }
}
        if(isset($_POST['delete_array'])){
            delete();
        }
        if (isset($_POST['print_array2'])){
            list($_SESSION['array_par'] , $_SESSION['array_impar']) = comparar($_SESSION['array_par'],$_SESSION['array_impar'],$_SESSION['array']);
            printf("<br><br>array par: ");
            printar($_SESSION['array_par']);
            printf("<br><br>array impar: ");
            printar($_SESSION['array_impar']);
        }   
     ?>
    
</body>
</html>