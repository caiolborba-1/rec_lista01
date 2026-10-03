<?php

require_once 'ex_15_funcoes.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções PHP</title>
</head>

<body>

    <h1>Testando Funções PHP</h1>

    <h2>1. Inverter Texto</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="inverter">
        <input type="text" name="texto" placeholder="Digite um texto" required>
        <button type="submit">Executar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "inverter") {

        $resultado = inverterTexto($_POST["texto"]);

        echo "Texto invertido: " . $resultado["invertido"] . "<br>";
        echo "Quantidade de caracteres: " . $resultado["quantidade"] . "<br>";
    }

    ?>

    <h2>2. Gerar Senha</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="senha">
        <button type="submit">Gerar Senha</button>
    </form>
<!-- Exercício 15 – Biblioteca de Funções
Uma empresa deseja criar uma biblioteca reutilizável de funções para ser utilizada em
diversos sistemas.
Crie um arquivo chamado funcoes.php contendo, no mínimo, 10 funções úteis, como:
● Calcular IMC;
● Validar e-mail;
● Gerar senha aleatória;
● Contar vogais;
● Inverter texto;
● Calcular idade;
● Converter moeda;
● Formatar telefone;
● Gerar saudação conforme o horário;
● Validar uma senha forte.
Depois, desenvolva um arquivo index.php que demonstre a utilização de todas as
funções implementadas, exibindo exemplos práticos de cada uma delas. -->

<?php

function inverterTexto($texto){

    $caracteres = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);

    $caracteresInvertidos = array_reverse($caracteres);

    $textoInvertido = implode('', $caracteresInvertidos);

    $quantidadeCaracteres = mb_strlen($texto);

    return[
        "invertido" => $textoInvertido,
        "quantidade" => $quantidadeCaracteres
    ];

}

function gerarSenha()
{
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*123456789";
    $sorteioNumero = rand(5, 10);

    $senha = "";

    for ($i = 0; $i < $sorteioNumero; $i ++)
    {   
        $senha .= $caracteres[rand(0, strlen($caracteres)-1)];
    }

    

    return $senha;
}

function analisarTexto($texto){

    $palavras = str_word_count($texto);
    $caracteres = mb_strlen($texto);
    $vogais = preg_match_all('/[aeiouáéíóúãõâêîôû]/ui', $texto);
    $consoantes = preg_match_all('/[b-df-hj-np-tv-z]/i', $texto);

    echo "Palavras: ". $palavras ."<br>"; 
    echo "Caracteres: ". $caracteres ."<br>";
    echo "Vogais: ". $vogais ."<br>"; 
    echo "Consoantes: ". $consoantes; 
}

function converterTemperatura($temperatura, $escala, $escala_destino){

if($escala === "°C"){
    $resultado_Fahrenheit = $temperatura * 1.8 + 32;
    $resultado_Kelvin = $temperatura + 273;
    echo "Temperatura original: " . $temperatura . $escala ."<br>";
    
    
}elseif($escala === "°F"){
    $resultado_Celsius = $temperatura / 1.8 - 32;
    $resultado_Kelvin = (($temperatura - 32) * 5) / 9 + 273.15;
    echo "Temperatura original: " . $temperatura . $escala . "<br>";
    
    
}else{
    $resultado_Celsius = $temperatura - 273;
    $resultado_Fahrenheit = ($temperatura - 273.15) * 1.8 + 32;
    echo "Temperatura original: " . $temperatura . $escala . "<br>";
    
    
}

if($escala_destino === $escala){
    echo "Não há conversão";
}elseif($escala ==="°C" && $escala_destino === "F"){
    echo "Temperatura em Fahrenheit: " . $resultado_Fahrenheit . "°F<br>"; 
}elseif($escala ==="°C" && $escala_destino === "K"){
    echo "Temperatura em Kelvin: " . $resultado_Kelvin . "K<br>"; 
}elseif($escala ==="°F" && $escala_destino === "°C"){
    echo "Temperatura em Celsius: " . $resultado_Celsius . "°C<br>";
}elseif($escala ==="°F" && $escala_destino === "K"){
    echo "Temperatura em Kelvin: " . $resultado_Kelvin . "K<br>"; 
}elseif($escala ==="K" && $escala_destino === "°C"){
    echo "Temperatura em Celsius: " . $resultado_Celsius . "°C<br>";
}elseif($escala ==="K" && $escala_destino === "°F"){
    echo "Temperatura em Fahrenheit: " . $resultado_Fahrenheit . "°F<br>";
}

}

function calcularDesconto($valor){

    if($valor <= 100){
        $desconto = 0;
        $valorFinal = $valor;    
    }elseif ($valor > 100 && $valor < 500) {
        $desconto = $valor * 0.1;
        $valorFinal = $valor - $desconto;
    }elseif ($valor > 500 && $valor < 1000) {
        $desconto = $valor * 0.2;
        $valorFinal = $valor - $desconto;
    }else{
        $desconto = $valor * 0.3;
        $valorFinal = $valor - $desconto;
    }

    echo "Valor original da Compra: ". $valor . " R$<br>";
    echo "Desconto aplicado: " . $desconto . " R$<br>";
    echo " Valor final da compra:" . $valorFinal . " R$<br>";

}

function formatarTexto($texto){
    $maiusculas = mb_strtoupper($texto, 'UTF-8');
    $minusculas = mb_strtolower($texto, 'UTF-8');
    $primeira_maiuscula = mb_convert_case($texto, MB_CASE_TITLE, 'UTF-8');
    $quantidade = mb_strlen($texto, 'UTF-8');

    echo "Texto em maiúsculas: " . $maiusculas . "<br>";
    echo "Texto em minúsculas: " . $minusculas . "<br>";
    echo "Primeira letra de cada palavra em maiúscula: " . $primeira_maiuscula . "<br>";
    echo "Quantidade total de caracteres: " . $quantidade . "<br>";

}

function ordenarNomes($nomes){

    $array = explode(",", $nomes);
    $array = array_map('trim', $array);
    sort($array);

    for($i = 0; $i < count($array); $i++ ){
        echo $i +1 . " " . $array[$i] . "<br>";
    }
}

function analisarNumero($numero){

    if($numero % 2 == 0){
        echo "$numero é par<br>";
    }else{
        echo "$numero é ímpar<br>";
    }

    function primo($numero) {
    
    if ($numero <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }

    return true;
    }   

    if (primo($numero)) {
        echo "$numero é primo<br>";
    } else {
        echo "$numero não é primo<br>";
    }

    function perfeito($numero) {

    if ($numero <= 1) {
        return false;
    }

    $somaDivisores = 0;

    for ($i = 1; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $somaDivisores += $i;
        }
    }

    return $somaDivisores == $numero;
}

    if (perfeito($numero)) {
        echo "$numero é perfeito";
    } else {
        echo "$numero não é perfeito";
    }


}

function calcularMedia(array $notas = [0, 0, 0]){

    $maiorNota = max($notas);
    $menorNota = min($notas);
    
    $total = array_sum($notas);
    $media = $total / 3;

    echo "Maior nota: " . $maiorNota . "<br>";
    echo "Menor nota: " . $menorNota . "<br>";
    echo "Media: " . $media . "<br>";

    if($media < 5){
        echo "Situação Final: Reprovado";
    }elseif($media >= 5 && $media < 7){
        echo "Situação Final: Recuperação";
    }else{
        echo "Situação Final: Aprovado"; 
    }

}

function mascararCpf($texto)
{
    $textoMascarado = preg_replace('/./', '*', $texto);

    $textoVisivel = substr($texto, -4);

    // $textoOculto = array_splice($textoMascarado, -4);

    $cpfMascarado = "$textoMascarado" . "$textoVisivel";

    return $cpfMascarado;
}

?>
    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "senha") {

        echo "Senha: " . gerarSenha();
    }

    ?>

    <h2>3. Analisar Texto</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="texto">
        <input type="text" name="texto" placeholder="Digite uma frase" required>
        <button type="submit">Analisar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "texto") {

        analisarTexto($_POST["texto"]);
    }

    ?>

    <h2>4. Converter Temperatura</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="temperatura">

        <input type="text" name="dados" placeholder="25, C, F" required>

        <button type="submit">Converter</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "temperatura") {

        $dados = explode(",", $_POST["dados"]);

        $valor = (float)trim($dados[0]);
        $origem = trim($dados[1]);
        $destino = trim($dados[2]);

        converterTemperatura($valor, $origem, $destino);
    }

    ?>

    <h2>5. Calcular Desconto</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="desconto">

        <input type="number" step="0.01" name="valor" placeholder="Valor da compra" required>

        <button type="submit">Calcular</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "desconto") {

        calcularDesconto((float)$_POST["valor"]);
    }

    ?>

    <h2>6. Formatar Texto</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="formatar">

        <input type="text" name="texto" placeholder="Digite um texto" required>

        <button type="submit">Formatar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "formatar") {

        formatarTexto($_POST["texto"]);
    }

    ?>

    <h2>7. Ordenar Nomes</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="nomes">

        <input type="text" name="nomes" placeholder="Ana, Carlos, Bruno" required>

        <button type="submit">Ordenar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "nomes") {

        ordenarNomes($_POST["nomes"]);
    }

    ?>

    <h2>8. Analisar Número</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="numero">

        <input type="number" name="numero" placeholder="Digite um número" required>

        <button type="submit">Analisar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "numero") {

        analisarNumero((int)$_POST["numero"]);
    }

    ?>

    <h2>9. Calcular Média</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="media">

        <input type="text" name="notas" placeholder="7.5, 8, 6" required>

        <button type="submit">Calcular</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "media") {

        $notas = array_map("floatval", explode(",", $_POST["notas"]));

        calcularMedia($notas);
    }

    ?>

    <h2>10. Mascarar CPF</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="cpf">

        <input type="text" name="cpf" placeholder="Digite o CPF" required>

        <button type="submit">Mascarar</button>
    </form>

    <?php

    if (isset($_POST["acao"]) && $_POST["acao"] == "cpf") {

        echo "CPF mascarado: " . mascararCpf($_POST["cpf"]);
    }

    ?>

</body>

</html>