<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php



    //1º

    $array_int = [4,2,1,5,6,7];


    function sum($array){
        $sum=0;
        foreach ($array as $elements){
            $sum += $elements;
        }

        printf("soma = %.2f <br><br>",$sum);
    }



    //2º

    function bigger($array){
        $big = -999;
        foreach ($array as $elements){
            if ($elements > $big){
                $big = $elements;
            }
        }
        printf("maior = %.2f <br><br>",$big);
    }


    //3º

    function pares($array){
        $nv_array = [];
        foreach ($array as $elements){
            if ($elements % 2 == 0){
                array_push($nv_array , $elements); 
            }
        }
        for ($i=0;$i<count($nv_array);$i++){
            printf($nv_array[$i]);
        }
        printf("<br><br>");
    }


    //4º
    $string = "pedra";
    $character = "a";

    function finding($string,$character){
        $num = 0;
        $array = str_split($string);
        foreach ($array as $index => $value){
            if ($value == $character){
                $num++;
            }   
        }
        printf("numero de caracteres= %d<br><br>",$num);
    }



    //5º

    function invert($string){
        $array = str_split($string);
        for($i=count($array)-1;$i>=0;$i--){
            printf("%s,",$array[$i]);
        }
        printf("<br><br>");
    }


    //6º

    $palindromo = "arara";
    function palindromo($string){
        $array = str_split($string);
        $array_inv = [];
        $v=0;
        for($i=count($array)-1;$i >= 0;$i--){
            
            $array_inv[$v] = $array[$i] ;
            $v++;
        }

        if($array == $array_inv){
            printf("palindromo<br><br>");
        } 
    }

    //7º

    $num = 5;
    function fatorial($num){
        $result = 0;
        if ($num<=1){
            return 1;
        }
        if ($num > 1){
            return ($result = $num * fatorial($num -1));
        }
        
    }

    //8º

    function fibo($num){
        $atual = 1;
        $temp = 1;
        $next = 1;

        for ($i=0; $i<$num;$i++){
            printf("%d ",$atual);
            $temp = $next;
            $next += $atual;
            $atual = $temp;
        }

    }



      //call das func
    sum($array_int);
    bigger($array_int);
    pares($array_int);
    finding($string,$character);
    invert($string);
    palindromo($palindromo);
    printf("%d <br><br>",fatorial($num) );
    fibo($num);
     ?>
    
</body>
</html>
