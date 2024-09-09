<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Digite um numero</label> 
        <input type="number" id="num" name="num">
        <input type="submit" name="send" value="add">
        <input type="submit" name="print_array" value="print">
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
        }

        function printar($array){
            printf("<Br>");
            foreach ($array as $valor){
                printf("%d ", $valor);
            }  
        }

        if (!isset($_SESSION['array'])){
            $_SESSION['array'] =[];
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

        if (isset($_POST['print_array'])){
            printar($_SESSION['array']);
        }   



        
        
        

     ?>
    
</body>
</html>