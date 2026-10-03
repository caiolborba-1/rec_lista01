<?php

function criptografarMensagem($texto, $deslocamento){

    return cifraDeCesar($texto, $deslocamento);
}

function descriptografarMensagem($texto, $deslocamento){

    return cifraDeCesar($texto, -$deslocamento);
}

function cifraDeCesar($texto, $deslocamento){

    $resultado = "";

    for ($i = 0; $i < strlen($texto); $i++){

        $letra = $texto[$i];

        if (ctype_upper($letra)){

            $posicao = (ord($letra) - ord("A") + $deslocamento) % 26;
            $posicao = ($posicao + 26) % 26;

            $resultado .= chr($posicao + ord("A"));

        } elseif (ctype_lower($letra)){

            $posicao = (ord($letra) - ord("a") + $deslocamento) % 26;
            $posicao = ($posicao + 26) % 26;

            $resultado .= chr($posicao + ord("a"));

        } else {

            $resultado .= $letra;
        }
    }

    return $resultado;
}

$mensagem_usuario = "Olá,tudo bem?";
$deslocamento_usuario = 3;

echo "Mensagem original: $mensagem_usuario <br>";

$mensagemCriptografada = criptografarMensagem($mensagem_usuario, $deslocamento_usuario);

echo "Mensagem criptografada: $mensagemCriptografada <br>";

$mensagemOriginal = descriptografarMensagem($mensagemCriptografada, $deslocamento_usuario);

echo "Mensagem descriptografada: $mensagemOriginal <br>";

?>