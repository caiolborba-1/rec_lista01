<?php

function contarTexto($frase){
    $palavras = str_word_count($frase);
    $caracteres = strlen($frase);
    $fraseMinuscula = strtolower($frase);

    $vogais = ["a", "e", "i", "o", "u"];
    $totalVogais = 0;
    $totalConsoantes = 0;

    for ($posicao = 0; $posicao < strlen($fraseMinuscula); $posicao++){
        $letra = $fraseMinuscula[$posicao];

        if (ctype_alpha($letra)){

            if (in_array($letra, $vogais)){
                $totalVogais++;
            } else {
                $totalConsoantes++;
            }

        }
    }

    return [
        "palavras" => $palavras,
        "caracteres" => $caracteres,
        "vogais" => $totalVogais,
        "consoantes" => $totalConsoantes
    ];
}

$frase = "Olá, meu nome é Caio Borba e gosto de jogar Basquete!";
$dados = contarTexto($frase);

echo "Texto: $frase <br>";
echo "Palavras: " . $dados["palavras"] . "<br>";
echo "Caracteres: " . $dados["caracteres"] . "<br>";
echo "Vogais: " . $dados["vogais"] . "<br>";
echo "Consoantes: " . $dados["consoantes"] . "<br>";

?>