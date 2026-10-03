<?php
require_once 'ex_15_funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonstração das Funções</title>
</head>

<body>

    <h1>Demonstração das Funções</h1>

    <div>
        <h2>1. Inverter Texto</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="inverterTexto">
            <label for="texto_inv">Digite o texto:</label>
            <input type="text" id="texto_inv" name="texto" placeholder="Ex: PHP" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'inverterTexto') {
            $resultado = inverterTexto($_POST['texto']);
            echo "Texto invertido: " . $resultado['invertido'] . "<br>";
            echo "Quantidade de caracteres: " . $resultado['quantidade'];
        }
        ?>
    </div>

    <div>
        <h2>2. Gerar Senha</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="gerarSenha">
            <label for="input_senha">Clique para gerar uma senha:</label>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'gerarSenha') {
            echo "Senha gerada: " . gerarSenha();
        }
        ?>
    </div>

    <div>
        <h2>3. Analisar Texto</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="analisarTexto">
            <label for="texto_ana">Digite a frase:</label>
            <input type="text" id="texto_ana" name="texto" placeholder="Ex: Olá Mundo" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'analisarTexto') {
            analisarTexto($_POST['texto']);
        }
        ?>
    </div>

    <div>
        <h2>4. Converter Temperatura</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="converterTemperatura">
            <label for="temp_dados">Informe: temperatura, escala(°C, °F, K ), escala destino:</label>
            <input type="text" id="temp_dados" name="dados" placeholder="Ex: 25, °C, F" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'converterTemperatura') {
            $partes = array_map('trim', explode(',', $_POST['dados']));
            $temp = isset($partes[0]) ? (float)$partes[0] : 0;
            $escala = isset($partes[1]) ? $partes[1] : '°C';
            $destino = isset($partes[2]) ? $partes[2] : 'F';
            converterTemperatura($temp, $escala, $destino);
        }
        ?>
    </div>

    <div>
        <h2>5. Calcular Desconto</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="calcularDesconto">
            <label for="valor_desc">Digite o valor da compra (R$):</label>
            <input type="number" step="0.01" id="valor_desc" name="valor" placeholder="Ex: 250" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'calcularDesconto') {
            calcularDesconto((float)$_POST['valor']);
        }
        ?>
    </div>

    <div>
        <h2>6. Formatar Texto</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="formatarTexto">
            <label for="texto_fmt">Digite um texto:</label>
            <input type="text" id="texto_fmt" name="texto" placeholder="Ex: aula de php" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'formatarTexto') {
            formatarTexto($_POST['texto']);
        }
        ?>
    </div>

    <div>
        <h2>7. Ordenar Nomes</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="ordenarNomes">
            <label for="nomes_list">Digite os nomes separados por vírgula:</label>
            <input type="text" id="nomes_list" name="nomes" placeholder="Ex: Carlos, Ana, Bruno" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'ordenarNomes') {
            ordenarNomes($_POST['nomes']);
        }
        ?>
    </div>

    <div>
        <h2>8. Analisar Número</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="analisarNumero">
            <label for="num_analise">Digite um número inteiro:</label>
            <input type="number" id="num_analise" name="numero" placeholder="Ex: 28" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'analisarNumero') {
            analisarNumero((int)$_POST['numero']);
        }
        ?>
    </div>

    <div>
        <h2>9. Calcular Média</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="calcularMedia">
            <label for="notas_list">Digite as notas separadas por vírgula(Máximo 3):</label>
            <input type="text" id="notas_list" name="notas" placeholder="Ex: 7.5, 8.0, 6.0" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'calcularMedia') {
            $notas = array_map('floatval', explode(',', $_POST['notas']));
            calcularMedia($notas);
        }
        ?>
    </div>

    <div>
        <h2>10. Mascarar CPF</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="mascararCpf">
            <label for="cpf_num">Digite o CPF:</label>
            <input type="text" id="cpf_num" name="cpf" placeholder="Ex: 12345678900" required>
            <button type="submit">Executar</button>
        </form>
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] === 'mascararCpf') {
            echo "CPF mascarado: " . mascararCpf($_POST['cpf']);
        }
        ?>
    </div>
</body>

</html>