<?php 
   function calcularFormula($x,$y){

    if (($x + $y) == 0){
        return "Nao foi possivel realizar a divisao por zero!";
    }

     $resultado = ((pow($x,2) + pow($y,2)) / ($x + $y));
    return $resultado;
    }

$x_user = 5;
$y_user = 10;

echo "Valor de X é: $x_user <br>";
echo "Valor de Y é: $y_user <br>";

echo calcularFormula($x_user,$y_user);
?>