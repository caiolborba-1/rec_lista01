<?php

function estatisticasNumericas($numeros){

    $soma = array_sum($numeros);
    $quantidade = count($numeros);
    $media = $soma / $quantidade;
    $maior = max($numeros);
    $menor = min($numeros);

    $ordenados = $numeros;
    sort($ordenados);

    $meio = floor($quantidade / 2);

    if ($quantidade % 2 == 0){
        $mediana = ($ordenados[$meio - 1] + $ordenados[$meio]) / 2;
    } else {
        $mediana = $ordenados[$meio];
    }

    $pares = 0;
    $impares = 0;

    foreach ($numeros as $numero){

        if ($numero % 2 == 0){
            $pares++;
        } else {
            $impares++;
        }
    }

    return [
        "soma" => $soma,
        "media" => $media,
        "maior" => $maior,
        "menor" => $menor,
        "mediana" => $mediana,
        "pares" => $pares,
        "impares" => $impares
    ];
}

$numeros_usuario = [10, 7, 0, 3, 12564, 1];

$resultado = estatisticasNumericas($numeros_usuario);

echo "Números: " . implode(", ", $numeros_usuario) . "<br>";
echo "Soma: " . $resultado["soma"] . "<br>";
echo "Média: " . $resultado["media"] . "<br>";
echo "Maior valor: " . $resultado["maior"] . "<br>";
echo "Menor valor: " . $resultado["menor"] . "<br>";
echo "Mediana: " . $resultado["mediana"] . "<br>";
echo "Quantidade de pares: " . $resultado["pares"] . "<br>";
echo "Quantidade de ímpares: " . $resultado["impares"] . "<br>";

?>