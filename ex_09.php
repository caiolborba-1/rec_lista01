<?php

function analisarNumero($numero)
{

    if ($numero % 2 == 0) {
        $paridade = "Par";
    } else {
        $paridade = "Ímpar";
    }

    $primo = true;

    if ($numero < 2) {
        $primo = false;
    } else {

        for ($i = 2; $i < $numero; $i++) {

            if ($numero % $i == 0) {
                $primo = false;
                break;
            }
        }
    }

    $soma = 0;

    for ($i = 1; $i < $numero; $i++) {

        if ($numero % $i == 0) {
            $soma = $soma + $i;
        }
    }

    if ($soma == $numero && $numero > 0) {
        $perfeito = "Sim";
    } else {
        $perfeito = "Não";
    }

    if ($primo) {
        $primo = "Sim";
    } else {
        $primo = "Não";
    }

    return [
        "paridade" => $paridade,
        "primo" => $primo,
        "perfeito" => $perfeito
    ];
}

$numero_usuario = 126313;
$resultado = analisarNumero($numero_usuario);

echo "Número: $numero_usuario <br>";
echo "Paridade: " . $resultado["paridade"] . "<br>";
echo "É primo? " . $resultado["primo"] . "<br>";
echo "É perfeito? " . $resultado["perfeito"] . "<br>";
