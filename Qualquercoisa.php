<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
  $n1= 5 ;
  $n2 = 15;
  $n3 = 5;
  $salario = 800.0;
  $idade = 20;
  $num = 10.0;
  $medida = "km";
  $num_fat=3;
  $polA = 80000.0;
  $polB = 200000.0;
  $num1 = 5.0;
  $num2 = 10.0;
  $num3 = 15.0;
  $num4 = 20.0;
  $num5 = 25.0;
  $tab= 5;


function maior($n1,$n2,$n3){
    if (($n1==$n2)||($n1==$n3)||($n2==$n3)){
        printf ("Você digitou algum número igual<br>");
    } elseif(($n1>$n2)&&($n1>$n3)){
        printf ("%d é o primeiro<br>",$n1);
        if($n2>$n3){
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n2, $n3);
        } else {
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n3, $n2);
        }
    } elseif(($n2>$n1)&&($n2>$n3)){
        printf ("%d é o primeiro<br>",$n2);
        if($n1>$n3){
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n1, $n3);
        } else {
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n3, $n1);
        }
    } elseif(($n3>$n1)&&($n3>$n2)){
        printf ("%d é o primeiro<br>",$n3);
        if($n2>$n1){
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n2, $n1);
        } else {
            printf ("%d é o segundo<br>%d é o terceiro<br>", $n1, $n2);
        }
    } 
}

function menor($n1,$n2,$n3){
    if (($n1==$n2)||($n1==$n3)||($n2==$n3)){
        printf ("Você digitou algum número igual<br>");
    } elseif(($n1<$n2)&&($n1<$n3)){
        printf ("%d é o terceiro<br>",$n1);
        if($n2<$n3){
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n2, $n3);
        } else {
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n3, $n2);
        }
    } elseif(($n2<$n1)&&($n2<$n3)){
        printf ("%d é o terceiro<br>",$n2);
        if($n1<$n3){
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n1, $n3);
        } else {
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n3, $n1);
        }
    } elseif(($n3<$n1)&&($n3<$n2)){
        printf ("%d é o terceiro<br>",$n3);
        if($n2<$n1){
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n2, $n1);
        } else {
            printf ("%d é o segundo<br>%d é o primeiro<br>", $n1, $n2);
        }
    }
}

function cresc($n1,$n2,$n3){
    if (($n1 > $n2)&&($n1>$n3)){
        if (($n3<$n2)){
            printf ("%d é o maior e %d é o menor",$n1,$n3);
        } else {
            printf("%d é maior e %d é o menor",$n1.$n2);
        }
    }

    else if (($n2>$n3)&&($n2>$n1)){
        if($n3>$n1){
            printf ("%d é o maior e %d é o menor", $$n2 , $n1);
        } else {
            printf ("%d é o maior e %d é o menor", $n2 , $n3);
        }
    }

    else if (($n3>$n2)&&($n3>$n1)){
        if($n1>$n2){
            printf ("%d é o maior e %d é o menor", $n2 , $n2);
        } else {
            printf ("%d é o maior e %d é o menor", $n2 , $n1);
        }
    }
}

function salario($salario){
    $salario_original = $salario;
    if ($salario > 0 && $salario <281){
        printf("salario antes do aumento: %d <br>",$salario);
        $salario = $salario * 1.2;
        printf("porcentagem do aumento: %d <br>",(($salario/$salario_original)*100-100));
        printf("valor do aumento: %d <br>" ,(($salario-$salario_original)));
        printf("novo salario: %d <br>",($salario));
    } else if($salario >= 280 && $salario<700) {
        printf("salario antes do aumento: %d <br>",$salario);
        $salario = $salario * 1.15;
        printf("porcentagem do aumento: %d <br>",(($salario/$salario_original)*100-100));
        printf("valor do aumento: %d <br>" ,(($salario-$salario_original)));
        printf("novo salario: %d <br>",($salario));    
    } else if($salario >= 700 && $salario<1500) {
        printf("salario antes do aumento: %d <br>",$salario);
        $salario = $salario * 1.1;  
        printf("porcentagem do aumento: %d <br>",(($salario/$salario_original)*100-100));
        printf("valor do aumento: %d <br>" ,(($salario-$salario_original)));
        printf("novo salario: %d <br>",($salario));
    } else {
        printf("salario antes do aumento: %d <br>",$salario);
        $salario = $salario *1.05;
        printf("porcentagem do aumento: %d  <br>",(($salario/$salario_original)*100-100));
        printf("valor do aumento: %d <br>" ,(($salario-$salario_original)));
        printf("novo salario: %d <br>",($salario));
    }
    


    }
    function bola($idade){
        switch ($idade){
             default: {
             echo("nao reconheci a idade");
             break;
          }
             case ($idade>=5 && $idade<11):{
             echo("infantil");
             break;
         }
             case ($idade>=11 && $idade<16):{
             echo( "juvenil");
             break;
         }
             case ($idade>=16 && $idade<21):{
             echo( "junior");
             break;
         }
             case ($idade>=21 && $idade<26):{
             echo( "profissional");
             break;
         }
     }
 }


    function transformar($num,$medida){
        switch ($medida){
            default:{
                echo("nao reconheci algo");
                break;
            }

            case "mm": {
                printf("%f M",($num/1000.0));
                break;
            }

            case "km": {
                printf("%.3f M",($num*1000));
                break;
            }

            case "cm": {
                printf("%.3f M",($num/100.0));
                break;
            }

            case "m": {
                printf("%.3f M",($num));
                break;
            }
        }

    }


    function fibonacci(){
        $num_fibonacc = 0;
        $num_fibonac2 = 1;
        $num_temp = 0;
        while($num_fibonacc<501){
            echo($num_fibonacc );
            printf("<br>");
            $num_temp = $num_fibonac2;
            $num_fibonac2 = $num_fibonac2 + $num_fibonacc;
            $num_fibonacc = $num_temp;
        }
    }

    function fat($num_fat){
        $result = 1;
        $counter = 1;
        
        while ($counter<=$num_fat){
            $result *= $counter;
            $counter++;
        } 
        echo($result);

    }

    function age($polA , $polB){
        $anos = 0;
        while($polA < $polB){
            $polA *= 1.03;
            $polB *= 1.015;
            $anos++;
        }
        echo($anos);
    }


    function five($num1,$num2,$num3,$num4,$num5){
        printf("soma total: %f<br>", ($num1+$num2+$num3+$num4+$num5));
        
        printf("media= %f<br>",(($num1+$num2+$num3+$num4+$num5)/5));

    }

    function tabuada($tab){
        $counter = 1;
        
        while ($counter<=10){
            printf("%d X %d = %d<br>",$tab,$counter,($counter * $tab));
            $counter++;
            }
        

    }

menor($n1,$n2,$n3);

printf("<br>");

maior($n1,$n2,$n3);

printf("<br>");

cresc($n1,$n2,$n3);

printf("<br>");
printf("<br>");

salario($salario);

printf("<br>");

bola($idade);

printf("<br>");
printf("<br>");

transformar($num,$medida);
printf("<br>");
printf("<br>");

fibonacci();

printf("<br>");
printf("<br>");

fat($num_fat);

printf("<br>");
printf("<br>");

age($polA,$polB);

printf("<br>");
printf("<br>");

five($num1,$num2,$num3,$num4,$num5);

tabuada($tab);
     ?>
    
</body>
</html>

