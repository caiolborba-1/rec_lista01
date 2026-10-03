<?php

function converterTemperatura($valor, $origem, $destino){

    switch ($origem){

        case "celsius":
            $celsius = $valor;
            break;

        case "fahrenheit":
            $celsius = ($valor - 32) * 5 / 9;
            break;

        case "kelvin":
            $celsius = $valor - 273.15;
            break;

        default:
            return "Escala de origem inválida!";
    }

    switch ($destino){

        case "celsius":
            return $celsius;

        case "fahrenheit":
            return ($celsius * 9 / 5) + 32;

        case "kelvin":
            return $celsius + 273.15;

        default:
            return "Escala de destino inválida!";
    }
}

$valor = 10;
$origem = "celsius";
$destino = "fahrenheit";

echo "$valor graus $origem equivalem a: ";
echo converterTemperatura($valor, $origem, $destino);
echo " graus $destino <br>";

?>