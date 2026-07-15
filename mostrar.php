<?php require_once "conectar.php"; //chama um arquivo uma única vez 

// Consulta para buscar todos os registros em ordem cronológica reversa 
$query = "SELECT cod, nome, localizacao, mensagem, data FROM livro ORDER BY data DESC"; 
$resultado = mysqli_query($conexao, $query); 
?> 
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css"> 
    <title>Livro de Visitas: Mensagens</title> 
</head> 
<body> 
    <h1>Tabela do livro de visitas</h1> 

    <!-- 1. Criação da tabela global e do cabeçalho de títulos (Modo Desktop) -->
    <table class="tabela-dados">
        <tr>
            <th>Cód</th>
            <th>Nome</th>
            <th>Localização</th>
            <th>Data</th>
            <th>Mensagem</th>
        </tr>

        <?php 
        // 2. O laço while agora gera linhas (tr) e colunas (td) legítimas
        while ($linha = mysqli_fetch_assoc($resultado)) { 
            $dataFormatada = date("d/m/Y H:i:s", strtotime($linha["data"])); 
        ?> 
            <tr> 
                <td class="col-cod"><?php echo (int) $linha["cod"]; ?></td> 
                <td class="col-nome"><?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?></td> 
                <td class="col-local"><?php echo htmlspecialchars($linha["localizacao"], ENT_QUOTES, "UTF-8"); ?></td> 
                <td class="col-data"><?php echo $dataFormatada; ?></td> 
                <td class="col-msg"><?php echo nl2br(htmlspecialchars($linha["mensagem"], ENT_QUOTES, "UTF-8")); ?></td> 
            </tr> 
        <?php 
        } 
        ?>
    </table>

    <?php
    // Liberação de memória dos ponteiros de consulta 
    mysqli_free_result($resultado); 

    // Encerramento seguro da conexão em escopo global 
    if (isset($conexao) && $conexao) { 
        mysqli_close($conexao); 
    } 
    ?> 
    
    <p><button onclick="window.history.back()">Voltar</button></p> 
</body> 
</html>
