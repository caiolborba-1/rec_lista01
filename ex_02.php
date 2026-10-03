<?php
    function inverterTexto($texto){
        $caracteres = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $caracteresInvertidos = array_reverse($caracteres);
        $textoInvertido = implode('', $caracteresInvertidos);
        $quantidadeCaracteres = mb_strlen($texto);

        return[ 
            "invertido" => $textoInvertido,
            "Quantidade" => $quantidadeCaracteres
            ];
    }

    $texto_user = "Olá, tudo bem!";
        echo "Texto Original: $texto_user <br>";
    $resultado = inverterTexto($texto_user);
        echo "Texto Invertido: ". $resultado["invertido"] . "<br>";
        echo "Quantidade de caracteres: ". $resultado["Quantidade"] . "<br>";

?>