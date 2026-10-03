<?php
    function ordenarNomes($nomesTexto){
        $vetorNomes = explode(",", $nomesTexto);
        $vetorNomes = array_map("trim", $vetorNomes);
        sort($vetorNomes);

        return $vetorNomes;
    }

    $nomes_user = "Caio, Icaro, Henrique, Felipe, Mathues, tomazia,zigueira, pedro, cleiton, warden, solid snake";
        echo "lista Original: $nomes_user <br>";
    $listaOrganizada = ordenarNomes($nomes_user);
        echo "Listas Organizadas: <br>";
    foreach($listaOrganizada as $nome){
        echo "-$nome <br>";

    }
?>