<?php
require_once "conectar.php";
$nome = trim($_POST["nome"] ?? "");
$termo = "%" . $nome . "%";

$stmt = mysqli_prepare( // consulta preparada contra SQL Injection
 $conexao,
 "SELECT cod, nome, localizacao, data, mensagem
 FROM livro
 WHERE nome LIKE ?
 ORDER BY data DESC"
);
mysqli_stmt_bind_param($stmt, "s", $termo);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// armazena numero total de registros em variavel resultado
$totalRegistros = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">    
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="stylesheet" href="css/style.css">
 <title>Resultados com Opções</title>
</head>
<body>    
<?php if ($totalRegistros > 0) { ?>
<div class="table-responsive">
    <table border="1"><h1>Resultados da Pesquisa com Opções</h1> 
        <tr>
            <td><b>Opção 1</b></td>
            <td><b>Opção 2</b></td>
            <td><b>Cód</b></td>
            <td><b>Nome</b></td>
            <td><b>Localização</b></td>
            <td><b>Data</b></td>
            <td><b>Mensagem</b></td>
        </tr>
        <?php while ($linha = mysqli_fetch_assoc($resultado)) { 
            $dataFormatada = date("d/m/Y H:i:s", strtotime($linha["data"])); ?> 
        <tr>
            <td>
                <form action="exibe.php" method="post">
                    <input type="hidden" name="procura" value="<?php echo (int) $linha["cod"]; ?>"> 
                    <input type="submit" value="Alterar">
                </form>
            </td>
            <td>
                <form action="deletar.php" method="post" onsubmit="return confirm('Tem certeza que deseja apagar o registro de <?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?> permanentemente?');"> 
                    <input type="hidden" name="cod" value="<?php echo (int) $linha["cod"]; ?>">
                    <input type="submit" value="Apagar">
                </form>
            </td>
            <td><?php echo (int) $linha["cod"]; ?></td>
            <td><?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($linha["localizacao"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo $dataFormatada; ?></td>
            <td><?php echo nl2br(htmlspecialchars($linha["mensagem"], ENT_QUOTES, "UTF-8"));
            ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
    <?php } else { ?>
    <p>Nenhum registro encontrado para o termo pesquisado.</p>
<?php } ?>
<p><button onclick="window.history.back()">Voltar</button></p>

<?php

// libera memoria da variavel
mysqli_free_result($resultado);
mysqli_stmt_close($stmt);
// fecha conexao global
if (isset($conexao) && $conexao) {
    mysqli_close($conexao);
}
?>
</body>
</html>

