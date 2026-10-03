<?php

function mascararCPF($cpf){
    $somenteNumeros = preg_replace("/[^0-9]/", "", $cpf);
    $ultimosQuatro = substr($somenteNumeros, -4);
    $quantidadeOculta = strlen($somenteNumeros) - 4;
    $mascara = str_repeat("*", $quantidadeOculta);
    $cpfMascarado = $mascara . $ultimosQuatro;

    return $cpfMascarado;
}

$cpf_user = "133.463.855.00";

    echo "CPF Original: $cpf_user <br>";
    echo "CPF Mascarado: " . mascararCPF($cpf_user) . "<br>";

?>