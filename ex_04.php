<?php
function criarSenha($quantidade){

    $maiusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $minusculas = "abcdefghijklmnopqrstuvwxyz";
    $digitos = "0123456789";
    $simbolos = "!@#$%&*-+";

    $caracteres = $maiusculas . $minusculas . $digitos . $simbolos;
    $limite = strlen($caracteres) - 1;
    $novaSenha = "";

    for ($contador = 0; $contador < $quantidade; $contador++){
        $indice = rand(0, $limite);
        $novaSenha .= $caracteres[$indice];
    }

    return $novaSenha;
}

$quantidadeSenha = 12;
    echo "Senha gerada com $quantidadeSenha caracteres: " . criarSenha($quantidadeSenha) . "<br>";

?>