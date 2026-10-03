<?php

function formatarTexto($texto){

    $maiusculo = strtoupper($texto);
    $minusculo = strtolower($texto);
    $capitalizado = ucwords(strtolower($texto));
    $quantidade = strlen($texto);

    return [
        "maiusculo" => $maiusculo,
        "minusculo" => $minusculo,
        "capitalizado" => $capitalizado,
        "quantidade" => $quantidade
    ];
}

$texto_usuario = "Um lugar onde alguém ainda pensa em você é um lugar que você pode chamar de lar. —Jiraiya";
$resultado = formatarTexto($texto_usuario);

echo "Texto original: $texto_usuario <br>";
echo "Maiúsculo: " . $resultado["maiusculo"] . "<br>";
echo "Minúsculo: " . $resultado["minusculo"] . "<br>";
echo "Capitalizado: " . $resultado["capitalizado"] . "<br>";
echo "Quantidade de caracteres: " . $resultado["quantidade"] . "<br>";

?>