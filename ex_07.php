<?php

function calcularDesconto($valorCompra){

    if ($valorCompra > 1000){
        $desconto = 0.30;
    } elseif ($valorCompra > 500){
        $desconto = 0.20;
    } elseif ($valorCompra > 100){
        $desconto = 0.10;
    } else {
        $desconto = 0;
    }

    $valorDesconto = $valorCompra * $desconto;
    $valorFinal = $valorCompra - $valorDesconto;

    return [
        "original" => $valorCompra,
        "desconto" => $valorDesconto,
        "final" => $valorFinal
    ];
}

$valor_usuario = 1810;

$resultado = calcularDesconto($valor_usuario);

echo "Valor original: R$ " . number_format($resultado["original"], 2, ",", ".") . "<br>";
echo "Desconto: R$ " . number_format($resultado["desconto"], 2, ",", ".") . "<br>";
echo "Valor final: R$ " . number_format($resultado["final"], 2, ",", ".") . "<br>";

?>