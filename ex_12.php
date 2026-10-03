<?php

function analisarProdutos($produtos, $produtoPesquisado){

    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $soma = 0;
    $encontrado = null;

    foreach ($produtos as $produto){

        if ($produto["preco"] > $maisCaro["preco"]){
            $maisCaro = $produto;
        }

        if ($produto["preco"] < $maisBarato["preco"]){
            $maisBarato = $produto;
        }

        $soma = $soma + $produto["preco"];

        if (strtolower($produto["nome"]) == strtolower($produtoPesquisado)){
            $encontrado = $produto;
        }
    }

    $media = $soma / count($produtos);

    return [
        "mais_caro" => $maisCaro,
        "mais_barato" => $maisBarato,
        "media" => $media,
        "pesquisado" => $encontrado
    ];
}

$produtos_usuario = [
    ["nome" => "Arroz", "preco" => 100.30],
    ["nome" => "Feijão", "preco" => 80.55],
    ["nome" => "Óleo", "preco" => 0.01],
    ["nome" => "Carne", "preco" => 1000]
];

$resultado = analisarProdutos($produtos_usuario, "Carne");

echo "Produto mais caro: " . $resultado["mais_caro"]["nome"] . " - R$ " . $resultado["mais_caro"]["preco"] . "<br>";
echo "Produto mais barato: " . $resultado["mais_barato"]["nome"] . " - R$ " . $resultado["mais_barato"]["preco"] . "<br>";
echo "Média dos preços: R$ " . number_format($resultado["media"], 2, ",", ".") . "<br>";

if ($resultado["pesquisado"]){
    echo "Produto pesquisado: " . $resultado["pesquisado"]["nome"] . " - R$ " . $resultado["pesquisado"]["preco"] . "<br>";
} else {
    echo "Produto não encontrado.<br>";
}

?>