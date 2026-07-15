<?php
require_once "conectar.php"; //chama um arquivo uma única vez

// Consulta para buscar todos os registros em ordem cronológica reversa
$query = "SELECT cod, nome, localizacao, mensagem, data FROM livro ORDER BY data DESC"; 
$resultado = mysqli_query($conexao, $query); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Livro de Visitas: Mensagens</title>
</head>

<body>
<h1>Tabela do livro de visitas</h1>
	<?php
    // Renderiza cada registro aplicando proteção global contra ataques de injeção XSS
    while ($linha = mysqli_fetch_assoc($resultado)) { 
        $dataFormatada = date("d/m/Y H:i:s", strtotime($linha["data"]));
    ?>
	<p>Registro código: <strong><?php echo (int) $linha["cod"]; ?></strong></p>
	<p>Nome: <?php echo htmlspecialchars($linha["nome"], ENT_QUOTES, "UTF-8"); ?></p>
   	<p>Localização: <?php echo htmlspecialchars($linha["localizacao"], ENT_QUOTES, "UTF-8"); ?> | Postado em: <?php echo $dataFormatada; ?></p>
	<p><strong>Mensagem:</strong></p>
    <p><?php echo nl2br(htmlspecialchars($linha["mensagem"], ENT_QUOTES, "UTF-8")); ?> </p><hr>
	<?php 
    } 
	// Liberação de memória dos ponteiros de consulta
    mysqli_free_result($resultado); 

    // Encerramento seguro da conexão em escopo global
    if (isset($conexao) && $conexao) {
        mysqli_close($conexao);
    }
    ?>

    <br>
    <button onclick="window.history.back()">Voltar</button>

</body>
</html>